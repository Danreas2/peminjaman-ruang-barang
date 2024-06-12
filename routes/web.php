<?php

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
    return redirect()->route('home');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/simpan', 'Guest\PeminjamanController@store')->name('guest.peminjaman.store');
Route::post('guest/peminjaman/ajaxGetAlat', 'Guest\PeminjamanController@ajaxGetItem')->name('guest.peminjam.item');
Route::post('guest/peminjaman/ajaxUser', 'Guest\PeminjamanController@ajaxUser')->name('guest.peminjam.user');
Route::get('guest/detail-pinjam/{id}', 'Guest\PeminjamanController@show')->name('guest.peminjam.show');

Route::get('mail', function () {
    $peminjaman = App\Peminjaman::find(1);
    
    //$peminjaman->notify(new App\Notifications\StatusPeminjaman($peminjaman));
    return (new App\Notifications\StatusPeminjaman($peminjaman))
                ->toMail($peminjaman->user);
});

Route::group(['middleware' => 'admin'], function()
{
	Route::get('admin/dashboard', 'HomeController@indexAdmin')->name('admin.dashboard');

	Route::resource('admin/ruangan', 'Admin\RuanganController')->except(['show'])->names([
		'index' => 'admin.ruangan',
		'create' => 'admin.ruangan.create',
		'store' => 'admin.ruangan.store',
		'edit' => 'admin.ruangan.edit',
		'update' => 'admin.ruangan.update',
		'destroy' => 'admin.ruangan.destroy',
	]);

	Route::resource('admin/kendaraan', 'Admin\KendaraanController')->except(['show'])->names([
		'index' => 'admin.kendaraan',
		'create' => 'admin.kendaraan.create',
		'store' => 'admin.kendaraan.store',
		'edit' => 'admin.kendaraan.edit',
		'update' => 'admin.kendaraan.update',
		'destroy' => 'admin.kendaraan.destroy',
	]);

	Route::resource('admin/karyawan', 'Admin\KaryawanController')->except(['show'])->names([
		'index' => 'admin.karyawan',
		'create' => 'admin.karyawan.create',
		'store' => 'admin.karyawan.store',
		'edit' => 'admin.karyawan.edit',
		'update' => 'admin.karyawan.update',
		'destroy' => 'admin.karyawan.destroy',
	]);

	Route::resource('admin/peminjaman', 'Admin\PeminjamanController')->except(['show'])->names([
		'index' => 'admin.peminjaman',
		'create' => 'admin.peminjaman.create',
		'store' => 'admin.peminjaman.store',
		'edit' => 'admin.peminjaman.edit',
		'update' => 'admin.peminjaman.update',
		'destroy' => 'admin.peminjaman.destroy',
	]);

	Route::resource('admin/barang', 'Admin\BarangController')->except(['show'])->names([
		'index' => 'admin.barang',
		'create' => 'admin.barang.create',
		'store' => 'admin.barang.store',
		'edit' => 'admin.barang.edit',
		'update' => 'admin.barang.update',
		'destroy' => 'admin.barang.destroy',
	]);

	Route::post('admin/peminjaman/ajaxGetPeminjam', 'Admin\PeminjamanController@ajaxGetPeminjam')->name('admin.peminjam.tipe');
	Route::post('admin/peminjaman/ajaxGetAlat', 'Admin\DetailPinjamController@ajaxGetItem')->name('admin.peminjam.item');
	Route::post('admin/peminjaman/cek-barang', 'Admin\PeminjamanController@cekBrg')->name('admin.peminjam.cekbarang');
	Route::post('admin/peminjaman/laporan', 'Admin\PeminjamanController@cetakTgl')->name('admin.peminjaman.cetak');

	Route::resource('admin/detail-pinjam', 'Admin\DetailPinjamController')->except(['create'])->names([
		'index' => 'admin.detail-pinjam',
		'show' => 'admin.detail-pinjam.show',
		'store' => 'admin.detail-pinjam.store',
		'edit' => 'admin.detail-pinjam.edit',
		'update' => 'admin.detail-pinjam.update',
		'destroy' => 'admin.detail-pinjam.destroy',
	]);

	Route::resource('admin/verifikasi', 'Admin\VerifikasiController')->except(['show', 'create', 'destroy', 'store', 'edit'])->names([
		'index' => 'admin.verifikasi',
		'update' => 'admin.verifikasi.update',
	]);

	Route::resource('admin/pengembalian', 'Admin\PengembalianController')->except(['edit', 'create', 'destroy', 'update'])->names([
		'index' => 'admin.pengembalian',
		'show' => 'admin.pengembalian.show',
		'store' => 'admin.pengembalian.store',
	]);	

});