<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\AddMahasiswaRequest;
use App\Http\Requests\AddTugasMhsRequest;
use App\Http\Requests\EditTugasMhsRequest;
use App\Http\Requests\MyProfileMhsAdminRequest;
use App\Models\HasilTugas;
use App\Models\Mahasiswa;
use App\Models\Tugas;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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

        $title = "Dashboard - Admin";
        $countMhs = Mahasiswa::count();
        $countRpl = Tugas::where('jurusan','rpl')->count();
        $countTkj = Tugas::where('jurusan','tkj')->count();
        $countDmm = Tugas::where('jurusan','dmm')->count();
        return view('layouts.admin.index',[
            'countMhs'      => $countMhs,
            'countRpl'      => $countRpl,
            'countTkj'      => $countTkj,
            'countDmm'      => $countDmm,
            'title'         => $title,
            'salam'         => $salam,
        ]);
    }

    public function addAdmin()
    {
        $title = "Tambah User Admin";
        return view('layouts.admin.add-admin',[
            'title'     => $title,
        ]);
    }

    public function saveAdmin(AddAdminRequest $request)
    {

        $userAdmin              = new User();
        $userAdmin->name        = $request->name;
        $userAdmin->email       = $request->email;
        $userAdmin->password    = Hash::make($request->password);
        $userAdmin->role        = 1;
        $userAdmin->save();

        return redirect()->route('admin.addadmin')->with('Ok', "Berhasil menambah akun admin");

    }
    
    public function listAdmin()
    {
        $title = "Data User Admin";
        $userAdmin = User::where('role',1)->get();
        return view('layouts.admin.list-admin',[
            'userAdmin'     => $userAdmin,
            'title'     => $title,
        ]);
    }
        
    public function addMhs()
    {
        $title = "Tambah Data Mahasiswa";
        return view('layouts.admin.add-mhs',[
            'title'     => $title,
        ]);
    }

    public function saveMhs(AddMahasiswaRequest $request)
    {

        // dd($request->all());
        $userMahasiswa              = new User();
        $userMahasiswa->name        = $request->name;
        $userMahasiswa->email       = $request->email;
        $userMahasiswa->password    = Hash::make("idn123");
        $userMahasiswa->role        = 0;
        $userMahasiswa->save();

        $dataMahasiswa              = new Mahasiswa();
        $dataMahasiswa->user_id     = $userMahasiswa->id;
        $dataMahasiswa->nim         = $request->nim;
        $dataMahasiswa->gender      = $request->gender;
        $dataMahasiswa->name        = $request->name;
        $dataMahasiswa->jurusan     = $request->jurusan;
        $dataMahasiswa->save();

        return redirect()->route('admin.addmhs')->with('Ok', "Data $request->name berhasil ditambahkan ke database !");
    }
    
    public function listMhs()
    {
        $title = "Data Mahasiswa";
        $userMhs = User::where('role',0)->paginate(10);
        return view('layouts.admin.list-mhs',[
            'userMhs'     => $userMhs,
            'title'       => $title,
        ]);
    }
    
    public function deleteAkunMhs(Request $request)
    {
        // Satu klik tombol maka aksinya ada 3 yaitu :

        // 1. Hapus data hasil tugas mahasiswa dulu
        // 2. Lalu hapus data mahasiswa
        // 3. Terakhir hapus data user mahasiswa

        // https://www.rajaputramedia.com/artikel/hapus-banyak-data-sekaligus-dengan-php-mysql.php
        // https://id-laravel.com/post/interaksi-dengan-database/

        // 1. Logic Hapus Tugas Mahasiswa
        $tugasMhs       = HasilTugas::where('mahasiswa_id', $request->mahasiswa_id)->get();
        $tugasIdMhs     = Arr::pluck($tugasMhs, 'id');        
        $jmlTugasMhs    = count($tugasIdMhs);

        for( $x = 0; $x < $jmlTugasMhs; $x++) {
            DB::delete("delete from hasil_tugas where id = '$tugasIdMhs[$x]'");
        }

        // 2. Logic Hapus Data Mahasiswa (Tunggal)
        $mhsId                  = Mahasiswa::findOrFail($request->mahasiswa_id);
        $mhsId->delete();

        // 3. Logic Hapus User Akses Mahasiswa
        $idUserMhs              = User::findOrFail($request->id_user);
        $idUserMhs->delete();

        return redirect()->back()->with('Ok', "Data $request->name berhasil dihapus !");
    }
    
    public function detailMhs($id)
    {
        $detailUserMhs = Mahasiswa::where('user_id',$id)->first();
        $title = "Detail Mahasiswa - $detailUserMhs->nim";

        // https://bayu.pinasthika.com/ti/menghitung-umur-berdasarkan-tanggal-lahir-dengan-php/
        $tglLahir = new DateTime($detailUserMhs->tgl_lahir);
        $toDay = new DateTime('today');
        $y = $toDay->diff($tglLahir)->y;
        $m = $toDay->diff($tglLahir)->m;
        $d = $toDay->diff($tglLahir)->d;

        $hasiltugas = HasilTugas::where('mahasiswa_id', $detailUserMhs->id)->orderBy('created_at', 'DESC')->get();

        return view('layouts.admin.detail-mhs',[
            'detailUserMhs'     => $detailUserMhs,
            'title'             => $title,
            'hasiltugas'        => $hasiltugas,
            'y'                 => $y,
            'm'                 => $m,
            'd'                 => $d,
        ]);
    }
    
    public function addTugasMahasiswa()
    {
        $title = "Tambah Tugas Mahasiswa";
        return view('layouts.admin.add-tugas-mhs',[
            'title'     => $title,
        ]);
    }
        
    public function saveTugasMahasiswa(AddTugasMhsRequest $request)
    {
        $name = Auth::user()->name;

        $addTugasMhs                = new Tugas();
        $addTugasMhs->tugas_ke      = $request->tugas_ke;
        $addTugasMhs->soal          = $request->soal;
        $addTugasMhs->jurusan       = $request->jurusan;
        $addTugasMhs->petunjuk      = $request->petunjuk;
        $addTugasMhs->deadline      = $request->deadline;
        $addTugasMhs->jam_deadline  = $request->jam_deadline;
        $addTugasMhs->status        = 1;
        $addTugasMhs->save();

        return redirect()->route('admin.addtugasmhs')->with('Ok', "$name, Menambahkan tugas $request->tugas_ke kepada mahasiswa $request->jurusan !");

    }
    
    public function listTugasMahasiswa()
    {
        $title = "Tugas Mahasiswa";
        // $tugasMhsRpl = Tugas::where('jurusan','rpl')->get();
        $tugasMhsRpl = Tugas::where('jurusan','rpl')->orderBy('created_at', 'DESC')->paginate(5);
        // $tugasMhsTkj = Tugas::where('jurusan','tkj')->get();
        $tugasMhsTkj = Tugas::where('jurusan','tkj')->orderBy('created_at', 'DESC')->paginate(5);
        // $tugasMhsDmm = Tugas::where('jurusan','dmm')->get();
        $tugasMhsDmm = Tugas::where('jurusan','dmm')->orderBy('created_at', 'DESC')->paginate(5);
        
        return view('layouts.admin.list-tugas-mhs',[
            'tugasMhsRpl'     => $tugasMhsRpl,
            'tugasMhsTkj'     => $tugasMhsTkj,
            'tugasMhsDmm'     => $tugasMhsDmm,
            'title'           => $title,
        ]);
    }

    public function editTugasMahasiswa($id)
    {
        $editTugas = Tugas::findOrFail($id);
        $title = "Edit Tugas $editTugas->tugas_ke";
        return view('layouts.admin.edit-tugas-mhs',[
            'editTugas'     => $editTugas,
            'title'     => $title,
        ]);
    }

    public function saveEditTugasMahasiswa(EditTugasMhsRequest $request)
    {
        $name = Auth::user()->name;

        $addTugasMhs                = Tugas::findOrFail($request->id);
        $addTugasMhs->soal          = $request->soal;
        $addTugasMhs->jurusan       = $request->jurusan;
        $addTugasMhs->petunjuk      = $request->petunjuk;
        $addTugasMhs->deadline      = $request->deadline;
        $addTugasMhs->jam_deadline  = $request->jam_deadline;
        $addTugasMhs->update();

        return redirect()->route('admin.listtugasmhs')->with('Ok', "$name, Mengubah tugas $request->tugas_ke untuk mahasiswa $request->jurusan !");

    }

    public function saveStsEditTugasMahasiswa(Request $request)
    {
        $name = Auth::user()->name;

        $addTugasMhs                = Tugas::findOrFail($request->id);
        $addTugasMhs->status        = $request->status;
        $addTugasMhs->update();

        return redirect()->route('admin.listtugasmhs')->with('Ok', "$name, Mengubah tugas $request->tugas_ke untuk mahasiswa $request->jurusan !");

    }
    
    public function lihatTugasMahasiswa($id)
    {
        $hasilTugas = HasilTugas::where('tugas_id',$id)->get();
        $tugas      = Tugas::findOrFail($id);
        $title = "Tugas $tugas->tugas_ke";
        return view('layouts.admin.list-tugaske-mhs',[
            'hasilTugas'     => $hasilTugas,
            'tugas'          => $tugas,
            'title'          => $title,
        ]);
    }
    
    public function periksaTugasMahasiswa(Request $request)
    {
        
        $addTugasMhs                = HasilTugas::findOrFail($request->id);
        $addTugasMhs->status        = $request->status;
        $addTugasMhs->komentar      = $request->komentar;
        $addTugasMhs->update();

        return redirect()->back()->with('Ok', "Berhasil memeriksa tugas !");

    }

    public function delTugasSelesai(Request $request)
    {

        $addTugasMhs                = HasilTugas::findOrFail($request->id);
        $addTugasMhs->delete();

        return redirect()->back()->with('Ok', "Berhasil menghapus tugas !");

    }

    public function resetPass(Request $request)
    {

        $user                = User::findOrFail($request->id);
        $user->password      = Hash::make("idn123");
        $user->update();

        return redirect()->back()->with('Ok', "Berhasil mengubah password $user->name ke default !");

    }

    public function deleteUserAdmin(Request $request)
    {

        $userAdmin                = User::findOrFail($request->id);
        $userAdmin->delete();

        return redirect()->back()->with('Ok', "Berhasil menghapus admin !");

    }

    public function lengkapiProfileMhs($id)
    {
        $detailUserMhs = Mahasiswa::findOrFail($id);
        $title = "Edit Profile - $detailUserMhs->name";
        return view('layouts.admin.edit-my-profile-mhs',[
            'detailUserMhs'     => $detailUserMhs,
            'title'             => $title,
        ]);
    }

    public function updateProfileMhs(MyProfileMhsAdminRequest $request)
    {
        $mhs                    = Mahasiswa::findOrFail($request->id);

        $mhs->nim               = $request->nim;
        $mhs->name              = $request->name;
        $mhs->tempat_lahir      = $request->tempat_lahir;
        $mhs->tgl_lahir         = $request->tgl_lahir;
        $mhs->jurusan           = $request->jurusan;
        $mhs->gender            = $request->gender;
        $mhs->telp              = $request->telp;
        $mhs->alasan            = $request->alasan;
        $mhs->isready           = 1;

        $mhs->update();

        return redirect()->route('admin.detailmhs',$mhs->user_id)->with('Ok', "Profile berhasil diupdate !");
    }

    public function deleteTugasId()
    {
        $title = "Delete Tugas Mahasiswa";
        return view('layouts.admin.del-tugas-id', compact('title'));
    }

    public function actionDeleteTugasId(Request $request)
    {
        $idHasil = $request->id_tugas;

        if(empty($idHasil)){
            return redirect()->route('admin.deltugasid')->with('Failed', "ID Jangan Kosong !");
        }else{
            $tugasHapus = HasilTugas::where('id', $idHasil)->first();
            if(!empty($tugasHapus->id)){
                $hapus = HasilTugas::findOrFail($tugasHapus->id);
                $namaMhs = $hapus->mhs->name;
                $tugasKe = $hapus->tugas->tugas_ke;
                $hapus->delete();
                return redirect()->route('admin.deltugasid')->with('Ok', "Tugas $namaMhs yang ke $tugasKe berhasil dihapus !");
            }else{
                return redirect()->route('admin.deltugasid')->with('Failed', "ID Tidak Ditemukan !");
            }
        }
    }
    
}
