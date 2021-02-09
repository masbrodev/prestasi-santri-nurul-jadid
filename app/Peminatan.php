<?php

namespace App;

use App\Pkilmuan;
use App\Pskill;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    protected $table = 'peminatan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jurusan', 'sub'];
    public $timestamps = false;

    public function ilmu()
    {
        return $this->hasMany(Pkilmuan::class, 'peminatan_id', 'id');
    }

    public function skill()
    {
        return $this->hasMany(Pskill::class, 'peminatan_id', 'id');
    }
}
