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

        $data['peminatan'] = Peminatan::orderBy('jurusan', 'DESC')->get();

        $data['skill'] = Pskill::with(['skill', 'skill' => function ($q) {
            $q->where('nama', 'Skill');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['ilmu'] = Pkilmuan::with(['ilmu' => function ($q) {
            $q->where('nama', 'Keilmuan');
        }])->where('niup', $id)->orderBy('id', 'DESC')->get();

        $pres = Prestasi::where('niup', $id)->orderBy('id', 'DESC')->get();
        $data['prestasi1'] = ceil($pres->count() / 2);
        $data['prestasi'] = $pres->chunk($data['prestasi1']);



        $data['organ'] = Jorganisasi::where('niup', $id)->orderBy('id', 'DESC')->get();

        $data['eks'] = Jekstrakurikuler::where('niup', $id)->orderBy('id', 'DESC')->get();

        // return $data;
        return view('pages.sertifikat2', $data);
    }
}
