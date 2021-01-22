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

        // $data['prestasi'] = Prestasi::get()->groupBy('nis');
        $data['prestasi'] = Prestasi::orderBy('id', 'DESC')->get();
        return view('pages.prestasi',$data);
        // return $data;
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

    public function edit(Request $request, $id)
    {
        $data = [
            'nama_prestasi' => $request->prestasi,
        ];

        $simpan = Prestasi::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Prestasi Santri Berhasil Diperbaharui')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Prestasi Santri Gagal Diperbaharui')]);
        }
    }
    public function hapus($id)
    {
        $prestasi = Prestasi::find($id);
        if ($prestasi) {
            $prestasi->delete();
            return redirect()->back()->with([Toastr::success('Data Prestasi Santri Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Prestasi Santri Gagal Dihapus')]);
        }
    }
}
