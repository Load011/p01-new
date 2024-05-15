<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Tiket;
use App\Models\Overseer;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use PHPUnit\Framework\Attributes\Ticket;

class TiketController extends Controller
{
    public function index(){
        $tickets = Tiket::all();
        return view('tiket.index', compact('tickets'));
    }

    public function create(){
        $assets = Asset::all();
        $overseers = Overseer::all();
        return view('tiket.create', compact('assets', 'overseers'));
    }

    public function store(Request $request){
        $request->validate([
            'id_aset' => 'exists:rekap_aset,id', // Correct table name
            'keterangan' => 'required',
            'before_photo' => 'required',
            'after_photo' => 'nullable',
            'penyelesaian' => 'nullable',
            'biaya_perbaikan' => 'nullable',
            'status' => 'required',
            'issue_by' => 'required|exists:is_user,id'
        ]);

        return redirect()->route('tiket.index')
            ->with('success', 'Pengajuan created successfully.');
    }

    public function show(Tiket $tickets)
    {
        return view('ticket.show', compact('tickets'));
    }

    public function edit(Tiket $tickets)
    {
        return view('ticket.edit', compact('tickets'));
    }

    public function update(Request $request, Tiket $tickets)
    {
        $request->validate([
            'id_aset' => 'exists:asset,id',
            'keterangan' => 'required',
            'before_photo' => 'required',
            'after_photo' => 'nullable',
            'penyelesaian'=> 'nullable',
            'biaya_perbaikan'=> 'required',
            'status' => 'required',
            'issue_by'
        ]);
        if ($request->hasFile('before_photo')) {
            $beforePhotos = [];
            foreach ($request->file('before_photo') as $file) {
                $path = $file->store('', 'before_photo'); // Use the 'before_photo' disk
                $beforePhotos[] = env('APP_URL') . '/before_photos/' . basename($path);
            }
            $tickets->before_photo = json_encode($beforePhotos);
        }

        $tickets->update($request->all());

        return redirect()->route('ticket.index')
            ->with('success', 'Pengajuan updated successfully');
    }

    public function destroy(Tiket $tickets)
    {
        $tickets->delete();

        return redirect()->route('ticket.index')
            ->with('success', 'Pengajuan deleted successfully');
    }
    public function details(Tiket $tickets)
    {
        return view('tiket.details', compact('tickets'));
    }
}
