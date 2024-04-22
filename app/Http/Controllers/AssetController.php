<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Host;
use App\Models\AssetOwnershipHistory;
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
            'host_id' => '',
            'wilayah' => 'required',
            'nama_aset' => 'required',
            'jenis_aset' => 'required',
            'kode_aset' => 'required',
            'alamat' => 'required',
            'id_transaksi' => 'exists:tuan_rumah,id',
            'deskripsi_aset' => 'nullable|string',
            'foto_aset' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('foto_aset')) {
            $file = $request->file('foto_aset');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'foto_aset/' . $fileName;
            $file->move(public_path('foto_aset'), $fileName);
            $validatedData['foto_aset'] = $filePath;
        }

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
            'host_id' => '',
            'wilayah' => 'required',
            'nama_aset' => 'required',
            'jenis_aset' => 'required',
            'kode_aset' => 'required',
            'alamat' => 'required',
            'id_transaksi' => 'exists:tuan_rumah,id',
            'deskripsi_aset' => 'nullable|string',
            'foto_aset' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'

        ]);
        
        if ($asset->host_id !== null) {
            AssetOwnershipHistory::create([
                'asset_id' => $asset->id,
                'previous_owner_id' => $asset->host_id,
                'ownership_changed_at' => now(),
            ]);
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'foto_aset/' . $fileName;
            $file->move(public_path('foto_aset'), $fileName);
            // ddd($file);

            $validatedData['foto_aset'] = $filePath;
        }

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
        return view('asset.details', compact('asset'));
    }

    public function detailed(Asset $asset){
        $host = Host::all();
        return view('asset.detailed', compact('asset', 'host'));
    }

    public function edited(Asset $asset)
    {
        $hosts = Host::all();
        return view('asset.edited', compact('asset', 'hosts'));
    }}
