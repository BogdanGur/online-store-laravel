<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => "required",
            "description" => "required|min:5",
            "price" => "required|integer",
            "size" => "required",
            "image.*" => "mimes:jpeg,jpg,png,webp",
        ];
    }

    public function messages() {
        return [
            "name.required" => "Вы не ввели Название товара",
            "description.required" => "Вы не ввели описание товара",
            "description.min" => "Слишком короткое описание",
            "price.required" => "Вы не ввели цену",
            "price.integer" => "Не похоже на цену товара",
            "image.required" => "Выберите фото",
            "image.mimes" => "Фото должно быть формата: jpeg, jpg, png, webp",
        ];
    }
}
