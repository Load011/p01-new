<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayahs';

    protected $fillable =[
        'nama_wilayah',
        'kode_pos'
    ];

    public function wilayah_penapj(){
        return $this->belongsTo(Asset::class);
    }
}
