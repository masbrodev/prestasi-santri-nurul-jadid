<?php

namespace App\Http\Controllers;

use App\Pkilmuan;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PkilmuanController extends Controller
{
    public function index()
    {
        return view('pages.p_ilmu');
    }

    public function tambah(Request $request)
    {
        $data = [
            'niup' => $request->niup,
            'peminatan_id' => $request->peminatan_id,
        ];

        $simpan = Pkilmuan::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Pemintan Keilmuan Berhasil ditambahkan')]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'peminatan_id' => $request->peminatan_id,
        ];

        $simpan = Pkilmuan::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Pemintan Keilmuan Santri Berhasil Diperbaharui')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Pemintan Keilmuan Santri Gagal Diperbaharui')]);
        }
    }

    public function hapus($id)
    {
        $ilmu = Pkilmuan::find($id);
        if ($ilmu) {
            $ilmu->delete();
            return redirect()->back()->with([Toastr::success('Data Pemintan keilmuan Santri Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Pemintan keilmuan Santri Gagal Dihapus')]);
        }
    }
}
