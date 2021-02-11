<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pskill;
use Brian2694\Toastr\Facades\Toastr;

class PskillController extends Controller
{
    public function index()
    {
        return view('pages.p_skill');
    }

    public function tambah(Request $request)
    {
        $data = [
            'niup' => $request->niup,
            'peminatan_id' => $request->peminatan_id,
        ];

        $simpan = Pskill::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Pemintan Skill Berhasil ditambahkan')]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'peminatan_id' => $request->peminatan_id,
        ];

        $simpan = Pskill::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Pemintan Skill Santri Berhasil Diperbaharui')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Pemintan Skill Santri Gagal Diperbaharui')]);
        }
    }

    public function hapus($id)
    {
        $data = Pskill::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with([Toastr::success('Data Pemintan Skill Santri Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Pemintan Skill Santri Gagal Dihapus')]);
        }
    }
}
