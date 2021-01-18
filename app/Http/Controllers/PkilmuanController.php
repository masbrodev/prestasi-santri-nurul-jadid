<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PkilmuanController extends Controller
{
    public function index()
    {

        return view('pages.p_ilmu');
    }
}
