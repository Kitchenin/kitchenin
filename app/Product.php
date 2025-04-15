<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Product extends ShopModel
{
    use SoftDeletes, OrderByIndex;

    const COUNT_PER_PAGE = 24;

    protected $fillable = [
        'id',
        'category_id',
        'sku',
        'name',
        'slug',
        'description',
        'price',
        'active',
        'group_id',
        'order',
        'customizable',
        'sample_price',
        'index',
        'delivery',
        'dispatch',
        'new',
        'out_of_stock',
        'page_title',
        'meta_description',
        'rating',
        'ratings_count'
    ];

    protected $with = ['options', 'colours', 'parameters', 'photos'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function parameters()
    {
        return $this->hasMany('App\Parameter');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }

    public function colours()
    {
        return $this->belongsToMany('App\Colour')->withPivot('price');
    }

    public function endings()
    {
        return $this->belongsToMany('App\Ending');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function hasOptions()
    {
        return $this->options()->get()->count() > 0;
    }

    public function hasEndings()
    {
        return $this->endings()->get()->count() > 0;
    }

    public function hasColours()
    {
        return $this->colours()->get()->count() > 0;
    }

    public function hasColourPrices()
    {
        return $this->colours()->wherePivot('price', '>', 0)->get()->count() > 0;
    }

    public function getMinColourPrice()
    {
        return $this->colours()->wherePivot('price', '>', 0)->orderBy('colour_product.price', 'asc')->first()->pivot->price;
    }

    public function hasSizes()
    {
        return $this->options()->where('type', 'size')->get()->count() > 0;
    }

    public function hasCustomOptions()
    {
        return $this->options()->where('type', 'custom')->get()->count() > 0;
    }

    public function getMinOptionPrice()
    {
        return $this->options()->orderBy('price', 'asc')->first()->price;
    }

    public function getMinPriceAttribute()
    {
        if ($this->hasOptions()) {
            return $this->getMinOptionPrice();
        }

        if ($this->hasColourPrices()) {
            return $this->getMinColourPrice();
        }

        if ($this->price > 0) {
            return $this->price;
        }

        return -1;
    }

    public function getColourGroup()
    {
        if (!$this->hasColours()) {
            return null;
        }

        return $this->colours()->first()->colour_group_id;
    }

    public function getEndingGroup()
    {
        if (!$this->hasEndings()) {
            return null;
        }

        return $this->endings()->first()->ending_group_id;
    }

    /**
     * Get product by Id.
     *
     * @param $id
     * @return Product|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public static function getItem($slug)
    {
        $data = self::with(
            [
                'category',
                'parameters',
                'options' => function($query) {
                    return $query->orderBy('index', 'asc');
                },
                'endings',
                'colours' => function($query) {
                    return $query->whereNotNull('colour_product.price')->orderBy('index', 'asc');
                },
                'photos'
            ]
        )->where(
            'slug',
            $slug
        )->first();

        return $data;
    }

    public function addParameters($data)
    {
        foreach ($data as $parameter) {
            if (isset($parameter['name']) && !empty($parameter['name']) && isset($parameter['value']) && !empty($parameter['value'])) {
                $this->parameters()->create($parameter);
            }
        }
    }

    public function updateParameters($data) {
        $parameters = $this->parameters()->get();

        foreach ($parameters as $parameter) {
            if (!isset($data[$parameter->id])) {
                $parameter->delete();
            } else {
                $parameter->update($data[$parameter->id]);
                unset($data[$parameter->id]);
            }
        }

        $this->addParameters($data);
    }

    public function addColours($data)
    {
        foreach ($data as $key => $colour) {
            $this->colours()->attach($key, [
                'price' => $colour['price']
            ]);
        }
    }

    public function updateColours($data)
    {
        $this->colours()->sync($data);
    }

    public function addEndings($data)
    {
        foreach ($data as $key => $ending) {
            $this->endings()->attach($key);
        }
    }

    public function updateEndings($data)
    {
        $this->endings()->sync($data);
    }

    public function addOptions($data)
    {
        foreach ($data as $option) {
            if (isset($option['name']) && !empty($option['name']) && isset($option['price']) && !empty($option['price'])) {
                $option['type'] = 'size';
                $option['active'] = true;
                $this->options()->create($option);
            }
        }
    }

    public function updateOptions($data)
    {
        $options = $this->options()->get();

        foreach ($options as $option) {
            if (!isset($data[$option->id])) {
                $option->delete();
            } else {
                $option->update($data[$option->id]);
                unset($data[$option->id]);
            }
        }

        $this->addOptions($data);
    }

    public function updateOptionsFromFile(Collection $priceCollection)
    {
        $options = $this->options()->get();

        foreach ($options as $option) {
            $fileOption = $priceCollection->where('name', $option->name)->first();

            if (empty($fileOption)) {
                // Current option is missing from the file - delete it
                $option->delete();

            } else {
                // Option is present in the file - update it
                $option->update($fileOption);

                // Remove the updated option from the file prices collection, so we are left with only new options
                $key = $priceCollection->search( function($item) use ($option) {
                    return $item['name'] == $option->name;
                });
                $priceCollection->pull($key);
            }
        }

        // The collection contains only options, which were not present in the product - add them
        $this->addOptions($priceCollection->all());
    }

    public function getCustomSizePrize($width, $height, $depth)
    {
        $options = $this->options()
            ->orderBy('price', 'asc')
            ->get();

        foreach ($options as $option) {
            if ($option->width > 0 && $option->height > 0 &&
                (
                    ($width <= $option->width && $height <= $option->height && $depth == $option->depth)
                    ||
                    ($height <= $option->width && $width <= $option->height && $depth == $option->depth)
                )
            ) {
                return $option->price;
            }
        }

        throw new \Exception('Custom size not available');
    }

    /**
     * Get size
     *
     * @param $query
     * @param $size_id
     * @param $data_product
     * @return mixed
     */
    private static function get_size($query, $size_id, $data_product)
    {
        if (intval($size_id) === 0
            && intval($data_product['width'])
            && intval($data_product['height']) > 0
            && intval($data_product['depth']) > 0) {

            $data = $query->where('product_id', $data_product['product_id'])
                ->where('width', '>=', $data_product['width'])
                ->where('height', '>=', $data_product['height'])
                ->where('depth', '=', $data_product['depth'])
                ->where('active', 1)
                ->offset(0)
                ->limit(1);
        } else {
            $data = $query->where('id', $size_id)->where('active', 1);
        }

        return $data;
    }

    /**
     * Get product by Id.
     *
     * @param $data_product
     * @return array
     */
    public static function getItemAndRelatedParameters($data_product)
    {
        $coefficient_custom_size = Setting::select('value')
            ->where('name', '=', 'coefficient_custom_size')
            ->first()
            ->toArray();

        $product_id = $data_product['product_id'];
        $color_id   = $data_product['color_id'];
        $size_id    = $data_product['size_id'];
        $data = self::with(
            [
                'parameters' => function($query) use ($product_id) {
                    $query->where('product_id', $product_id);
                },
                'options'=> function($query) use ($size_id, $data_product) {
                    self::get_size($query, $size_id, $data_product);
                },
                'colours' => function($query) use ($color_id) {
                    $query->where('id', $color_id)->where('active', 1);
                },
                'endings' => function($query) use ($product_id) {
                    $query->where('product_id', $product_id)->where('active', 1);
                },
                'photos' => function($query) use ($product_id) {
                    $query->where('photoable_id', $product_id);
                },
            ]
        )->where(
            'id',
            '=',
            $product_id
        )->where(
            'active',
            '=',
            1
        )->first(['id','sku', 'name', 'price'])->toArray();

        if (intval($size_id) === 0 && intval($data_product['width']) > 0
            && intval($data_product['height']) > 0
            && intval($data_product['depth']) > 0) {

            // If have options with/height
            if (isset($data['options'][0])) {
                $price = floatval($data['options'][0]['price']);

                // And requested product with/height is not equals null
                if ($data_product['width'] !== null && $data_product['height'] !== null) {

                    $coeff_prec = $price * doubleval($coefficient_custom_size['value']);

                    // set the price = price of option + percentage from settings table
                    $data['price'] = $price + $coeff_prec;
                } else {

                    // set price null because width and height aren't set
                    $data['price'] = null; //$price;
                }
            } else {
                // set price null because custom size isn't available.
                $data['price'] = null;
            }
            unset($data['options'][0]);

            $data['width']  = $data_product['width'];
            $data['height'] = $data_product['height'];
            $data['depth']  = $data_product['depth'];

        } else {
            $option_size = isset($data['options'][0]['price']) ? $data['options'][0]['price'] : null;
            // this is for normal size
            $data['price']  = $data['price'] === null ? $option_size : $data['price'];
            $data['width']  = null;
            $data['height'] = null;
            $data['depth']  = null;
        }

        $data['hinge_side']   = $data_product['hinge_side'];
        $data['hinge_top']    = $data_product['hinge_top'];
        $data['hinge_center'] = $data_product['hinge_center'];
        $data['hinge_bottom'] = $data_product['hinge_bottom'];

        $data['quantity'] = $data_product['quantity'];

        return $data;
    }
    /**
     * Get items by given category ids.
     *
     * @param $ids
     * @return Product[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getItems($ids)
    {
        $data = self::with(
            [
                'photos',
                'colours'
            ]
        )->where(
            'active',
            1
        )->whereIn(
            'category_id',
            $ids
        )->get();

        foreach ($data as $item) {
            $item->minPrice = $item->getMinPriceAttribute();
        }

        return $data;

    }
}
