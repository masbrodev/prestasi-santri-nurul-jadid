<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'nama_prestasi', 'tahun'];
}
