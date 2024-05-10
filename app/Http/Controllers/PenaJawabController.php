<?php

namespace App\Http\Controllers;

use App\Models\Pena_Jawab;
use Illuminate\Http\Request;

class PenaJawabController extends Controller
{
    public function index()
    {
        $penajawab = Pena_Jawab::all();
        return view('penanggung_j.index', compact('penajawab'));
    }

    public function create()
    {
        return view('penanggung_j.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pj' => 'required',
            'no_ktp' => 'required',
            'no_telepon' => 'required',
        ]);

        Pena_Jawab::create($request->all());

        return redirect()->route('penanggung_j.index')
            ->with('success', 'Penanggung Jawab created successfully.');
    }

    public function show(Pena_Jawab $penajawab)
    {
        return view('penanggung_j.show', compact('penajawab'));
    }

    public function edit(Pena_Jawab $penajawab)
    {
        return view('penanggung_j.edit', compact('penajawab'));
    }

    public function update(Request $request, Pena_Jawab $penajawab)
    {
        $request->validate([
            'nama_pj' => 'required',
            'no_ktp' => 'required',
            'no_telepon' => 'required',
        ]);

        $penajawab->update($request->all());

        return redirect()->route('penanggung_j.index')
            ->with('success', 'Penanggung Jawab updated successfully');
    }

    public function destroy(Pena_Jawab $penajawab)
    {
        $penajawab->delete();

        return redirect()->route('penanggung_j.index')
            ->with('success', 'Penanggung Jawab deleted successfully');
    }
}
