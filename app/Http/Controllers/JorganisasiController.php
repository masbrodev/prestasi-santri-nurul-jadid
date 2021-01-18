<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JorganisasiController extends Controller
{
    public function index()
    {

        return view('pages.j_organisasi');
    }
}
