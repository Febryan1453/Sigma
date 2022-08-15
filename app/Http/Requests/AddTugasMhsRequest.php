<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTugasMhsRequest extends FormRequest
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
            'tugas_ke'                   => 'required|unique:tugas',
            'jurusan'                    => 'required',
            'soal'                       => 'required|min:10',
            'petunjuk'                   => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'tugas_ke.unique'            => 'Urutan tugas ini telah ditugaskan kepada mahasiswa !',
            'tugas_ke.required'          => 'Urutan tugas dibutuhkan !',

            'jurusan.required'           => 'Jurusan dibutuhkan !',

            'soal.required'              => 'Soal dibutuhkan !',
            'soal.min'                   => 'Soal minimal 10 karakter !',

            'petunjuk.required'          => 'Petunjuk dibutuhkan !',
            'petunjuk.min'               => 'Petunjuk minimal 10 karakter !',
        ];
    }
}
