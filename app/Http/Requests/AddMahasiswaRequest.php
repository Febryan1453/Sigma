<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMahasiswaRequest extends FormRequest
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
            'nim'                        => 'required|min:11|unique:mahasiswas',
            'jurusan'                    => 'required',
            'gender'                     => 'required',
            'name'                       => 'required|min:4',
            'email'                      => 'required|unique:users|email',
            // 'password'                   => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'nim.min'                    => 'Nim mahasiswa minimal 11 karakter !',
            'nim.unique'                 => 'Nim mahasiswa telah terdaftar !',
            'nim.required'               => 'Nim mahasiswa dibutuhkan !',

            'jurusan.required'           => 'Jurusan dibutuhkan !',
            'gender.required'            => 'Gender dibutuhkan !',

            'name.required'              => 'Nama mahasiswa dibutuhkan !',
            'name.min'                   => 'Nama mahasiswa minimal 4 karakter !',

            'email.required'             => 'Alamat email dibutuhkan !',
            'email.unique'               => 'Alamat email telah terdaftar !',
            'email.email'                => 'Penulisan alamat emai salah !',

            'password.required'          => 'Password dibutuhkan !',
            'password.min'               => 'Password minimal 4 karakter !',
        ];
    }
}
