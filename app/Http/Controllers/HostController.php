<?php

namespace App\Http\Controllers;

use App\Models\Host;
use App\Models\Asset;
use App\Models\AssetOwnershipHistory;
use Illuminate\Http\Request;

class HostController extends Controller
{
    public function index()
    {
        $hosts = Host::all();
        return view('host.index', compact('hosts'));
    }

    public function create()
    {
        $assets = Asset::all();
        return view('host.create', compact('assets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penyewa' => 'required',
            'no_ktp' => 'required',
            'no_tlp' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'upah_jasa' => 'required',
            'harga_sewa' => 'required',
            'bank_pembayaran' => 'required',
            'jumlah_pembayaran' => 'required',
            'saldo_piutang' => 'required',
            'status_pengontrak' => 'required',
            'status_aktif' => 'required',

        ]);

        Host::create($validatedData);

        return redirect()->route('host.index')
                         ->with('success', 'Host created successfully.');
    }

    public function edit(Host $host)
    {
        return view('host.edit', compact('host'));
    }

    public function update(Request $request, Host $host)
    {
        $validatedData = $request->validate([
            'nama_penyewa' => 'required',
            'no_ktp' => 'required',
            'no_tlp' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'upah_jasa' => 'required',
            'harga_sewa' => 'required',
            'bank_pembayaran' => 'required',
            'jumlah_pembayaran' => 'required',
            'saldo_piutang' => 'required',
            'status_pengontrak' => 'required',
            'status_aktif' => 'required',
        ]);

        $host->update($validatedData);

        if ($request->has('asset_id')) {
            $assetId = $request->input('asset_id');
            $asset = Asset::with('previousOwners')->find($assetId);
            if ($asset) {
                AssetOwnershipHistory::create([
                    'asset_id' => $assetId,
                    'previous_owner_id' => $host->id,
                ]);
            }
        }

        return redirect()->route('host.index')
                         ->with('success', 'Host updated successfully');
    }

    public function destroy(Host $host){
        $host->delete();

        return redirect()->route('host.index')
        ->with('success','Asset Deleted Succesfully');
    }
}
