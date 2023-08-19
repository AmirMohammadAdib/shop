<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "question" => "required|max:220|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., -?-؟]+$/u",
            "answer" => "required|min:5",
            "status" => "required|numeric|in:0,1",
            "tags" => "required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., ]+$/u",
        ];
    }
}
