<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GantiPwRequest extends FormRequest
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
            // 'old_password'                       => 'required|min:4',
            'old_password'                       => 'required',
            'password'                           => 'required|min:6',
            'confirm_password'                   => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'              => 'Password sekarang dibutuhkan !',
            'old_password.min'                   => 'Password sekarang minimal 4 karakter!',

            'password.required'                  => 'Password baru dibutuhkan !',
            'password.confirmed'                 => 'Password baru dibutuhkan !',
            'password.min'                       => 'Password baru minimal 6 karakter!',

            'confirm_password.required'          => 'Password konfirmasi dibutuhkan !',
            'confirm_password.min'               => 'Password konfirmasi minimal 6 karakter!',
        ];
    }
}
