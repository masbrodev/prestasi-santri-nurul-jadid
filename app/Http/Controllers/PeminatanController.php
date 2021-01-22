<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminatan;
use Brian2694\Toastr\Facades\Toastr;

class PeminatanController extends Controller
{
    public function ilmu()
    {
        $data['peminatan'] = Peminatan::orderBy('jurusan', 'DESC')->where('nama','Keilmuan')->get();
        return view('pages.pg_ilmu', $data);
        // return $data;
    }
    public function skill()
    {
        $data['peminatan'] = Peminatan::orderBy('id', 'DESC')->where('nama','Skill')->get();

        return view('pages.pg_skill', $data);
        // return $data;
    }

    public function tambah(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'sub' => $request->sub,
        ];

        $simpan = Peminatan::create($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Peminatan Berhasil ditambahkan')]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'jurusan' => $request->jurusan,
            'sub' => $request->sub,
        ];

        $simpan = Peminatan::where('id', $id)->update($data);
        if ($simpan) {
            return redirect()->back()->with([Toastr::success('Peminatan Berhasil diedit')]);
        } else {
            return redirect()->back()->with([Toastr::error('Peminatan Gagal diedit')]);
        }
    }

    public function hapus($id)
    {
        $Peminatan = Peminatan::find($id);
        if ($Peminatan) {
            $Peminatan->delete();
            return redirect()->back()->with([Toastr::success('Data Peminatan Berhasil Dihapus')]);
        } else {
            return redirect()->back()->with([Toastr::error('Data Peminatan Gagal Dihapus')]);
        }
    }
}
