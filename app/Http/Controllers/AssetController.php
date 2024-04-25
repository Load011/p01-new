<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Host;
use App\Models\AssetOwnershipHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', compact('assets'));
    }

    public function create(Request $request)
    {
        $hostId = $request->input('hostId');
        $hosts = Host::all();
        return view('asset.create', compact('hosts', 'hostId'));
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
            'foto_aset' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pengeluaran' => 'nullable',
        ]);
        if ($request->hasFile('foto_aset')) {
            $file = $request->file('foto_aset');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'foto_aset/' . $fileName;
            $file->move(public_path('foto_aset'), $fileName);
            $validatedData['foto_aset'] = $filePath;
        }

        $asset = Asset::create($validatedData);

        if ($request->has('host_id')) {
            $validatedData['host_id'] = $request->input('host_id');
          } else {
            // No host selected, create a new one and associate with asset
            $hostData = $request->only([
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
            ]);
        
            $asset = $request->user()->assets()->create($validatedData);
            dd($hostData);
            $asset->tuanRumah()->create($hostData);
          }

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
        return redirect()->route('asset.edited', $asset->id)
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

    public function edited(Asset $asset)
    {
        $hosts = Host::all();
        return view('asset.edited', compact('asset', 'hosts'));
    }}
