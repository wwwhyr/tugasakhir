<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $petugass = Petugas::all();
        return view('petugas.index', compact('petugass'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'daerah' => 'required|string|max:255',
    ]);

    Petugas::create($validatedData);

    return redirect()->route('petugas.index')->with('success', 'Petugas created successfully.');
}

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($validatedData);

        return redirect()->route('petugas.index')->with('success', 'Petugas updated successfully.');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully.');
    }

}
