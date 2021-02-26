<?php

namespace App\Http\Controllers;

use App\Peminatan;
use App\Jorganisasi;
use App\Prestasi;
use App\pkilmuan;
use App\Pskill;
use App\Jekstrakurikuler;
use Illuminate\Http\Request;
use App\User;
use Brian2694\Toastr\Facades\Toastr;


class SantriController extends Controller
{
    public function index()
    {
        return view('pages.santri');
    }

    public function gpassword(Request $request)
    {
        // $data = [
        //     'sub' => $request->sub,
        // ];

        // $simpan = Peminatan::where('id', $id)->update($data);
        // if ($simpan) {
        //     return redirect()->back()->with([Toastr::success('Password Berhasil diganti')]);
        // } else {
        //     return redirect()->back()->with([Toastr::error('Password Gagal diganti')]);
        // }
    }

    public function password()
    {
        return view('pages.password');
    }

    public function dashboard()
    {


        $ilmu = Pkilmuan::with(['ilmu' => function ($q) {
            $q->where('nama', 'Keilmuan');
        }])->get();

        $item_ilmu = collect();
        foreach ($ilmu as $i) {
            if (!empty($i->ilmu)) {
                $item_ilmu->push([
                    'jurusan' => $i->ilmu->jurusan,
                ]);
            }
        }

        $skill = pkilmuan::with(['skill', 'skill' => function ($q) {
            $q->where('nama', 'Skill');
        }])->get();

        $item_skill = collect();
        foreach ($skill as $i) {
            if (!empty($i->skill)) {
                $item_skill->push([
                    'jurusan' => $i->skill->jurusan,
                ]);
            }
        }

        $data['ilmu'] = $item_ilmu->count();
        $data['skill'] = $item_skill->count();

        $data['prestasi'] = Prestasi::count();

        $data['organ'] = Jorganisasi::count();

        $data['eks'] = Jekstrakurikuler::count();

        $data['all'] = $data['skill'] + $data['ilmu'] + $data['prestasi'] + $data['organ'] + $data['eks'];

        return view('home', $data);
        // return $data;
    }

    public function formulir($id)
    {
        $data['peminatan'] = Peminatan::orderBy('jurusan', 'DESC')->get();

        $data['skill'] = pkilmuan::with(['skill', 'skill' => function ($q) {
            $q->where('nama', 'Skill');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['ilmu'] = Pkilmuan::with(['ilmu' => function ($q) {
            $q->where('nama', 'Keilmuan');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['prestasi'] = Prestasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['organ'] = Jorganisasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['eks'] = Jekstrakurikuler::where('niup', $id)->orderBy('id', 'DESC')->get();

        return view('pages.formulir', $data);
    }

    public function cetak()
    {
        return view('pages.sertifikat');
    }

    public function cetak2($id)
    {
        $prestasi = Prestasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $ilmu = Pkilmuan::with(['ilmu' => function ($q) {
            $q->where('nama', 'Keilmuan');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $skill = pkilmuan::with(['skill', 'skill' => function ($q) {
            $q->where('nama', 'Skill');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $organ = Jorganisasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $eks = Jekstrakurikuler::where('niup', $id)->orderBy('id', 'DESC')->get();

        $item_ilmu = collect();
        foreach ($ilmu as $i) {
            if (!empty($i->ilmu)) {
                $item_ilmu->push([
                    'id' => $i->ilmu->id,
                    'jurusan' => $i->ilmu->jurusan,
                    'sub' => $i->ilmu->sub,
                ]);
            }
        }

        $item_skill = collect();
        foreach ($skill as $i) {
            if (!empty($i->skill)) {
                $item_skill->push([
                    'id' => $i->skill->id,
                    'jurusan' => $i->skill->jurusan,
                    'sub' => $i->skill->sub,
                ]);
            }
        }

        $halfp = $prestasi->count() / 2;
        $data['prestasi1'] = $prestasi->take($halfp);
        $data['prestasi2'] = $prestasi->skip($halfp);

        $halfi = $item_ilmu->count() / 2;
        $data['ilmu1'] = $item_ilmu->take($halfi);
        $data['ilmu2'] = $item_ilmu->skip($halfi);

        $halfl = $item_skill->count() / 2;
        $data['skill1'] = $item_skill->take($halfl);
        $data['skill2'] = $item_skill->skip($halfl);

        $halfo = $organ->count() / 2;
        $data['organ1'] = $organ->take($halfo);
        $data['organ2'] = $organ->skip($halfo);

        $halfe = $eks->count() / 2;
        $data['eks1'] = $eks->take($halfe);
        $data['eks2'] = $eks->skip($halfe);

        // return $data;
        return view('pages.sertifikat2', $data);
    }
}
