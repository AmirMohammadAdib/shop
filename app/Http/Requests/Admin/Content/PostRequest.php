<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                "title" => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ِ., ]+$/u",
                "summary" => "required|max:500|min:5",
                "body" => "required|min:5",
                "image" => "required|image|mimes:jpg,png,jpeg",
                "status" => "required|numeric|in:0,1",
                "category_id" => "required|numeric|min:1|exists:post_categories,id",
                "tags" => "required",
                "published_at" => "required|numeric",
                "commentable" => "required|numeric|in:0,1",
            ];
        
        }else{
            return [
                "title" => "required|max:120|min:2",
                "summary" => "required|max:500|min:5",
                "body" => "required|min:5",
                "image" => "image|mimes:jpg,png,jpeg",
                "status" => "required|numeric|in:0,1",
                "category_id" => "required|numeric|min:1|exists:post_categories,id",
                "tags" => "required",
                "published_at" => "numeric",
                "commentable" => "required|numeric|in:0,1",
            ];
        }
    }
}
