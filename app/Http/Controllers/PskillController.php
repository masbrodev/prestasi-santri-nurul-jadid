<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pkilmuan;
use Brian2694\Toastr\Facades\Toastr;

class PskillController extends Controller
{
    public function index()
    {
        $data['skill'] = Pkilmuan::with(['skill' => function ($q) {
            $q->where('nama', 'Skill');
        }])->orderBy('id', 'DESC')->get();

        return view('pages.p_skill', $data);
    }

    public function tambah(Request $request)
    {
        $data = [
            'niup' => $request->niup,
            'peminatan_id' => $request->peminatan_id,
        ];

        $simpan = Pkilmuan::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Pemintan Skill Berhasil ditambahkan')]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'peminatan_id' => $request->peminatan_id,
        ];

        $simpan = Pkilmuan::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Pemintan Skill Santri Berhasil Diperbaharui')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Pemintan Skill Santri Gagal Diperbaharui')]);
        }
    }

    public function hapus($id)
    {
        $data = Pkilmuan::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with([Toastr::success('Data Pemintan Skill Santri Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Pemintan Skill Santri Gagal Dihapus')]);
        }
    }
}
