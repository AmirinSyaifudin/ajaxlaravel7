<?php

use App\Employee;
use Illuminate\Support\Facades\Route;

// Employee
use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\Admin\ProvinsiController;

//employee
Route::get('/', [EmployeeController::class, 'index']);
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');

Route::get('/', 'HomeController@index')->name('dashboard');

// DASHBOARD
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/provinsi', 'ProvinsiController@index')->name('provinsi.index');
Route::get('/provinsi/create', 'ProvinsiController@create')->name('provinsi.create');
// Route::get('/provinsi', 'provinsiController@data')->name('provinsi.data');
Route::post('/provinsi', 'ProvinsiController@store')->name('provinsi.store');
Route::get('/provinsi/{provinsi}/edit', 'ProvinsiController@edit')->name('provinsi.edit');
Route::put('/provinsi', 'ProvinsiController@update')->name('provinsi.update');
Route::delete('/provinsi', 'ProvinsiController@destroy')->name('provinsi.destroy');
// Route::get('/provinsi/{provinsi}/detail', 'ProvinsiController@detail')->name('provinsi.detail');


//karyawan
Route::get('/karyawan/data', 'DataController@karyawan')->name('karyawan.data');
// Route::post('/karyawandatatable', 'KaryawanController@GETdata')->name('karyawan.get');
Route::get('/karyawan', 'KaryawanController@index')->name('karyawan.index');
Route::get('/karyawan/create', 'KaryawanController@create')->name('karyawan.create');
Route::post('/karyawan', 'KaryawanController@store')->name('karyawan.store');
Route::get('/karyawan/{karyawan}/edit', 'KaryawanController@edit')->name('karyawan.edit');
// Route::get('/karyawan/edit/{$id}', 'karyawanController@edit')->name('karyawan.edit');
Route::put('/karyawan', 'KaryawanController@update')->name('karyawan.update');
Route::delete('/karyawan', 'KaryawanController@destroy')->name('karyawan.destroy');
Route::get('/karyawan/{karyawan}/detail', 'KaryawanController@detail')->name('karyawan.detail');
Route::get('/karyawan/exportexcel', 'KaryawanController@exportExcel')->name('karyawan.exportExcel');
Route::get('/karyawan/exportpdf', 'KaryawanController@exportPdf')->name('karyawan.exportPdf');


// cuti
Route::get('/cuti', 'CutiController@index')->name('cuti.index');
Route::get('/cuti/create', 'CutiController@create')->name('cuti.create');
Route::post('/cuti', 'CutiController@store')->name('cuti.store');
Route::get('/cuti/{cuti}/edit', 'CutiController@edit')->name('cuti.edit');
// Route::get('/cuti/edit/{$id}', 'cutiController@edit')->name('cuti.edit');
Route::put('/cuti/{cuti}', 'CutiController@update')->name('cuti.update');
Route::delete('/cuti/{cuti}', 'CutiController@destroy')->name('cuti.destroy');
Route::get('/cuti/{cuti}/detail', 'CutiController@detail')->name('cuti.detail');

//company
Route::get('/company/data', 'DataController@company')->name('company.data');
Route::get('/company', 'CompanyController@index')->name('company.index');
//Route::post('/companydatatable', 'companyController@GETdata')->name('company.get');

Route::get('/company', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company', 'CompanyController@store')->name('company.store');
Route::get('/company/{company}/edit', 'CompanyController@edit')->name('company.edit');
// Route::get('/company/edit/{$id}', 'CompanyController@edit')->name('company.edit');
Route::put('/company/{company}', 'CompanyController@update')->name('company.update');
Route::delete('/company/{company}', 'CompanyController@destroy')->name('company.destroy');
Route::get('/company/{company}/detail', 'CompanyController@detail')->name('company.detail');

//PASIEN
Route::get('/pasien/data', 'DataController@pasien')->name('pasien.data');
Route::get('/pasien', 'PasienController@index')->name('pasien.index');
Route::get('/pasien/create', 'PasienController@create')->name('pasien.create');
// Route::get('/pasien', 'PasienController@data')->name('pasien.data');
Route::post('/pasien', 'PasienController@store')->name('pasien.store');
Route::get('/pasien/{pasien}/edit', 'PasienController@edit')->name('pasien.edit');
Route::put('/pasien/{pasien}', 'PasienController@update')->name('pasien.update');
Route::delete('/pasien/{pasien}', 'PasienController@destroy')->name('pasien.destroy');
Route::get('/pasien/{pasien}/detail', 'PasienController@detail')->name('pasien.detail');
// Route::resource('/pasien', 'PasienController');

//karyawan
Route::get('/tablekaryawan', 'TablekaryawanController@index')->name('tablekaryawan.index');
Route::get('/tablekaryawan/create', 'TablekaryawanController@create')->name('tablekaryawan.create');
Route::post('/tablekaryawan', 'TablekaryawanController@store')->name('tablekaryawan.store');
Route::get('/tablekaryawan/{tablekaryawan}/edit', 'TablekaryawanController@edit')->name('tablekaryawan.edit');
// Route::get('/tablekaryawan/edit/{$id}', 'tablekaryawanController@edit')->name('tablekaryawan.edit');
Route::put('/tablekaryawan/{tablekaryawan}', 'TablekaryawanController@update')->name('tablekaryawan.update');
Route::delete('/tablekaryawan/{tablekaryawan}', 'TablekaryawanController@destroy')->name('tablekaryawan.destroy');
Route::get('/tablekaryawan/{tablekaryawan}/detail', 'TablekaryawanController@detail')->name('tablekaryawan.detail');

//cuti
Route::get('/tablecuti', 'TablecutiController@index')->name('tablecuti.index');
Route::get('/tablecuti/create', 'TablecutiController@create')->name('tablecuti.create');
Route::post('/tablecuti', 'TablecutiController@store')->name('tablecuti.store');
Route::get('/tablecuti/{tablecuti}/edit', 'TablecutiController@edit')->name('tablecuti.edit');
// Route::get('/tablecuti/edit/{$id}', 'tablecutiController@edit')->name('tablecuti.edit');
Route::put('/tablecuti/{tablecuti}', 'TablecutiController@update')->name('tablecuti.update');
Route::delete('/tablecuti/{tablecuti}', 'TablecutiController@destroy')->name('tablecuti.destroy');
Route::get('/tablecuti/{tablecuti}/detail', 'TablecutiController@detail')->name('tablecuti.detail');


Route::get('laporan/tigakrw', 'LaporanController@tigakrw')->name('laporan.tigakrw');
Route::get('laporan/cutikrw', 'LaporanController@cutikrw')->name('laporan.cutikrw');
Route::get('laporan/cutilebihkrw', 'LaporanController@cutilebihkrw')->name('laporan.cutilebihkrw');
Route::get('laporan/sisacuti', 'LaporanController@sisacuti')->name('laporan.sisacuti');
Route::get('laporan/pengajuancuti', 'LaporanController@pengajuancuti')->name('laporan.pengajuancuti');

// soal 1 
Route::get('/ganjilgenap', 'GanjilgenapController@index')->name('ganjilgenap.index');
Route::get('/ganjilgenap/create', 'GanjilgenapController@create')->name('ganjilgenap.create');
Route::post('/ganjilgenap', 'GanjilgenapController@store')->name('ganjilgenap.store');
Route::get('/ganjilgenap/{ganjilgenap}/edit', 'GanjilgenapController@edit')->name('ganjilgenap.edit');
Route::put('/ganjilgenap/{ganjilgenap}', 'GanjilgenapController@update')->name('ganjilgenap.update');
Route::delete('/ganjilgenap/{ganjilgenap}', 'GanjilgenapController@destroy')->name('ganjilgenap.destroy');

//parkir 
Route::get('/parkir', 'ParkirController@index')->name('parkir.index');
Route::get('/parkir/create', 'ParkirController@create')->name('parkir.create');
Route::post('/parkir', 'ParkirController@store')->name('parkir.store');
Route::get('/parkir/{parkir}/edit', 'ParkirController@edit')->name('parkir.edit');
Route::put('/parkir/{parkir}', 'ParkirController@update')->name('parkir.update');
Route::delete('/parkir/{parkir}', 'ParkirController@destroy')->name('parkir.destroy');
Route::get('/parkir/{parkir}/checkout', 'ParkirController@checkout')->name('parkir.checkout');

//bis 
Route::get('/bis', 'BisController@index')->name('bis.index');
Route::get('/bis/create', 'BisController@create')->name('bis.create');
Route::post('/bis', 'BisController@store')->name('bis.store');
Route::get('/bis/{bis}/edit', 'BisController@edit')->name('bis.edit');
Route::put('/bis/{bis}', 'BisController@update')->name('bis.update');
Route::delete('/bis/{bis}', 'BisController@destroy')->name('bis.destroy');
Route::get('/bis/{bis}/detail', 'BisController@detail')->name('bis.detail');

//terbilang
Route::get('/terbilang', 'TerbilangController@index')->name('terbilang.index');
Route::get('/terbilang/create', 'TerbilangController@create')->name('terbilang.create');
Route::post('/terbilang', 'TerbilangController@store')->name('terbilang.store');
Route::get('/terbilang/{terbilang}/edit', 'TerbilangController@edit')->name('terbilang.edit');
Route::put('/terbilang/{terbilang}', 'TerbilangController@update')->name('terbilang.update');
Route::delete('/terbilang/{terbilang}', 'TerbilangController@destroy')->name('terbilang.destroy');
Route::get('/terbilang/{terbilang}/detail', 'TerbilangController@detail')->name('terbilang.detail');

//jarak waktu
Route::get('/jarakwaktu', 'JarakwaktuController@index')->name('jarakwaktu.index');
Route::get('/jarakwaktu/create', 'JarakwaktuController@create')->name('jarakwaktu.create');
Route::post('/jarakwaktu', 'JarakwaktuController@store')->name('jarakwaktu.store');
Route::get('/jarakwaktu/{jarakwaktu}/edit', 'JarakwaktuController@edit')->name('jarakwaktu.edit');
Route::put('/jarakwaktu/{jarakwaktu}', 'JarakwaktuController@update')->name('jarakwaktu.update');
Route::delete('/jarakwaktu/{jarakwaktu}', 'JarakwaktuController@destroy')->name('jarakwaktu.destroy');
Route::get('/jarakwaktu/{jarakwaktu}/detail', 'JarakwaktuController@detail')->name('jarakwaktu.detail');
Route::get('/jarakwaktu/{jarakwaktu}/detail', 'JarakwaktuController@detail')->name('jarakwaktu.detail');



