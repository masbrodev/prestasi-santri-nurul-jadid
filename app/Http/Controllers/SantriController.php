<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiSantri;
use GuzzleHttp\Client;
use App\Santri;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class SantriController extends Controller
{

    protected $client, $token;

    public function __construct()
    {
        $this->client = new Client();
        // $this->token = env('API_RAJAONGKIR');
        $this->token = User::where('name','masbro')->get('token');
    }

    public function login(Request $request)
    {
        $request = $this->client->get('https://api.pedatren.nuruljadid.app/auth/login', [
            'headers' => [
                'Authorization' => 'Basic bnVydGFyaXE6bnVydGFyaXExMTA4ODk='
            ]
        ])->getHeader('x-token')[0];
        if ($request) {
            User::where('name', 'masbro')->update(['token' => $request]);
        }

        return redirect('home');
    }

    public function santri(Request $request)
    {
        $page = $request->query('page');
        $limit = $request->query('limit');
        $cari = $request->query('cari');
        $request = $this->client->get('https://api.pedatren.nuruljadid.app/santri', [
            'headers' => [
                'x-token' => $this->token[0]['token']
            ],
            'query' => [
                'page' => $page,
                'limit' => $limit,
                'cari' => $cari
            ]
        ])->getBody()->getContents();
        $data['santri'] = json_decode($request, false);
        $data['jumlah'] = count($data['santri']);
        return $data;

    }

    public function coba()
    {
        $data = User::where('name','masbro')->get('token');
        return $data[0]['token'];
    }

    public function index()
    {
        // $data['santri'] = Santri::get();
        // return $data;
        return view('pages.santri');
    }

    public function indexx()
    {
        // $request = $this->client->get(URL::to('api/santri'));
        // $response = $request->getBody();

        // $request = $this->client->get(URL::to('api/santri'))->getBody()->getContents();
        // $data['santri'] = json_decode($request, false);
        // $data['jumlah'] = count($data['santri']);
        // return $response;
        // return view('pages.santri', $data);
    }
}
