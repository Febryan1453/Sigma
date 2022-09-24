<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiMahasiswa as Nilai;
use App\Models\Tugas;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NilaiMahasiswa extends Controller
{
    public function index()
    {
        $title = "Nilai Per Mahasiswa";
        $mhs = Mahasiswa::orderBy('name','ASC')->get();
        return view('layouts.admin.nilai.index',[
            'title' => $title,
            'mhs'   => $mhs,
        ]);
    }

    public function detail_nilai($mahasiswa_id)
    {
        $mhs = Mahasiswa::findOrFail($mahasiswa_id);
        $title = "Nilai $mhs->name";
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

    public function delete_nilai(Request $request)
    {
        $nilai = Nilai::findOrFail($request->id);
        $nilai->delete();
        return redirect()->back()->with('Ok', "Nilai berhasil dihapus !");
    }

    public function per_tugas(Request $request)
    {
        $title = "Nilai Per Tugas";

        if ($request->ajax()) {
            $tugas = Tugas::all();
            return DataTables::of($tugas)
                ->addIndexColumn()
                ->addColumn('action', function($tugas){
                    $button = '<a href="tugas/'.$tugas->id.'">Lihat Nilai Tugas</a>';
                    return $button;
                })
                ->editColumn('deadline', function($tugas){ 
                    $formatedDate = Carbon::parse($tugas->deadline)->translatedFormat('d F Y'); 
                    return $formatedDate; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('layouts.admin.nilai.per-tugas',[
            'title'     => $title,
        ]);
    }

    public function detail_tugas($id)
    {
        $tugas = Tugas::findOrFail($id);
        $title = "Nilai Tugas $tugas->tugas_ke";
        $nilai = Nilai::where('tugas_id',$id)->orderBy('nilai','DESC')->get();
        return view('layouts.admin.nilai.detail-tugas',[
            'title'     => $title,
            'tugas'     => $tugas,
            'nilai'     => $nilai,
        ]);
    }

    public function edit_nilai(Request $request)
    {
        $nama               = Mahasiswa::findOrFail($request->mhs_id);
        $nilai              = Nilai::findOrFail($request->id);
        $nilai->nilai       = $request->nilai;
        $nilai->update();
        return redirect()->back()->with('Ok', "Nilai $nama->name berhasil diubah !");
    }
}
