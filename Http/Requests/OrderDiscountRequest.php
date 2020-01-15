<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Product\Entities\Product;
use Modules\Order\Entities\Item;
use Modules\Order\Rules\Multiple;

class OrderDiscountRequest extends FormRequest
{



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'discount' => 'numeric|min:0|max:100|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'discount.numeric' => 'Disconto precisa ser numérico',
            'discount.max' => 'Disconto não pode ser maior que :max',
            'discount.min' => 'Disconto não pode ser menor que :min',
        ];
    }
}
