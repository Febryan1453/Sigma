<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiMahasiswa as Nilai;
use DateTime;
use Illuminate\Http\Request;

class NilaiMahasiswa extends Controller
{
    public function index()
    {
        $title = "Nilai Mahasiswa";
        $mhs = Mahasiswa::orderBy('name','ASC')->get();
        return view('layouts.admin.nilai.index',[
            'title' => $title,
            'mhs'   => $mhs,
        ]);
    }

    public function detail_nilai($mahasiswa_id)
    {
        $title = "Nilai Mahasiswa";
        $mhs = Mahasiswa::findOrFail($mahasiswa_id);
        $nilai = Nilai::where('mahasiswa_id',$mahasiswa_id)->get();

        $tglLahir = new DateTime($mhs->tgl_lahir);
        $toDay = new DateTime('today');
        $y = $toDay->diff($tglLahir)->y;
        $m = $toDay->diff($tglLahir)->m;
        $d = $toDay->diff($tglLahir)->d;

        return view('layouts.admin.nilai.detail',[
            'mhs'       => $mhs,
            'nilai'     => $nilai,
            'title'     => $title,
            'y'         => $y,
            'm'         => $m,
            'd'         => $d,
        ]);
    }

    public function simpan_nilai(Request $request)
    {
        $nilai = $request->nilai;
        $nama = $request->nama;

        $addNilai                   = new Nilai();
        $addNilai->hasil_tugas_id   = $request->id;
        $addNilai->tugas_id         = $request->tugas_id;
        $addNilai->mahasiswa_id     = $request->mahasiswa_id;
        $addNilai->nilai            = $nilai;
        $addNilai->jurusan          = $request->jurusan;
        $addNilai->save();

        return redirect()->back()->with('Ok', "Nilai $nilai diberkan kepada $nama !");
    }
}
