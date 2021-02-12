<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jorganisasi extends Model
{
    protected $table = 'jorganisasi';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'kategori', 'nama_organisasi', 'masa_jabatan', 'masa_keanggotaan'];

    public function jb1(){
        $jb1 = $this->masa_jabatan;
        return Str::beforeLast($jb1, '-');
    }

    public function jb2(){
        $jb2 = $this->masa_jabatan;
        return Str::afterLast($jb2, '-');
    }

    public function gk1(){
        $gk1 = $this->masa_keanggotaan;
        return Str::beforeLast($gk1, '-');
    }

    public function gk2(){
        $gk2 = $this->masa_keanggotaan;
        return Str::afterLast($gk2, '-');
    }
}
