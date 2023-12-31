<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
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
        if($this->isMethod("post")){
            return [
                "name" => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., ]+$/u",
                "description" => "required|max:500|min:5",
                "image" => "required|image|mimes:png,jpg,jpeg,gif",
                "status" => "required|numeric|in:0,1",
                "tags" => "required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., ]+$/u",
            ];
        }else{
            return [
                "name" => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., ]+$/u",
                "description" => "required|max:500|min:5",
                "image" => "image|mimes:png,jpg,jpeg,gif",
                "status" => "required|numeric|in:0,1",
                "tags" => "required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., ]+$/u",
            ];
        }
    }
}
