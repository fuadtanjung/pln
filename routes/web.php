<?php

use App\DetailAsetLain;
use App\DetailAsetTi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



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
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
Route::get('/', function () {return redirect('/home'); });
Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['role:1']], function () {
        Route::get('/daftaraset', 'JenisAsetController@index')->name('view.aset');
        Route::post('/daftaraset', 'JenisAsetController@store')->name('store.aset');
        Route::patch('/daftaraset', 'JenisAsetController@update')->name('update.aset');
        Route::delete('/daftaraset/{id_jenis_aset}' , 'JenisAsetController@delete')->name('delete.aset');

        Route::get('/daftarunit', 'UnitController@index')->name('view.unit');
        Route::post('/daftarunit', 'UnitController@store')->name('store.unit');
        Route::patch('/daftarunit', 'UnitController@update')->name('update.unit');
        Route::delete('/daftarunit/{id_unit}' , 'UnitController@delete')->name('delete.unit');


        Route::get('/daftarruangan', 'RuanganController@index')->name('view.ruangan');
        Route::post('/daftarruangan', 'RuanganController@store')->name('store.ruangan');
        Route::patch('/daftarruangan', 'RuanganController@update')->name('update.ruangan');
        Route::delete('/daftarruangan/{id_ruangan}' , 'RuanganController@delete')->name('delete.ruangan');

        Route::get('/asetti', 'AsetTiController@index')->name('add.asetti');
        Route::get('/asetti/{nip_pegawai}', 'AsetTiController@masterAset')->name('master.aset');
        Route::post('/asetti', 'AsetTiController@store')->name('store.detail_aset');
        Route::patch('/asetti','AsetTiController@update')->name('update.asetti');
        Route::delete('/asetti/{no_seri}', 'AsetTiController@delete')->name('delete.asetti');

        Route::get('/asetjaringan', 'AsetJaringanController@index')->name('view.jaringan');
        Route::post('/asetjaringan', 'AsetJaringanController@store')->name('store.jaringan');
        Route::patch('/asetjaringan','AsetJaringanController@update')->name('update.masterjaringan');
        Route::delete('/asetjaringan/{id_master_jaringan}','AsetJaringanController@deletejaringan')->name('delete.masterjaringan');
        Route::get('/asetjaringan/detail/{tipe}/{ruangan}/{idmasterjaringan}', 'AsetJaringanController@masterAsetJaringan')->name('master.jaringan');
        Route::post('/asetjaringan/detail', 'AsetJaringanController@storedetail')->name('store.detail_jaringan');
        Route::get('/asetjaringan/detail/edit/{tipe}/{ruangan}/{idmasterjaringan}','AsetJaringanController@indexdetail')->name('viewdetail.pengecekanjaringan');
        Route::patch('/asetjaringan/detail/edit','AsetJaringanController@updatedetail')->name('updatedetail.pengecekanjaringan');
        Route::delete('/asetjaringan/detail/{no_seri}','AsetJaringanController@deletedetail')->name('deletedetail.pengecekanjaringan');

        Route::get('/kodeQR', 'CetakQRController@index')->name('view.kodeqr');
        Route::get('/kodeQR/cetakAll','CetakQRController@printQRAll')->name('view.qrcode');
        Route::post('/kodeQR/cetakAll','CetakQRController@printQRAlljaringan')->name('view.qrcodejaringan');
        Route::get('/kodeQR/cetakQR', 'CetakQRController@indexqr')->name('view.cetakqr');
        Route::get('/kodeQR/cetakQR/details/{no_seri}', 'CetakQRController@indexdetailaset')->name('detail.cetakqr');
        Route::get('/kodeQR/cetakQR/detailsjaringan/{no_seri}', 'CetakQRController@indexdetailjaringan')->name('detailjaringan.cetakqr');
        Route::get('/kodeQR/cetakQR/{no_seri}/{status}', 'CetakQRController@printQR')->name('qr.print');
        Route::get('/kodeQR/cetakQR/{no_seri}', 'CetakQRController@printQRjaringan')->name('qr.jaringanprint');

        Route::get('/daftarpegawai', 'UserController@viewDaftarPegawai')->name('view.daftar_pegawai');
        Route::post('/daftarpegawai', 'UserController@store')->name('store.daftar_pegawai');

        Route::get('/rekapasetti', 'RekapAsetTiController@index')->name('view.rekapti');
        Route::get('/rekapasetlain', 'RekapAsetTiController@index')->name('view.rekaplain');
        Route::get('/rekapasetjaringan', 'RekapAsetJaringanController@index')->name('view.rekapjaringan');

        Route::get('/rekapasetjaringan/cetak', 'RekapAsetJaringanController@printjaringan')->name('print.jaringan');
        Route::get('/rekapasetti/cetak', 'RekapAsetTiController@printti')->name('print.ti');
        Route::get('/rekapasetlain/cetak', 'RekapAsetTiController@printlain')->name('print.lain');
        Route::get('/exportasetti', 'RekapAsetTiController@asettiexport')->name('excel.ti');
        Route::get('/exportasetjaringan', 'RekapAsetJaringanController@asetjaringanexport')->name('excel.jaringan');
        Route::get('/exportasetlain', 'RekapAsetTiController@asetlainexport')->name('excel.lain');


        Route::get('/rekappengaduanti', 'RekapPengaduanController@index')->name('view.rekappengaduan');
        Route::get('/rekappengaduan/ubah/{id_pengaduan_ti}', 'RekapPengaduanController@viewrekapti')->name('viewupdate.ti');
        Route::patch('/rekappengaduan/ubah/{id_pengaduan_ti}', 'RekapPengaduanController@update')->name('update.statuspengaduan');
        Route::get('/rekappengaduan/{id_pengaduan_ti}', 'RekapPengaduanController@detailrekap')->name('detail.rekappengaduan');
        Route::get('/rekappengaduanjaringan', 'RekapPengaduanController@indexjaringan')->name('view.rekappengaduan_jaringan');
        Route::get('/rekappengaduanjaringan/ubah/{id_pengaduan_jaringan}', 'RekapPengaduanController@viewrekapjaringan')->name('viewupdate.jaringan');
        Route::patch('/rekappengaduanjaringan/ubah/{id_pengaduan_jaringan}', 'RekapPengaduanController@updatejaringan')->name('update.statuspengaduan_jaringan');
        Route::get('/rekappengaduanjaringan/{id_pengaduan_jaringan}', 'RekapPengaduanController@detailrekapjaringan')->name('detail.rekappengaduan_jaringan');



    });
    Route::group(['middleware' => ['role:2']], function () {
        Route::get('/profil', 'DataPegawaiController@index')->name('add.profil');
        Route::get('/profil', 'DataPegawaiController@store')->name('store.profil');
        Route::get('/profilview', 'DataPegawaiController@view')->name('view.profil');
        Route::get('/masterti', 'MasterTiController@index')->name('view.masterti');
        Route::post('/masterti', 'MasterTiController@store')->name('store.masterti');
        Route::patch('/masterti', 'MasterTiController@update')->name('update.masterti');

        Route::get('/pengaduan', 'PengaduanKerusakanController@index')->name('index.pengaduan');
        Route::get('/pengaduan/view', 'PengaduanKerusakanController@kelompokaset')->name('view.pengaduan');
        Route::get('/pengaduan/view/addti', 'PengaduanKerusakanController@addpengaduanti')->name('add.pengaduan_ti');
        Route::get('/pengaduan/view/addjaringan', 'PengaduanKerusakanController@addpengaduanjaringan')->name('add.pengaduan_jaringan');
        // Route::get('/pengaduan/view/addti/{no_seri}', 'PengaduanKerusakanController@search');
        // Route::get('/pengaduan/view/addjaringan/{id_master_ti}', 'PengaduanKerusakanController@searchjaringan');
        Route::post('/pengaduan/view/addti', 'PengaduanKerusakanController@storeti')->name('add.ti');
        Route::get('/pengaduan/detail/{id_pengaduan_ti}', 'PengaduanKerusakanController@detailpengaduanti')->name('detailti.pengaduan');
        Route::post('/pengaduan/view/addjaringan', 'PengaduanKerusakanController@storejaringan')->name('add.jaringan');
        Route::get('/pengaduan/detailjaringan/{id_pengaduan_jaringan}', 'PengaduanKerusakanController@detailpengaduanjaringan')->name('detailjaringan.pengaduan');
        Route::get('/pengaduan/editpengaduanti/{id_pengaduan_ti}', 'PengaduanKerusakanController@viewupdateti')->name('viewupdate.pengaduan_ti');
        Route::patch('/pengaduan/editpengaduanti', 'PengaduanKerusakanController@updatepengaduanti')->name('update.pengaduan_ti');


    });
    Route::get('/logout', 'HomeController@logout')->name('logout');

    Route::get("/get_master_ti","AsetTiController@get_detail_asset")->name("master-asset.get_detail");
    Route::get('/updated-activity', 'TelegramBotController@updatedActivity');

});
