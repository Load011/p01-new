<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = "tiket_masalah";

    protected $fillable = [
        'id_aset',
        'keterangan',
        'before_photo',
        'after_photo',
        'penyelesaian',
        'biaya_perbaikan',
        'status',
        'issue_by'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'id_aset');
    }

    public function penanggungJawab(){
        return $this->hasMany(Overseer::class, 'issued_by');
    }
}
