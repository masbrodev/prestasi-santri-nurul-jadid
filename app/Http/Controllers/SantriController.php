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
}
