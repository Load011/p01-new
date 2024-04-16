<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Host;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact('assets'));
    }

    public function create()
    {
        $hosts = Host::all();
        return view('asset.create', compact('hosts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'host_id' => 'required',
            'wilayah' => 'required',
            'nama_aset' => 'required',
            'jenis_aset' => 'required',
            'kode_aset' => 'required',
            'alamat' => 'required',
            'id_transaksi' => 'exists:tuan_rumah,id',
        ]);

        Asset::create($validatedData);

        return redirect()->route('asset.index')
                         ->with('success', 'Asset created successfully.');
    }

    public function edit(Asset $asset)
    {
        $hosts = Host::all();
        return view('asset.edit', compact('asset', 'hosts'));
    }

    public function update(Request $request, Asset $asset)
    {
        $validatedData = $request->validate([
            'host_id' => 'required',
            'wilayah' => 'required',
            'nama_aset' => 'required',
            'jenis_aset' => 'required',
            'kode_aset' => 'required',
            'alamat' => 'required',
            'id_transaksi' => 'exists:tuan_rumah,id',
        ]);

        $asset->update($validatedData);

        return redirect()->route('asset.index')
                         ->with('success', 'Asset updated successfully');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('asset.index')
                         ->with('success', 'Asset deleted successfully.');
    }
    public function details(Asset $asset)
    {
        return view('asset.details', ['asset' => $asset]);
    }

}
