<?php

use Illuminate\Database\Seeder;
use App\Models\Kategori;
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
            'name' => 'masbro',
            'email' => 'a@gmail.com',
            'password' => Hash::make(1),
        ]);
        $faker = Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {
            Kategori::insert([
                'nama' => $faker->valid()->randomElement($array = array(
                    'Fashion',
                    'Makanan',
                    'Gaya Hidup',
                    'Travel',
                    'vlogs',
                    'Kesehatan'
                )),
                'deskripsi' => $faker->text($maxNbChars = 200),
            ]);
        }
        for ($i = 1; $i <= 2; $i++) {
            Kategori::insert([
                'nama' => $faker->valid()->randomElement($array = array(
                    'Busana Muslim',
                    'Batik',
                    'kaos'
                )),
                'deskripsi' => $faker->text($maxNbChars = 200),
                'parent_id' => 1,
            ]);
            Kategori::insert([
                'nama' => $faker->valid()->randomElement($array = array(
                    'Ayam Bakar',
                    'Sup Sapi',
                    'Bakso'
                )),
                'deskripsi' => $faker->text($maxNbChars = 200),
                'parent_id' => 2,
            ]);
        }
    }
}
