<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Prestasi;
use Brian2694\Toastr\Facades\Toastr;

class PrestasiController extends Controller
{
    public function index()
    {

        $data['prestasi'] = Prestasi::get()->groupBy('nis');
        return view('pages.prestasi',$data);
        return $data;
    }

    public function haltambah()
    {

        $data['santri'] = Santri::get();
        return view('pages.TT_prestasi',$data);
    }

    public function tambah(Request $request)
    {
        $data = [
            'nis' => $request->nis,
            'nama_prestasi' => $request->nama_prestasi,
        ];

        $simpan = Prestasi::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Prestasi Berhasil ditambahkan')]);
        }
    }
}
