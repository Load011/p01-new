<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Host;

class Asset extends Model
{
    use HasFactory;

    protected $table = "rekap_aset";

    public $timestamps = false;

    protected $fillable = [
        'host_id',
        'wilayah',
        'nama_aset',
        'jenis_aset',
        'kode_aset',
        'deskripsi_aset',
        'foto_aset',
        'alamat',

    ] ;

    public function tuanRumah(){
        return $this->belongsTo(Host::class, 'host_id');
    }

    public function previousOwners()
    {
        return $this->hasManyThrough(
            Host::class,
            AssetOwnershipHistory::class,
            'asset_id',
            'id',
            'id',
            'previous_owner_id'
        )->orderBy('ownership_changed_at', 'desc'); 
    }
}
