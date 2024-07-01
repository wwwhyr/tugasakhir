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
        'nama' => 'required',
        'username' => 'required|unique:petugass,username',
        'password' => 'required',
        'daerah' => 'required',
    ]);
    try{
        Petugas::create($validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
    }
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

    public function update(Request $request, Petugas $petugas)
{
    $validatedData = $request->validate([
        'nama' => 'required',
        'username' => 'required|unique:petugass,username,' . $petugas,
        'password' => 'sometimes',
        'daerah' => 'required',
    ]);

    try {
        $petugas->update($validatedData);
        return redirect()->route('petugas.index')->with('success', 'Data berhasil diperbarui.');
    }catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.']);
    }
}

    public function destroy($petugas)
    {
        $data = Petugas::where('id',$petugas)->first();
        // dd($data);
        if($data->delete()){
            return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully.');
        }else{
            return redirect()->route('petugas.index')->with('error', 'Petugas deleted Error.');
        }
        

        // return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully.');
    }

}
