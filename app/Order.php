<?php

namespace App;

use App\Mail\OrderReceivedAdmin;
use App\Mail\OrderReceivedClient;
use App\Mail\OrderReview;
use Carbon\Carbon;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpWord\TemplateProcessor;


class Order extends ShopModel
{
    public static $STATUSES = ['pending', 'paid', 'processed', 'dispatched', 'completed', 'refunded'];

    protected $fillable = [
        'shipping_first_name', 'shipping_last_name', 'shipping_company_name', 'shipping_city', 'shipping_county', 'shipping_address1', 'shipping_address2', 'shipping_postcode', 'shipping_phone',
        'billing_first_name', 'billing_last_name', 'billing_company_name', 'billing_city', 'billing_county', 'billing_address1', 'billing_address2', 'billing_postcode', 'billing_phone',
        'email', 'additional_info', 'status', 'review',
        'payment_method', 'payment_id', 'delivery_price',
        'invoice'];


    public function products()
    {
        return $this->belongsToMany('App\Product')
            ->using('App\OrderProduct')
            ->withPivot('custom_size', 'hinge_side', 'hinge_top', 'hinge_center', 'hinge_bottom', 'hinge_left', 'hinge_right', 'position', 'quantity', 'price', 'ending_id', 'option_id', 'colour_id', 'sample');
    }

    public function getTotalPrice($formatted = true)
    {
        $products = $this->products()->get();
        $totalPrice = 0;
        foreach($products as $product) {
            $totalPrice += $product->pivot->quantity * $product->pivot->price;
        }
        return $formatted ? number_format($totalPrice, 2, '.', ',') : $totalPrice;
    }

    public function getDeliveryPrice($formatted = true)
    {
        return $formatted ? number_format($this->delivery_price, 2, '.', ',') : $this->delivery_price;
    }

    public function getFinalPrice($formatted = true)
    {
        return $formatted ? number_format($this->getTotalPrice(false) + $this->getDeliveryPrice(false), 2, '.', ',') : $this->getTotalPrice(false) + $this->getDeliveryPrice(false);
    }

    private static function getCartItemData($item)
    {
        $item['custom_size'] = (isset($item['width']) && isset($item['height']) && !empty($item['width']) && !empty($item['height'])) ? $item['height'].'mm x '.$item['width'].'mm' .((isset($item['depth']) && $item['depth'] != 0) ? ' x '.$item['depth'].'mm' : '') : null;

        return [
            'sample' => isset($item['isSample']) ? $item['isSample'] : false,
            'custom_size' => $item['custom_size'],
            'colour_id' => isset($item['colour_id']) && $item['colour_id'] > 0 ? $item['colour_id'] : null,
            'option_id' => isset($item['size_id']) && $item['size_id'] > 0 ? $item['size_id'] : null,
            'ending_id' => isset($item['ending_id']) && $item['ending_id'] > 0 ? $item['ending_id'] : null,
            'hinge_side' => isset($item['hinge_side']) && !empty($item['hinge_side']) ? $item['hinge_side'] : null,
            'hinge_top' => isset($item['hinge_top']) && !empty($item['hinge_top']) ? $item['hinge_top'] : null,
            'hinge_bottom' => isset($item['hinge_bottom']) && !empty($item['hinge_bottom']) ? $item['hinge_bottom'] : null,
            'hinge_center' => isset($item['hinge_center']) && !empty($item['hinge_center']) ? $item['hinge_center'] : null,
            'hinge_left' => isset($item['hinge_left']) && !empty($item['hinge_left']) ? $item['hinge_left'] : null,
            'hinge_right' => isset($item['hinge_right']) && !empty($item['hinge_right']) ? $item['hinge_right'] : null,
            'position' => isset($item['position']) && !empty($item['position']) ? $item['position'] : null,
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ];
    }

    public static function createPending($orderData, $cart, $paymentMethod)
    {
        $orderData['status'] = 'pending';
        $orderData['payment_method'] = $paymentMethod;

        $order = self::create($orderData);

        foreach ($cart as $item) {
            $order->products()->attach($item['product_id'], self::getCartItemData($item));
        }

        return $order;
    }

    public static function generateQuote($orderData, $cart)
    {
        $template = new TemplateProcessor(resource_path('views/word/quote.docx'));
        $WORD_NL = '</w:t><w:br/><w:t>';
        $BOLD_OPEN = '</w:t></w:r><w:r><w:rPr><w:b/></w:rPr><w:t xml:space="preserve">';
        $BOLD_CLOSE = '</w:t></w:r><w:r><w:t>';

        $products = [];

        $totalPrice = 0;
        $count = 1;
        foreach ($cart as $cartItem) {
            // Product details with options and drills
            $productDetails = $cartItem['name'];
            $item = self::getCartItemData($cartItem);
            if ($item['sample']) {
                $productDetails .= $WORD_NL . $BOLD_OPEN . 'SAMPLE' . $BOLD_CLOSE;
            }
            if ($item['ending_id']) {
                $attribute = Ending::find($item['ending_id']);
                $productDetails .= $WORD_NL . $BOLD_OPEN. 'Ending: ' . $BOLD_CLOSE . $attribute->name;
            }
            if ($item['colour_id']) {
                $attribute = Colour::find($item['colour_id']);
                $productDetails .= $WORD_NL . $BOLD_OPEN. 'Colour: ' . $BOLD_CLOSE . $attribute->name;
            }
            if ($item['option_id']) {
                $attribute = Option::find($item['option_id']);
                $productDetails .= $WORD_NL . $BOLD_OPEN. 'Option: ' . $BOLD_CLOSE . $attribute->name;
            }
            if ($item['custom_size']) {
                $productDetails .= $WORD_NL . $BOLD_OPEN. 'Custom Size: ' . $BOLD_CLOSE . $item['custom_size'];
            }
            if ($item['position']) {
                $productDetails .= $WORD_NL . $BOLD_OPEN. 'Position: ' . $BOLD_CLOSE . $item['position'];
            }
            if ($item['hinge_side']) {
                $productDetails .= $WORD_NL . $BOLD_OPEN. 'Hinge Drill: ' . $BOLD_CLOSE . $item['hinge_side'];
                if ($item['hinge_top']) {
                    $productDetails .= $WORD_NL . $BOLD_OPEN. 'Top Drill: ' . $BOLD_CLOSE . $item['hinge_top'];
                }
                if ($item['hinge_bottom']) {
                    $productDetails .= $WORD_NL . $BOLD_OPEN. 'Bottom Drill: ' . $BOLD_CLOSE . $item['hinge_bottom'];
                }
                if ($item['hinge_left']) {
                    $productDetails .= $WORD_NL . $BOLD_OPEN. 'Left Drill: ' . $BOLD_CLOSE . $item['hinge_left'];
                }
                if ($item['hinge_right']) {
                    $productDetails .= $WORD_NL . $BOLD_OPEN. 'Right Drill: ' . $BOLD_CLOSE . $item['hinge_right'];
                }
                if ($item['hinge_center']) {
                    $productDetails .= $WORD_NL . $BOLD_OPEN. 'Center Drills: ' . $BOLD_CLOSE . $item['hinge_center'];
                }
            }

            $products[] = [
                'id' => $count++,
                'productDetails' => $productDetails,
                'quantity' => $item['quantity'],
                'singlePrice' => '£' . number_format($item['price'], 2, '.', ','),
                'totalPrice' => '£' . number_format($item['price'] * $item['quantity'], 2, '.', ','),
            ];

            $totalPrice += $item['price'] * $item['quantity'];
        }

        $finalPrice = $totalPrice + $orderData['delivery_price'];
        $vat = $finalPrice * 0.2 / 1.2;

        $template->setValues([
            'quoteDate' => date('d/m/Y'),

            'clientName' => $orderData['shipping_first_name'] . ' ' . $orderData['shipping_last_name'],
            'clientAddress' => $orderData['shipping_address1'],
            'clientCity' => $orderData['shipping_city'],
            'clientCounty' => $orderData['shipping_county'],
            'clientPostcode' => $orderData['shipping_postcode'],
            'clientPhone' => $orderData['shipping_phone'],
            'clientEmail' => $orderData['email'],

            'subtotal' => '£' . number_format($totalPrice, 2, '.', ','),
            'delivery' => '£' . number_format($orderData['delivery_price'], 2, '.', ','),
            'vat' => '£' . number_format($vat, 2, '.', ','),
            'total' => '£' . number_format($finalPrice, 2, '.', ','),
        ]);

        $template->cloneRowAndSetValues('id', $products);

        $fileName = 'quotes/quote-'.date('YmdHis').'.docx';

        $template->saveAs(public_path($fileName));

        return $fileName;
    }

    public function generateInvoice()
    {
        $filename = public_path('invoices/'.$this->invoice.'.pdf');
        PDF::loadView('pdf.invoice', [
            'order' => $this
        ])->save($filename);
        return $filename;
    }

    private function setInvoiceNumber()
    {
        $this->invoice = substr($this->billing_first_name, 0, 1) . substr($this->billing_last_name, 0, 1) . date('Ymd') . $this->getNextInvoiceId();
        $this->save();
    }

    private function getNextInvoiceId()
    {
        $nullMonthYear = '04-05';
        $currentNullDate = Carbon::createFromFormat('Y-m-d', date('Y').'-'.$nullMonthYear);
        if (now()->lessThan($currentNullDate)) {
            $firstApril = (date('Y')-1).'-'.$nullMonthYear;
            $secondApril = date('Y').'-'.$nullMonthYear;
        } else {
            $firstApril = date('Y').'-'.$nullMonthYear;
            $secondApril = (date('Y')+1).'-'.$nullMonthYear;
        }
        $lastOrder = self::whereDate('created_at', '>=', $firstApril)
            ->whereDate('created_at', '<', $secondApril)
            ->where('status', '<>', 'pending')
            ->where('id', '<>', $this->id)
            ->latest()
            ->first();

        if (!$lastOrder) {
            return '0001';
        }

        $invoiceId = (int)(substr($lastOrder->invoice, 11)) + 1;
        return str_pad($invoiceId, 4, '0', STR_PAD_LEFT);
    }

    public function confirm($paymentId)
    {
        $this->payment_id = $paymentId;
        $this->status = 'paid';
        $this->setInvoiceNumber();
        $this->save();

        $attachment = $this->generateInvoice();

        Mail::to($this->email)->send(new OrderReceivedClient($this, $attachment));
        Mail::to(config('mail.from.address'))->send(new OrderReceivedAdmin($this, $attachment));

    }

    public function cancel()
    {
        $this->status = 'cancelled';
        $this->save();
    }

    public function sendReview()
    {
        Mail::to($this->email)->send(new OrderReview($this));
    }
}
