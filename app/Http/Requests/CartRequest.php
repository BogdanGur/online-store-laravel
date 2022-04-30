<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            "product_id" => "required",
            "size" => "required",
            "quantity" => "required",
            "total" => "required"
        ];
    }
    public function messages() {
        return [
            "product_id.required" => "Вы не выбрали товар",
            "size.required" => "Вы не выбрали размер",
            "quantity.required" => "Вы не выбрали кол-во товара",
            "total.required" => "Нету цены товара"
        ];
    }
}
