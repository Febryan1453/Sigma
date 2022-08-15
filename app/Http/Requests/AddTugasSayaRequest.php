<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTugasSayaRequest extends FormRequest
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
            'link_tugas'                 => 'required|unique:hasil_tugas',
            'kendala'                    => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'link_tugas.unique'         => 'Link tugas sudah ada !',
            'link_tugas.required'       => 'Link tugas dibutuhkan !',

            'kendala.required'          => 'Kendala dibutuhkan !',
            'kendala.min'               => 'Kendala minimal 10 karakter !',
        ];
    }
}
