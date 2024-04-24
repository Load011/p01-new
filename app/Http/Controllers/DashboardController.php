<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class DashboardController extends Controller
{
    public function index()
    {
        $assets = Asset::all();

        $dataAset = Asset::pluck('nama_aset');

        $assetsWithHost = Asset::whereNotNull('host_id')->count();
        $assetsWithHostList = Asset::whereNotNull('host_id')->get();
        $assetsWithoutHost = Asset::whereNull('host_id')->count();
        $assetsWithoutHostList = Asset::whereNull('host_id')->get();

        $hargaSewaWithHost = $assetsWithHostList->pluck('tuanRumah.harga_sewa');

        return view("dashboard", compact('assets','assetsWithHost', 'assetsWithHostList', 
        'assetsWithoutHost', 'assetsWithoutHostList', 'dataAset', 'hargaSewaWithHost'));
    }
}
