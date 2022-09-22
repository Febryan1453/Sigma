<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogin;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class HistoryLoginController extends Controller
{
    public function index()
    {
        $title = "History Login User v1";
        $history = HistoryLogin::orderBy('waktu_login', 'DESC')->get();
        // $history = HistoryLogin::orderBy('index', 'DESC')->get();
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

    public function index_yajra(Request $request)
    {
        $title = "History Login User v2";
        if ($request->ajax()) {
            // $data = HistoryLogin::select('id','name','waktu_login','ip','os','name')->get();
            $data = HistoryLogin::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    // $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>';
                    // $button .= '   <button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i> Delete</button>';
                    $button = '   <button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->addColumn('checkbox', '<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}" />')
                ->rawColumns(['checkbox','action'])
                ->make(true);
        }
        return view('layouts.admin.history.history-yajra',[
            'title'     => $title,
        ]);
    }

    public function destroy_yajra($id)
    {
        $data = HistoryLogin::findOrFail($id);
        $data->delete();
    }

    function removeall(Request $request)
    {
        $user_id_array = $request->input('id');
        $user = HistoryLogin::whereIn('id', $user_id_array);
        if($user->delete())
        {
            echo 'Data Deleted';
        }
    }
}
