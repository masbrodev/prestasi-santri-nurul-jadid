<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminatan;
use GuzzleHttp\Client;
use App\Jorganisasi;
use App\Prestasi;
use App\pkilmuan;
use App\Pskill;
use App\Jekstrakurikuler;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use PDF;

class SantriController extends Controller
{
    public function index()
    {
        return view('pages.santri');
    }

    public function formulir($id)
    {
        $data['peminatan'] = Peminatan::orderBy('jurusan', 'DESC')->get();

        $data['skill'] = Pskill::with(['skill', 'skill' => function ($q) {
            $q->where('nama', 'Skill');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['ilmu'] = Pkilmuan::with(['ilmu' => function ($q) {
            $q->where('nama', 'Keilmuan');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['prestasi'] = Prestasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['organ'] = Jorganisasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['eks'] = Jekstrakurikuler::where('niup', $id)->orderBy('id', 'DESC')->get();

        return view('pages.formulir', $data);
        // return $data;
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

        $skill = Pskill::with(['skill', 'skill' => function ($q) {
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
