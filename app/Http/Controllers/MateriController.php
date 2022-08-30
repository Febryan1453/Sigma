<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriRequest;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi()
    {
        $title = "List Materi";
        $materi = Materi::orderBy('created_at', 'DESC')->paginate(5);
        return view('layouts.admin.materi.materi', compact('title','materi'));
    }

    public function addMateri()
    {
        $title = "Tambah Materi Dibawakan";
        return view('layouts.admin.materi.add-materi', compact('title'));
    }

    public function storeMateri(MateriRequest $request)
    {
        $materi                     = new Materi();
        $materi->jurusan            = $request->jurusan;
        $materi->dosen              = $request->dosen;
        $materi->link_materi        = $request->link_materi;
        $materi->nama_materi        = $request->nama_materi;
        $materi->tgl_materi         = $request->tgl_materi;
        $materi->rincian_materi     = $request->rincian_materi;
        $materi->save();

        return redirect()->route('admin.materi')->with('Ok', "Berhasil menyimpan materi baru");
    }

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $title = "Edit Materi $materi->nama_materi";
        return view('layouts.admin.materi.edit-materi', compact('title','materi'));
    }

    public function saveMateri(MateriRequest $request)
    {
        $materiEdit                     = Materi::findOrFail($request->id);
        $materiEdit->jurusan            = $request->jurusan;
        $materiEdit->dosen              = $request->dosen;
        $materiEdit->link_materi        = $request->link_materi;
        $materiEdit->nama_materi        = $request->nama_materi;
        $materiEdit->tgl_materi         = $request->tgl_materi;
        $materiEdit->rincian_materi     = $request->rincian_materi;
        $materiEdit->update();

        return redirect()->route('admin.materi')->with('Ok', "Berhasil memperbarui materi");
    }

    public function delMateri(Request $request)
    {
        $delMateri = Materi::findOrFail($request->id);
        $delMateri->delete();
        return redirect()->route('admin.materi')->with('Ok', "Berhasil menghapus materi");
    }
}
