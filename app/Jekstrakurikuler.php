<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jekstrakurikuler extends Model
{
    protected $table = 'jekstrakurikuler';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'asrama', 'bidang', 'sub_bidang', 'masa_keanggotaan'];

    public function gk1()
    {
        $gk1 = $this->masa_keanggotaan;
        return Str::beforeLast($gk1, '-');
    }

    public function gk2()
    {
        $gk2 = $this->masa_keanggotaan;
        return Str::afterLast($gk2, '-');
    }
}
