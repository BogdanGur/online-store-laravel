<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInfoRequest extends FormRequest
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
            "main_bg" => "mimes:png,jpg,jpeg",
            "page_bg" => "mimes:png,jpg,jpeg",
            "home_title" => "required",
            "home_title_ua" => "required",
            "home_mini_about" => "required",
            "home_mini_about_ua" => "required",
            "home_since" => "required",
            "home_since_ua" => "required",
            "home_subtitle" => "required",
            "home_subtitle_ua" => "required",
            "about_photo" => "mimes:png,jpg,jpeg",
            "about_title" => "required",
            "about_title_ua" => "required",
            "about_content" => "required",
            "about_content_ua" => "required",
            "contact_location" => "required",
            "contact_location_ua" => "required",
            "contact_phone" => "required",
            "contact_email" => "required",
        ];
    }

    public function messages() {
        return [
            "main_bg.mimes" => "Фото должно быть формата: jpg, jpeg, png",
            "page_bg.mimes" => "Фото должно быть формата: jpg, jpeg, png",
            "home_title.required" => "Вы не ввели Title",
            "home_title_ua.required" => "Вы не ввели Title",
            "home_mini_about.required" => "Вы не ввели Мини описание компании",
            "home_mini_about_ua.required" => "Вы не ввели Мини описание компании",
            "home_since.required" => "Вы не ввели Since",
            "home_since_ua.required" => "Вы не ввели Since",
            "home_subtitle.required" => "Вы не ввели Subtitle",
            "home_subtitle_ua.required" => "Вы не ввели Subtitle",
            "about_photo.mimes" => "Фото должно быть формата: jpg, jpeg, png",
            "about_title.required" => "Вы не ввели Title",
            "about_title_ua.required" => "Вы не ввели Title",
            "about_content.required" => "Вы не ввели Content",
            "about_content_ua.required" => "Вы не ввели Content",
            "contact_location.required" => "Вы не ввели Локацию",
            "contact_location_ua.required" => "Вы не ввели Локацию",
            "contact_phone.required" => "Вы не ввели Телефон",
            "contact_email.required" => "Вы не ввели Email",
        ];
    }
}
