<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jekstrakurikuler;
use Brian2694\Toastr\Facades\Toastr;


class JekstrakurikulerController extends Controller
{
    public function index()
    {
        $data['eks'] = Jekstrakurikuler::orderBy('id', 'DESC')->get();
        return view('pages.j_ekstra', $data);
    }

    public function tambah(Request $request)
    {
        $data = [
            'niup' => $request->niup,
            'asrama' => $request->asrama,
            'bidang' => $request->bidang,
            'sub_bidang' => $request->sub_bidang,
            'masa_keanggotaan' => $request->gk1 . '-' . $request->gk2,
        ];

        $simpan = Jekstrakurikuler::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Jejak Ekstrakurikuler Santri Berhasil ditambahkan')]);
        }
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'asrama' => $request->asrama,
            'bidang' => $request->bidang,
            'sub_bidang' => $request->sub_bidang,
            'masa_keanggotaan' => $request->gk1 . '-' . $request->gk2,
        ];

        $simpan = Jekstrakurikuler::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Data Jejak Ekstrakurikuler Santri Berhasil Diperbaharui')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Jejak Ekstrakurikuler Santri Gagal Diperbaharui')]);
        }
    }

    public function hapus($id)
    {
        $data = Jekstrakurikuler::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with([Toastr::success('Data Jejak Ekstrakurikuler Santri Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Jejak Ekstrakurikuler Santri Gagal Dihapus')]);
        }
    }
}
