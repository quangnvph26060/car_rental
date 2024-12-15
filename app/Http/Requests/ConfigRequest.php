<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:10',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'website' => 'nullable',
            'script'  => 'nullable',
            'title_seo' => 'nullable',
            'fanpage' => 'nullable',
            'description_seo' => 'nullable',
            'keywords_seo' => 'nullable',
            'map' => 'nullable',
            'copyright' => 'nullable',

            'about_us' => 'nullable',
            'commit_img' => 'nullable',
            'banner' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'about_us_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'about_us_content' => 'nullable',
            'working_hours' => 'nullable',
            'booking_procedure' => 'nullable',
            'advisory' => 'nullable',
            'headquarters' => 'nullable',
            'about_us_title' => 'nullable',

        ];
    }
    public function messages()
    {
        return __('request.messages');
    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề webstise',
            'logo' => 'Logo',
            'favicon' => 'Logo website',
            'website' => 'Url website',
            'script' => 'Script',
            'title_seo' => 'Tiêu đề seo',
            'fanpage' => 'Url panpage',
            'description_seo'  => 'Mô tả seo',
            'keywords_seo' => 'Từ khóa seo',
            'map' => 'Địa chỉ map',
            'about_us' => 'Lời giới thiệu',
            'banner' => 'Ảnh banner',
            'about_us_image' => 'Ảnh giới thiệu'
        ];
    }
}
