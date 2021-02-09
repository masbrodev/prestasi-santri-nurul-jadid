<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pskill extends Model
{
    protected $table = 'pkilmuan';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'peminatan_id'];
}
