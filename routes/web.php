<?php

use App\Http\Controllers\NegaraController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfilesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YbcategoriesController;
use App\Http\Controllers\PanggilanController;
use Illuminate\Support\Facades\Route;
use App\Models\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});
Route::get('/home', [UserProfilesController::class,'dashboardAdmin'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/userDashboard',[UserProfilesController::class,'dashboard'])->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //profiles
    Route::get('/profileIndex', [UserProfilesController::class,'index'])->name('userprofiles.index');
    Route::get('/profileCreate', [UserProfilesController::class, 'create'])->name('userprofiles.create');
    Route::post('/profileStore', [UserProfilesController::class,'store'])->name('userprofiles.store');
    Route::get('/profileEdit/{id}', [UserProfilesController::class,'edit'])->name('userprofiles.edit');
    Route::put('/profileUpdate/{id}', [UserProfilesController::class,'update'])->name('userprofiles.update');
    Route::delete('/profileDelete/{id}', [UserProfilesController::class,'delete'])->name('userprofile.delete');
    Route::get('/profileShow/{id}',[UserProfilesController::class,'show'])->name('userprofile.show');

    //permohonan
    Route::get('/permohonanIndex',[PermohonanController::class,'index'])->name('permohonan.index');
    Route::get('/permohonanCreate',[PermohonanController::class,'create'])->name('permohonan.create');
    Route::post('/permohonanStore',[PermohonanController::class,'store'])->name('permohonan.store');
    Route::get('/permohonanEdit/{id}',[PermohonanController::class,'edit'])->name('permohonan.edit');
    Route::put('/permohonanUpdate/{id}',[PermohonanController::class,'update'])->name('permohonan.update');
    Route::delete('/permohonanDelete/{id}', [PermohonanController::class,'delete'])->name('permohonan.delete');
    Route::get('/permohonanReport',[PermohonanController::class,'report'])->name('permohonan.report');

    //urusetia
    Route::get('/terimapermohonan',[PermohonanController::class,'terima'])->name('permohonan.terima');
    Route::get('/showpermohonandetails/{id}',[PermohonanController::class,'semakPermohonan'])->name('permohonan.semak');
    Route::put('/permohonan/diterima/{id}', [PermohonanController::class,'semakTerima'])->name('permohonan.urusetiaterima');
    Route::put('/permohonan/ditolak/{id}', [PermohonanController::class,'semakRejected'])->name('permohonan.urusetiamenolak');
    Route::post('/permohonan/notify/{id}',[PermohonanController::class,'urusetiaNotify'])->name('permohonan.notifypemohon');
    Route::get('/permohonan/urusetiareport',[PermohonanController::class,'reportUrusetia'])->name('permohonan.reportUrusetia');

    //pelulus
    Route::get('/terimapelulus',[PermohonanController::class,'terima_pelulus'])->name('permohonan.pelulusIndex');
    Route::get('/showpeluluspermohonan/{id}',[PermohonanController::class,'pelulusSemakPermohonan'])->name('permohonan.pelulussemak');
    Route::put('/permohonan/diterima/pelulus/{id}',[PermohonanController::class,'pelulusTerima'])->name('permohonan.pelulusTerima');
    Route::put('/permohonan/ditolak/pelulus/{id}',[PermohonanController::class,'pelulusRejected'])->name('permohonan.pelulusRejected');

    //tetapanuser
    Route::get('/tetapanUsersIndex', [UserController::class, 'index'])->name('tetapanuser.index');
    Route::get('/tetapanUsersEdit/{id}', [UserController::class, 'edit'])->name('tetapanuser.edit');
    Route::put('/tetapanUsersUpdate/{user}', [UserController::class, 'update'])->name('tetapanuser.update');
    Route::delete('/tetapanUsersDelete/{id}', [UserController::class, 'delete'])->name('tetapanuser.delete');

    //tetapannegara
    Route::get('/tetapanNegaraIndex', [NegaraController::class, 'index'])->name('tetapannegara.index');
    Route::get('/tetapanNegaraCreate', [NegaraController::class, 'create'])->name('tetapannegara.create');
    Route::post('/tetapanNegaraStore', [NegaraController::class,'store'])->name('tetapannegara.store');
    Route::get('/tetapanNegaraEdit/{id}', [NegaraController::class,'edit'])->name('tetapannegara.edit');
    Route::put('/tetapanNegaraUpdate/{id}', [NegaraController::class,'update'])->name('tetapannegara.update');
    Route::delete('/tetapanNegaraDelete/{id}', [NegaraController::class,'delete'])->name('tetapannegara.delete');
    Route::get('/tetapanNegaraShow/{id}',[NegaraController::class,'show'])->name('tetapannegara.show');

    //tetapanpanggilan
    Route::get('/tetapanPanggilanIndex', [PanggilanController::class, 'index'])->name('tetapanpanggilan.index');
    Route::get('/tetapanPanggilanCreate', [PanggilanController::class, 'create'])->name('tetapanpanggilan.create');
    Route::post('/tetapanPanggilanStore', [PanggilanController::class,'store'])->name('tetapanpanggilan.store');
    Route::get('/tetapanPanggilanEdit/{id}', [PanggilanController::class,'edit'])->name('tetapanpanggilan.edit');
    Route::put('/tetapanPanggilanUpdate/{id}', [PanggilanController::class,'update'])->name('tetapanpanggilan.update');
    Route::delete('/tetapanPanggilanDelete/{id}', [PanggilanController::class,'delete'])->name('tetapanpanggilan.delete');
    Route::get('/tetapanPanggilanShow/{id}',[PanggilanController::class,'show'])->name('tetapanpanggilan.show');

    //tetapanybkategori
    Route::get('/tetapanYBIndex', [YbcategoriesController::class, 'index'])->name('tetapanybkategori.index');
    Route::get('/tetapanYBCreate', [YbcategoriesController::class, 'create'])->name('tetapanybkategori.create');
    Route::post('/tetapanYBStore', [YbcategoriesController::class,'store'])->name('tetapanybkategori.store');
    Route::get('/tetapanYBEdit/{id}', [YbcategoriesController::class,'edit'])->name('tetapanybkategori.edit');
    Route::put('/tetapanYBUpdate/{id}', [YbcategoriesController::class,'update'])->name('tetapanybkategori.update');
    Route::delete('/tetapanYBDelete/{id}', [YbcategoriesController::class,'delete'])->name('tetapanybkategori.delete');
    Route::get('/tetapanYBShow/{id}',[YbcategoriesController::class,'show'])->name('tetapanybkategori.show');

});

require __DIR__.'/auth.php';
