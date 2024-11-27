<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TalabaStoreRequest extends FormRequest
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
            'name'=>'required',
            'age'=>'required',
            'email'=>'required',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Nameni to\'lidiring',
            'age.required'=>'Age ni to\'ldiring',
            'email.required'=>'Emailni to\'ldiring',
            'password.required'=>'Passwordni to\'ldiring',
        ];
    }
}
