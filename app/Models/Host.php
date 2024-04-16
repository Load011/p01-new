<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;

    protected $table = "tuan_rumah";

    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'nama_penyewa'
    ];

    public function rekapAsets()
    {
        return $this->hasMany(Asset::class, 'id_transaksi', 'id');
    }
}
