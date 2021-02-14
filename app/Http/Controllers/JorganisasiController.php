<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jorganisasi;
use Brian2694\Toastr\Facades\Toastr;

class JorganisasiController extends Controller
{
    public function index()
    {
        $data['organ'] = Jorganisasi::orderBy('id', 'DESC')->get();
        return view('pages.j_organisasi', $data);
    }

    public function tambah(Request $request)
    {
        $data = [
            'niup' => $request->niup,
            'kategori' => $request->kategori,
            'nama_organisasi' => $request->nama_organisasi,
            'masa_jabatan' => $request->jb1 . '-' . $request->jb2,
            'masa_keanggotaan' => $request->gk1 . '-' . $request->gk2,
        ];

        $simpan = Jorganisasi::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Jejak Keorganisasian Santri Berhasil ditambahkan')]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'kategori' => $request->kategori,
            'nama_organisasi' => $request->nama_organisasi,
            'masa_jabatan' => $request->jb1 . '-' . $request->jb2,
            'masa_keanggotaan' => $request->gk1 . '-' . $request->gk2,
        ];

        $simpan = Jorganisasi::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Jejak Keorganisasian Santri Berhasil Diperbaharui')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Jejak Keorganisasian Santri Gagal Diperbaharui')]);
        }
    }

    public function hapus($id)
    {
        $data = Jorganisasi::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with([Toastr::success('Data Jejak Keorganisasian Santri Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Jejak Keorganisasian Santri Gagal Dihapus')]);
        }
    }
}
