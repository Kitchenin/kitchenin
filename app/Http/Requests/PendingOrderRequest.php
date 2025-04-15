<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendingOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order.shipping_first_name'       => 'required',
            'order.shipping_last_name'        => 'required',
            'order.shipping_city'             => 'required',
            'order.shipping_county'           => 'required',
            'order.shipping_address1'         => 'required',
            'order.shipping_postcode'         => 'required',
            'order.shipping_phone'            => 'required',
            'order.billing_first_name'        => 'required',
            'order.billing_last_name'         => 'required',
            'order.billing_city'              => 'required',
            'order.billing_county'            => 'required',
            'order.billing_address1'          => 'required',
            'order.billing_postcode'          => 'required',
            'order.billing_phone'             => 'required',
            'order.email'                     => 'required|email',
            'cart' => 'required'
        ];
    }

}
