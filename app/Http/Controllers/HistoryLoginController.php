<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogin;
use Illuminate\Http\Request;

class HistoryLoginController extends Controller
{
    public function index()
    {
        $title = "History Login User";
        $history = HistoryLogin::orderBy('waktu_login', 'DESC')->get();
        return view('layouts.admin.history.index',[
            'history'   => $history,
            'title'     => $title,
        ]);
    }

    public function destroy(Request $request)
    {
        $historyId = HistoryLogin::findOrFail($request->id);
        $historyId->delete();

        return redirect()->back()->with('Ok', "Berhasil menghapus history user !");
    }
}
