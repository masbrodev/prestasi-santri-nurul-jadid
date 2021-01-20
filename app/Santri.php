<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{

    // protected $url = "http://localhost:8000/api/santri";

    // protected $id;
    // protected $name;

    // public function get()
    // {
    //     $data = json_encode(array(
    //         'id' => $this->id,
    //         'name' => $this->name,
    //     )); 

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $this->url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    //     curl_setopt($ch, CURLOPT_PUT, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    //     return true;
    // }
    protected $table = 'santri_coba';
    protected $primaryKey = 'id';
    protected $fillable = [];
    
}
