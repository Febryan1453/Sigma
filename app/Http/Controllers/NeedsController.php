<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class NeedsController extends Controller
{
    public function detailMateri($id)
    {
        $materi = Materi::findOrFail($id);

        return view('layouts.needs.detail-materi',[
            'materi' => $materi,
        ]);
    }
}
