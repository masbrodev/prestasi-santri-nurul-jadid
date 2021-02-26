<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jorganisasi extends Model
{
    protected $table = 'jorganisasi';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'kategori', 'nama_organisasi', 'jabatan','masa_jabatan'];

    public function gk1(){
        $jb1 = $this->masa_jabatan;
        return Str::beforeLast($jb1, '-');
    }

    public function gk2(){
        $jb2 = $this->masa_jabatan;
        return Str::afterLast($jb2, '-');
    }

}
