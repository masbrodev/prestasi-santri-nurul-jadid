<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;


class JekstrakurikulerController extends Controller
{
    public function index()
    {
        return view('pages.j_ekstra');
    }

    public function haltambah()
    {

        $data['santri'] = Santri::get();
        $data['judul'] = "Tambah Data Jejak Ekstrakurikuler Santri";
        return view('pages.TT_prestasi',$data);
    }
}
