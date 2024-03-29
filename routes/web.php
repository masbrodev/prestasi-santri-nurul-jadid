<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
  return redirect('login');
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'SantriController@dashboard');

  Route::get('/cetak/{id}', 'SantriController@cetak');
  Route::get('/cetak2/{id}', 'SantriController@cetak2');
  Route::get('/santri', 'SantriController@index');
  Route::get('/formulir/{id}', 'SantriController@formulir');
  Route::get('/detail', 'SantriController@detail');
  Route::get('/ganti-password', 'SantriController@password');
  Route::post('/gpassword', 'SantriController@gpassword');

  Route::get('/peminatan-keilmuan', 'PkilmuanController@index');
  Route::post('/tambah-keilmuan', 'PkilmuanController@tambah');
  Route::post('/edit-keilmuan/{id}', 'PkilmuanController@edit');
  Route::get('/hapus-keilmuan/{id}', 'PkilmuanController@hapus');

  Route::get('/peminatan-skill', 'PskillController@index');
  Route::post('/tambah-skill', 'PskillController@tambah');
  Route::post('/edit-skill/{id}', 'PskillController@edit');
  Route::get('/hapus-skill/{id}', 'PskillController@hapus');

  Route::get('/jejak-keorganisasian', 'JorganisasiController@index');
  Route::post('/tambah-jorganisasi', 'JorganisasiController@tambah');
  Route::post('/edit-jorganisasi/{id}', 'JorganisasiController@edit');
  Route::get('/hapus-jorganisasi/{id}', 'JorganisasiController@hapus');

  Route::get('/jejak-ekstrakurikuler', 'JekstrakurikulerController@index');
  Route::post('/tambah-eks', 'JekstrakurikulerController@tambah');
  Route::post('/edit-eks/{id}', 'JekstrakurikulerController@edit');
  Route::get('/hapus-eks/{id}', 'JekstrakurikulerController@hapus');
  Route::get('/tambah-jejak-ekstrakurikuler', 'JekstrakurikulerController@haltambah');

  Route::get('/prestasi-santri', 'PrestasiController@index');
  Route::post('/tambah-prestasi', 'PrestasiController@tambah');
  Route::post('/edit-prestasi/{id}', 'PrestasiController@edit');
  Route::get('/hapus-prestasi/{id}', 'PrestasiController@hapus');


  Route::get('/hal-peminatan-keilmuan', 'PeminatanController@ilmu');
  Route::get('/hal-peminatan-skill', 'PeminatanController@skill');
  Route::post('/tambah-peminatan', 'PeminatanController@tambah');
  Route::post('/edit-peminatan/{id}', 'PeminatanController@edit');
  Route::get('/hapus-peminatan/{id}', 'PeminatanController@hapus');
});
