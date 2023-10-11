<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:10',
            'email'=>'required|unique:info|email',
            'phone'=>'required|unique:info|regex:/(038)[0-9]{8}/',
            'birthday'=>'required',
            'salary'=>'required|numeric',
            'image'=>'image',
            'sex'=>'required'
        ];
    }
    public function messages()  {
        return [
                'email.unique'=>'Email đã có',
                'phone.unique'=>'SDT da co'];
    }
}
