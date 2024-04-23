<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class DashboardController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        $assetsWithHost = Asset::whereNotNull('host_id')->count();
        $assetsWithHostList = Asset::whereNotNull('host_id')->get();
        $assetsWithoutHost = Asset::whereNull('host_id')->count();
        $assetsWithoutHostList = Asset::whereNull('host_id')->get();

        $chartData = $this->getChartData();
        
        return view("dashboard", compact('assets','assetsWithHost', 'assetsWithHostList', 
        'assetsWithoutHost', 'assetsWithoutHostList', 'chartData'));
    }

    private function getChartData()
    {
        $assets = Asset::all();
        $namaAset = [];
        $upahSewa = [];
        $pengeluaran = [];

        foreach ($assets as $asset) {
            $namaAset[] = $asset->nama_aset;
            $upahSewa[] = $asset->upah_sewa;
            $pengeluaran[] = $asset->pengeluaran;
        }

        return [
            'namaAset' => json_encode($namaAset),
            'upahSewa' => json_encode($upahSewa),
            'pengeluaran' => json_encode($pengeluaran),
        ];
    }

}
