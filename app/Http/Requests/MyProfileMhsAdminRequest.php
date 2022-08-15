<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyProfileMhsAdminRequest extends FormRequest
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
            // 'nim'                        => 'required|min:11|unique:mahasiswas',
            'nim'                        => 'required|min:11',
            'name'                       => 'required|min:4',
            'tempat_lahir'               => 'required',
            'tgl_lahir'                  => 'required',
            'jurusan'                    => 'required',
            'gender'                     => 'required',
            'alasan'                     => 'required',
            'telp'                       => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'nim.min'                    => 'Nim mahasiswa minimal 11 karakter !',
            'nim.unique'                 => 'Nim mahasiswa telah terdaftar !',
            'nim.required'               => 'Nim mahasiswa dibutuhkan !',

            'name.required'              => 'Nama dibutuhkan !',
            'name.min'                   => 'Nama minimal 4 karakter !',

            'telp.required'              => 'Telepon dibutuhkan !',
            'telp.min'                   => 'Telepon minimal 10 karakter !',

            'tempat_lahir.required'      => 'Tempat lahir dibutuhkan !',
            'tgl_lahir.required'         => 'Tanggal lahir dibutuhkan !',

            'jurusan.required'           => 'Jurusan dibutuhkan !',

            'alasan.required'            => 'Alasan dibutuhkan !',

            'gender.required'            => 'Jenis kelamin dibutuhkan !',
        ];
    }
}
