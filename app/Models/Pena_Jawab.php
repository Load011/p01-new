<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pena_Jawab extends Model
{
    use HasFactory;

    protected $table = 'penanggung_jawab';

    protected $fillable =[
        'nama_pj',
        'no_ktp',
        'no_telepon',

    ];

    public function pena_jwb(){
        return $this->hasMany(Asset::class);
    }
}
