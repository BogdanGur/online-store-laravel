<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            "name" => "required|min:3",
            "surname" => "required|min:3",
            "photo" => 'mimes:jpeg,jpg,png',
            "email" => "required|email",
            "phone" => "required"
        ];
    }

    public function messages() {
        return [
            "name.required" => "Вы не ввели имя",
            "name.min" => "Слишком короткое имя",
            "surname.required" => "Вы не ввели фамилию",
            "surname.min" => "Слишком короткая фамилия",
            "photo.mimes" => "Фото должно быть формата: jpeg, jpg, png",
            "email.required" => "Вы не ввели Email",
            "email.email" => "Не похоже на Email...",
            "phone.required" => "Вы не ввели ваш номер телефона"
        ];
    }
}
