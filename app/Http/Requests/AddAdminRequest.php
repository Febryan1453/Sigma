<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminRequest extends FormRequest
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
            'name'                       => 'required|min:4',
            'email'                      => 'required|unique:users|email',
            'password'                   => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.required'              => 'Nama dibutuhkan !',
            'name.min'                   => 'Nama minimal 4 karakter!',

            'email.required'             => 'Alamat email dibutuhkan !',
            'email.unique'               => 'Alamat email telah terdaftar !',
            'email.email'                => 'Penulisan alamat emai salah !',

            'password.required'          => 'Password dibutuhkan !',
            'password.min'               => 'Password minimal 4 karakter!',
        ];
    }
}
