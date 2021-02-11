<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peminatan;
class pkilmuan extends Model
{
    protected $table = 'pkilmuan';
    protected $primaryKey = 'id';
    protected $fillable = ['niup', 'peminatan_id'];

    public function ilmu()
    {
        return $this->belongsTo(Peminatan::class, 'peminatan_id', 'id');
    }
}
