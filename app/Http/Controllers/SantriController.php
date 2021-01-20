<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiSantri;
use App\Santri;

class SantriController extends Controller
{
    public function api()
    {
        $data['santri'] = ApiSantri::get();
        return $data;
    }

    public function index()
    {
        $data['santri'] = Santri::get();
        return $data;
        // return view('pages.santri',$data);
    }
}
