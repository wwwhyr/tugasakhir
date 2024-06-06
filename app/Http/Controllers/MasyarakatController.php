<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::all();
        return view('masyarakat.index', compact('masyarakats'))->with('datatable', true);
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'nama' => 'required',
            'usia' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
        ]);

        Masyarakat::create($validatedData);

        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Masyarakat $masyarakat)
    {
        return view('masyarakat.edit', compact('masyarakat'));
    }

    public function update(Request $request, Masyarakat $masyarakat)
    {
        $validatedData = $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
            'nama' => 'required',
            'usia' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
        ]);

        $masyarakat->update($validatedData);

        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat updated successfully.');
    }

    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat->delete();

        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat deleted successfully.');
    }

    public function print()
    {
        $masyarakats = Masyarakat::all();
        return view('masyarakat.print', compact('masyarakats'));
    }
}
