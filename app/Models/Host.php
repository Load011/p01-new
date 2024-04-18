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
        'nama_penyewa',
        'no_ktp',
        'no_tlp',
        'tgl_awal',
        'tgl_akhir',
        'upah_jasa',
        'harga_sewa',
        'bank_pembayaran',
        'jumlah_pembayaran',
        'saldo_piutang',
        'status_pengontrak',
        'status_aktif',
    ];

    public function rekapAsets()
    {
        return $this->hasMany(Asset::class, 'id_transaksi', 'id');
    }
}
