<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Edit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:10',
            'email'=>'required|email',
            'phone'=>'required|regex:/(038)[0-9]{8}/',
            'birthday'=>'required',
            'salary'=>'required|numeric',
            'image'=>'required|image',
            'sex'=>'required'
        ];
    }
}
