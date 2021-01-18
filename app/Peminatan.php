<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    protected $table = 'peminatan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama' , 'jurusan', 'sub'];
    public $timestamps = false;
}
