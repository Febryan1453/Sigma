<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriRequest extends FormRequest
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
            'jurusan'                    => 'required',
            'dosen'                      => 'required|min:4',
            // 'link_materi'                => 'required|unique:materis',
            'nama_materi'                => 'required',
            'tgl_materi'                 => 'required',
            'rincian_materi'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'jurusan.required'           => 'Jurusan dibutuhkan !',

            'dosen.required'             => 'Nama pengajar dibutuhkan !',
            'dosen.min'                  => 'Nama pengajar minimal 4 karakter !',

            'link_materi.required'=> 'Link rekaman materi dibutuhkan !',
            'link_materi.unique'  => 'Link sudah ada !',

            'nama_materi.required'       => 'Materi dibutuhkan !',

            'tgl_materi.required'        => 'Tanggal materi dibutuhkan !',

            'rincian_materi.required'    => 'Rincian materi dibutuhkan !',
        ];
    }
}
