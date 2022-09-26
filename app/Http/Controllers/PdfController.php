<?php

namespace App\Http\Controllers;

use App\Models\NilaiMahasiswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function nilai_per_tugas($tugas_id)
    {
        $nilai = NilaiMahasiswa::where('tugas_id', $tugas_id)->orderby('nilai','DESC')->get();
        $tugas = Tugas::findOrFail($tugas_id);

        $fileName = "Daftar Nilai Tugas $tugas->tugas_ke";

    	$pdf = Pdf::loadview('layouts.pdf.nilai-per-tugas',[
            'nilai' =>$nilai,
            'tugas' =>$tugas,
        ]);

        return $pdf->stream($fileName);
    	// return $pdf->download('laporan-pegawai-pdf');
    }
}
