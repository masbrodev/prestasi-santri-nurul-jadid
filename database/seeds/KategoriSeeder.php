<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'ppmorsatorda',
            'email' => 'ppmorsatorda',
            'password' => Hash::make('ppmorsatorda'),
        ]);
        User::insert([
            'name' => 'nurthariq',
            'email' => 'nurthariq',
            'password' => Hash::make('nurtari110889'),
        ]);
        User::insert([
            'name' => 'masbro',
            'email' => 'mb',
            'password' => Hash::make(1),
        ]);
    }
}
