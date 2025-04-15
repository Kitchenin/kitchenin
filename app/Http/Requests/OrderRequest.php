<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'shipping_first_name'       => 'required',
            'shipping_last_name'        => 'required',
            'shipping_city'             => 'required',
            'shipping_county'           => 'required',
            'shipping_address1'         => 'required',
            'shipping_postcode'         => 'required',
            'shipping_phone'            => 'required',
            'billing_first_name'        => 'required',
            'billing_last_name'         => 'required',
            'billing_city'              => 'required',
            'billing_county'            => 'required',
            'billing_address1'          => 'required',
            'billing_postcode'          => 'required',
            'billing_phone'             => 'required',
            'email'                     => 'required|email',
        ];
    }

}
