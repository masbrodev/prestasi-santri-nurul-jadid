<?php

use Illuminate\Support\Facades\Route;
use Brian2694\Toastr\Facades\Toastr;
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
     Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('kategori', 'KategoriController@index');
Route::post('kategori/tambah', 'KategoriController@tambah');
Route::post('kategori/edit/{id}', 'KategoriController@edit');
Route::get('kategori/hapus/{id}', 'KategoriController@hapus');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);
Route::get('/santri', 'santriController@index');
Route::get('/formulir/{id}', 'santriController@formulir');
Route::get('/detail', 'santriController@detail');

Route::get('/peminatan-keilmuan', 'PkilmuanController@index');
Route::get('/peminatan-skill', 'PskillController@index');
Route::get('/jejak-keorganisasian', 'JorganisasiController@index');

Route::get('/jejak-ekstrakurikuler', 'JekstrakurikulerController@index');
Route::get('/tambah-jejak-ekstrakurikuler', 'JekstrakurikulerController@haltambah');

Route::get('/prestasi-santri', 'PrestasiController@index');
Route::get('/tambah-prestasi', 'PrestasiController@haltambah');
Route::post('/tambah-prestasi', 'PrestasiController@tambah');
Route::post('/edit-prestasi/{id}', 'PrestasiController@edit');
Route::get('/hapus-prestasi/{id}', 'PrestasiController@hapus');


Route::get('/hal-peminatan-keilmuan', 'PeminatanController@ilmu');
Route::get('/hal-peminatan-skill', 'PeminatanController@skill');
Route::post('/tambah-peminatan', 'PeminatanController@tambah');
Route::post('/edit-peminatan/{id}', 'PeminatanController@edit');
Route::get('/hapus-peminatan/{id}', 'PeminatanController@hapus');
