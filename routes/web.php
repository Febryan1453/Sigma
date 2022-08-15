<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Embed\Embed;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.index');
});

Auth::routes([
    'register' => false,
]);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/add-admin', [AdminController::class, 'addAdmin'])->name('admin.addadmin');
    Route::post('/save-admin', [AdminController::class, 'saveAdmin'])->name('admin.saveadmin');
    Route::get('/list-admin', [AdminController::class, 'listAdmin'])->name('admin.listadmin');

    Route::get('/add-mahasiswa', [AdminController::class, 'addMhs'])->name('admin.addmhs');
    Route::post('/save-mhs', [AdminController::class, 'saveMhs'])->name('admin.savemhs');
    Route::get('/list-mahasiswa', [AdminController::class, 'listMhs'])->name('admin.listmhs');
    Route::get('/detail-mahasiswa/{id}', [AdminController::class, 'detailMhs'])->name('admin.detailmhs');

    Route::get('/add-tugas-mahasiswa', [AdminController::class, 'addTugasMahasiswa'])->name('admin.addtugasmhs');
    Route::post('/save-tugas-mahasiswa', [AdminController::class, 'saveTugasMahasiswa'])->name('admin.savetugasmhs');
    Route::get('/list-tugas-mahasiswa', [AdminController::class, 'listTugasMahasiswa'])->name('admin.listtugasmhs');
    Route::get('/edit-tugas-mahasiswa/{id}', [AdminController::class, 'editTugasMahasiswa'])->name('admin.edittugasmhs');
    Route::put('/save-edit-tugas-mahasiswa', [AdminController::class, 'saveEditTugasMahasiswa'])->name('admin.saveedittugasmhs');
    Route::put('/save-sts-edit-tugas-mahasiswa', [AdminController::class, 'saveStsEditTugasMahasiswa'])->name('admin.savestsedittugasmhs');
    
    Route::get('/lihat-tugas-mahasiswa/{id}', [AdminController::class, 'lihatTugasMahasiswa'])->name('admin.lihattugasmhs');
    Route::put('/periksa-tugas-mahasiswa', [AdminController::class, 'periksaTugasMahasiswa'])->name('admin.periksatugasmhs');
    Route::delete('/del-tugas-selesai', [AdminController::class, 'delTugasSelesai'])->name('admin.deltugasselesai');
    Route::put('/reset-pw-user', [AdminController::class, 'resetPass'])->name('admin.resetpass');

    Route::get('/lengkapi/my-profile/mahasiswa/{id}', [AdminController::class, 'lengkapiProfileMhs'])->name('admin.lengkapimyprofile');
    Route::put('/lengkapi/my-profile/mahasiswa/update', [AdminController::class, 'updateProfileMhs'])->name('admin.updatemyprofile');
    Route::delete('/del-admin', [AdminController::class, 'deleteUserAdmin'])->name('admin.deladmin');

});


Route::prefix('mahasiswa')->middleware(['auth','isMhs'])->group(function(){

    Route::get('/index', [MahasiswaController::class, 'index'])->name('mhs.index');

    Route::get('/my-profile', [MahasiswaController::class, 'myProfile'])->name('mhs.myprofile');
    Route::get('/lengkapi/my-profile', [MahasiswaController::class, 'lengkapiProfile'])->name('mhs.lengkapimyprofile');
    Route::put('/lengkapi/my-profile/update', [MahasiswaController::class, 'updateProfile'])->name('mhs.updatemyprofile');

    Route::get('/tugas-saya', [MahasiswaController::class, 'lihatTugas'])->name('mhs.tugassaya');
    Route::get('/add-tugas-saya/{id}', [MahasiswaController::class, 'addTugasSaya'])->name('mhs.addtugassaya');
    Route::post('/save-tugas-saya', [MahasiswaController::class, 'saveTugasSaya'])->name('mhs.savetugassaya');
    Route::get('/tugas-selesai', [MahasiswaController::class, 'tugasSelesai'])->name('mhs.tugasselesai');
    Route::delete('/del-tugas-selesai', [MahasiswaController::class, 'delTugasSelesai'])->name('mhs.deltugasselesai');
        
    Route::get('/edit-tugas-saya/{id}', [MahasiswaController::class, 'editTugasSaya'])->name('mhs.edittugassaya');
    Route::put('/save/edit-tugas-saya', [MahasiswaController::class, 'updateTugasSaya'])->name('mhs.updatetugassaya');
    Route::get('/ganti-password', [MahasiswaController::class, 'gantiPass'])->name('mhs.gantipass');
    Route::put('/proses-ganti-password', [MahasiswaController::class, 'prosesGantiPass'])->name('mhs.prosesgantipass');
   
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/test', function () {

//     $embed = new Embed();

//     //Load any url:
//     $info = $embed->get('https://www.youtube.com/watch?v=4YCLRpKY1cs');

//     return [
//         $info->code,
//     ];
// });


