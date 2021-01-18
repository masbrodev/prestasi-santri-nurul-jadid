<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JekstrakurikulerController extends Controller
{
    public function index()
    {

        return view('pages.j_ekstra');
    }
}
