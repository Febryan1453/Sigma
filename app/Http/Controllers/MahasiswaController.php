<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTugasSayaRequest;
use App\Http\Requests\GantiPwRequest;
use App\Http\Requests\MyProfileMhsRequest;
use App\Http\Requests\UpdateTugasRequest;
use App\Models\HasilTugas;
use App\Models\Mahasiswa;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $b = time();
        $hour = date("G",$b);

        if ($hour >= 5 && $hour <= 10){
            $salam = "Pagi";
        } elseif ($hour >= 11 && $hour <= 15){
            $salam = "Siang";
        }elseif ($hour >= 16 && $hour <= 18){
            $salam = "Sore";
        }elseif ($hour >= 19 && $hour <= 4){
            $salam = "Malam";
        }else{
            $salam = "Malam";
        }

        $mhs            = Auth::user()->name;
        $title          = "Selamat Datang - $mhs";

        $countRpl       = Tugas::where('jurusan','rpl')->count();
        $countTkj       = Tugas::where('jurusan','tkj')->count();
        $countDmm       = Tugas::where('jurusan','dmm')->count();

        /* 
            Status Tugas :
            1 = Diperiksa
            2 = Diterima
            3 = Ditolak
        */

        $tugasSelesai   = HasilTugas::where('mahasiswa_id',Auth::user()->mahasiswa->id)->where('status','2')->count();
        $tugasDitolak   = HasilTugas::where('mahasiswa_id',Auth::user()->mahasiswa->id)->where('status','3')->count();
        $tugasPeriksa   = HasilTugas::where('mahasiswa_id',Auth::user()->mahasiswa->id)->where('status','1')->count();

        return view('layouts.mhs.index',[
            'countRpl'      => $countRpl,
            'tugasSelesai'  => $tugasSelesai,
            'tugasDitolak'  => $tugasDitolak,
            'tugasPeriksa'  => $tugasPeriksa,
            'countTkj'      => $countTkj,
            'countDmm'      => $countDmm,
            'title'         => $title,
            'salam'         => $salam,
        ]);
    }

    public function myProfile()
    {
        $user_id = auth()->user()->id; 
        $detailUserMhs = Mahasiswa::where('user_id',$user_id)->first();
        $title = "My Profile - $detailUserMhs->name";
        return view('layouts.mhs.my-profile',[
            'detailUserMhs'     => $detailUserMhs,
            'title'             => $title,
        ]);
    }

    public function lengkapiProfile()
    {
        $user_id = auth()->user()->id; 
        $detailUserMhs = Mahasiswa::where('user_id',$user_id)->first();
        $title = "Lengkapi My Profile - $detailUserMhs->name";
        return view('layouts.mhs.edit-my-profile',[
            'detailUserMhs'     => $detailUserMhs,
            'title'             => $title,
        ]);
    }

    public function updateProfile(MyProfileMhsRequest $request)
    {
        $mhs = Mahasiswa::findOrFail($request->id);

        $mhs->name              = $request->name;
        $mhs->tempat_lahir      = $request->tempat_lahir;
        $mhs->tgl_lahir         = $request->tgl_lahir;
        $mhs->gender            = $request->gender;
        $mhs->alasan            = $request->alasan;
        $mhs->telp              = $request->telp;
        $mhs->isready           = 1;

        $mhs->update();

        return redirect()->route('mhs.myprofile')->with('Ok', "Profile berhasil diupdate !");
    }
        
    public function lihatTugas()
    {
        $jurusan = Auth::user()->mahasiswa->jurusan;
        $name = Auth::user()->mahasiswa->name;
        $title = "Tugas - $name";

        if($jurusan == 'rpl'){

        $tugasMhs = Tugas::where('jurusan', 'rpl')->where('status', '1')->orderBy('tugas_ke', 'DESC')->get();

        // $tugasMhs = Tugas::where('jurusan', 'rpl')->get();
        return view('layouts.mhs.lihat-tugas',[
            'tugasMhs'     => $tugasMhs,
            'title'        => $title,
        ]);

        }elseif($jurusan == 'tkj'){

        $tugasMhs = Tugas::where('jurusan', 'tkj')->where('status', '1')->orderBy('tugas_ke', 'DESC')->get();
        // $tugasMhs = Tugas::where('jurusan', 'tkj')->get();
        return view('layouts.mhs.lihat-tugas',[
            'tugasMhs'     => $tugasMhs,
            'title'           => $title,
        ]);          

        }else{

        $tugasMhs = Tugas::where('jurusan', 'dmm')->where('status', '1')->orderBy('tugas_ke', 'DESC')->get();
        // $tugasMhs = Tugas::where('jurusan', 'dmm')->get();
        return view('layouts.mhs.lihat-tugas',[
            'tugasMhs'     => $tugasMhs,
            'title'           => $title,
        ]);

        }
        
    }

    public function addTugasSaya($id)
    {
        $name = Auth::user()->mahasiswa->name;
        $title = "Kirim Tugas - $name";
        $tugas = Tugas::findOrFail($id);
        return view('layouts.mhs.add-tugas-saya',[
            'tugas'     => $tugas,
            'title'           => $title,
        ]);
    }

    public function saveTugasSaya(AddTugasSayaRequest $request)
    {
        $name = Auth::user()->mahasiswa->name;

        $tugasSaya                = new HasilTugas();
        $tugasSaya->mahasiswa_id  = Auth::user()->mahasiswa->id;
        $tugasSaya->tugas_id      = $request->tugas_id;
        $tugasSaya->link_tugas    = $request->link_tugas;
        $tugasSaya->kendala       = $request->kendala;
        $tugasSaya->status        = 1;
        $tugasSaya->save();

        return redirect()->route('mhs.tugasselesai')->with('Ok', "$name, berhasil menyelesaikan tugas $request->tugas_ke !");
    }

    public function tugasSelesai()
    {
        $name = Auth::user()->mahasiswa->name;
        $title = "Tugas Selesai - $name";

        $hasiltugas = HasilTugas::where('mahasiswa_id',Auth::user()->mahasiswa->id)->orderBy('created_at', 'DESC')->get();
        return view('layouts.mhs.tugas-selesai',[
            'hasiltugas'     => $hasiltugas,
            'title'           => $title,
        ]);
    }

    public function delTugasSelesai(Request $request)
    {

        $addTugasMhs                = HasilTugas::findOrFail($request->id);
        $addTugasMhs->delete();

        return redirect()->route('mhs.tugasselesai')->with('Ok', "Berhasil menghapus tugas !");

    }

    public function editTugasSaya($id)
    {
        $name = Auth::user()->mahasiswa->name;
        $title = "Edit Tugas - $name";
        $tugas = HasilTugas::findOrFail($id);
        $tugasTitle = Tugas::where('id', $tugas->tugas_id)->first();
        return view('layouts.mhs.edit-tugas-saya',[
            'tugas'          => $tugas,
            'tugasTitle'     => $tugasTitle,
            'title'          => $title,
        ]);
    }

    public function updateTugasSaya(UpdateTugasRequest $request)
    {
        $name = Auth::user()->mahasiswa->name;

        $tugasSaya                = HasilTugas::findOrFail($request->hasil_tugas_id);
        $tugasSaya->link_tugas    = $request->link_tugas;
        $tugasSaya->kendala       = $request->kendala;
        $tugasSaya->update();

        return redirect()->route('mhs.tugasselesai')->with('Ok', "Berhasil update tugas !");
    }

    public function gantiPass()
    {
        $title = "Ganti password";
        return view('layouts.mhs.ganti-pw-mhs',[
            'title'          => $title,
        ]);
    }

    public function prosesGantiPass(GantiPwRequest $request)
    {
        $old_pass = auth()->user()->password;
        $user_id = auth()->user()->id;        

        if(Hash::check($request->input('old_password'),$old_pass)){
            
            if(Hash::check($request->input('password'),$old_pass)){
                return redirect()->back()->with('Failed','Password baru tidak boleh sama dengan password sekarang !');
            }else{
                $user = User::find($user_id);
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->back()->with('Ok','Password berhasil diubah !');
            }             
                        
        }
        else{
            return redirect()->back()->with('Failed','Password salah !');
        }
    }

    public function materi()
    {
        $jurusan = Auth::user()->mahasiswa->jurusan;
        $title = "List Materi";
        if($jurusan == 'rpl'){
            $materi = Materi::where('jurusan',$jurusan)->orderBy('created_at', 'DESC')->paginate(5);
            return view('layouts.mhs.materi', compact('title','materi'));
        }elseif($jurusan == 'tkj'){
            $materi = Materi::where('jurusan',$jurusan)->orderBy('created_at', 'DESC')->paginate(5);
            return view('layouts.mhs.materi', compact('title','materi'));
        }else{
            $materi = Materi::where('jurusan',$jurusan)->orderBy('created_at', 'DESC')->paginate(5);
            return view('layouts.mhs.materi', compact('title','materi'));
        }
    }
}
