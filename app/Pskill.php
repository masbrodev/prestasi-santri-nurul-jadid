<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peminatan;

class Pskill extends Model
{
    protected $table = 'pkilmuan';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'peminatan_id'];

    public function skill()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan_id', 'id');
    }
}
