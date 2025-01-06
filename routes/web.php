<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiTransaksiController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use App\Models\BarangMasuk;
use Database\Seeders\PegawaiSeeder;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\ReturnTypePass;

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
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);



Route::get('/index',[AdminController::class,'index'])->name('index');


Route::prefix('users')->middleware(['auth', 'isUsers'])->group(function() {
    Route::get('/',[UsersController::class, 'index'])->name('admin.index');
    
});
//Dashboard Awal
Route::get('/admin',[AdminController::class,'index'])->name('dashboard');


//transaksi
Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('/admin/transaksi/create', [TransaksiController::class,'create'])->name('admin.transaksi.create');
Route::post('/admin/transaksi/store', [TransaksiController::class, 'store'])->name('admin.transaksi.store');
Route::get('/admin/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
Route::put('/admin/transaksi/{id}', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
Route::delete('/admin/transaksi/{id}', [TransaksiController::class, 'delete'])->name('admin.transaksi.delete');

//Tampilan barang
Route::get('/admin/barang', [BarangController::class, 'barang'])->name('barang');
Route::get('/admin/create', [BarangController::class,'createbarangMasuk'])->name('admin.barang.create');
Route::post('/admin/barang/store', [BarangController::class, 'storebarangMasuk'])->name('admin.barang-masuk.store');
Route::get('/admin/barang/{id}/edit', [BarangController::class, 'editbarangMasuk'])->name('admin.barang-masuk.edit');
Route::put('/admin/barang-masuk/{id}', [BarangController::class, 'updatebarangMasuk'])->name('admin.barang-masuk.update');
Route::delete('/admin/barang-masuk/delete/{id}', [BarangController::class, 'destroybarangMasuk'])->name('admin.barang-masuk.delete');


//Tampilan stcok
Route::get('/admin/stock', [StockController::class, 'stock'])->name('stock');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::post('/admin/barang/destroy/{id}',[BarangController::class,'destroy'])->name('destroy.barang');
Route::get('/admin/barang/edit/{id}',[BarangController::class,'edit'])->name('admin.barang.edit');
Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');


//Tampilan users
Route::get('/admin/users', [UsersController::class, 'users'])->name('users');
Route::get('admin/user/create',[UsersController::class,'create'])->name('admin.users.create');
Route::post('admin/user/store',[UsersController::class,'store'])->name('admin.users.store');
Route::post('admin/user/delete/{id}',[UsersController::class,'destroy'])->name('admin.users.delete');
Route::get('/admin/users/{id}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('admin.users.update');

//gaji
//Tampilan pegawai
Route::get('/admin/pegawai', [PegawaiController::class, 'pegawai'])->name('pegawai');
Route::get('/admin/gaji/create', [AdminController::class, 'create'])->name('admin.gaji.create');
Route::post('/admin/gaji/store', [AdminController::class, 'store'])->name('admin.gaji.store');
Route::get('/admin/gaji/{id}/edit', [AdminController::class, 'edit'])->name('admin.gaji.edit');
Route::put('/admin/gaji/{id}', [AdminController::class, 'update'])->name('admin.gaji.update');
Route::delete('/admin/gaji/{id}', [AdminController::class, 'destroy'])->name('admin.gaji.destroy');


//Tampilan supplier
Route::get('/admin/supplier', [SupplierController::class, 'supplier'])->name('supplier');

//Tampilan barang masuk
Route::get('/admin/barang-masuk', [BarangController::class, 'barangMasuk'])->name('barangmasuk');



//gaji
Route::get('admin/gaji/index',[GajiController::class,'gaji'])->name('admin.gaji');

Route::get('/client', function(){
    return view('client.index');
});

Route::get('admin/user/profile', function(){
    return view('user.user-profile');
})->name('profile');
// Route::get('/admin/barang',[BarangController::class, 'index'])->name('admin.barang');
// Route::get('/barang2', [BarangController::class, 'barang'])->name('admin.barang2');

//supplier
Route::get('supplier/dashboard',[SupplierController::class,'dashboard'])->name('supplier.dashboard');
//stok-supplier
Route::get('/supplier/stock', [SupplierController::class, 'stock'])->name('supplier.stock');
Route::get('/supplier/stock/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/stock/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::post('/supplier/stock/destroy/{id}',[SupplierController::class,'destroy'])->name('destroy.stock');
Route::get('/supplier/stock/edit/{id}',[SupplierController::class,'edit'])->name('supplier.stock.edit');
Route::put('/supplier/stock/{id}', [SupplierController::class, 'update'])->name('supplier.stock.update');


//pegawai role
Route::get('/pegawai/index',[PegawaiController::class,'dashboard'])->name('pegawai.index');

//gaji
Route::get('/pegawai/gaji',[GajiController::class,'gaji'])->name('pegawai.gaji');
Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
Route::post('/gaji/store', [GajiController::class, 'store'])->name('gaji.store');
Route::get('/gaji/{id}/edit', [GajiController::class, 'edit'])->name('gaji.edit');
Route::put('/gaji/{id}', [GajiController::class, 'update'])->name('gaji.update');
Route::delete('/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.destroy');


//transaksi
Route::get('/pegawai/transaksi', [PegawaiTransaksiController::class, 'index'])->name('pegawai.transaksi');
Route::get('/pegawai/transaksi/create', [PegawaiTransaksiController::class,'create'])->name('pegawai.transaksi.create');
Route::post('/pegawai/transaksi/store', [PegawaiTransaksiController::class, 'store'])->name('pegawai.transaksi.store');
Route::get('/pegawai/transaksi/{id}/edit', [PegawaiTransaksiController::class, 'edit'])->name('pegawai.transaksi.edit');
Route::put('/pegawai/transaksi/{id}', [PegawaiTransaksiController::class, 'update'])->name('pegawai.transaksi.update');
Route::delete('/pegawai/transaksi/{id}', [PegawaiTransaksiController::class, 'delete'])->name('pegawai.transaksi.delete');


