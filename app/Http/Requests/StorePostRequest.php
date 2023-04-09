<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('web')->check();
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title, '-'),
            "user_id" => auth("web")->id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "user_id" => ["required", "exists:users,id"],
            'title' => 'required | min:3',
            'slug' => 'required | min:3 | unique:posts' ,
            'content' => 'required',
        ];
    }
}
