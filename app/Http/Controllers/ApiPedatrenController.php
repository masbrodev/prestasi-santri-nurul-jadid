<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\User;
use Illuminate\Http\Request;

class ApiPedatrenController extends Controller
{

    protected $client, $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = User::where('name', 'masbro')->get('token');
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

    public function apiformulir(Request $request, $id)
    {
        $request = $this->client->get('https://api.pedatren.nuruljadid.app/person/' . $id, [
            'headers' => [
                'x-token' => $this->token[0]['token']
            ],
        ])->getBody()->getContents();
        $data['santri'] = json_decode($request, false);
        return $data;
    }

    public function foto(Request $request, $id1, $id2, $id3, $id4)
    {
        $request = $this->client->get('https://api.pedatren.nuruljadid.app/person/' .  $id1 . '/' . $id2 . '/' . $id3 . '/' . $id4, [
            'headers' => [
                'x-token' => $this->token[0]['token']
            ],
        ])->getBody()->getContents();
        return response($request, 200)
            ->header('Content-Type', 'image/png');
    }
}
