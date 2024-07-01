<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function getDesaByKecamatan($kecamatan)
    {
        $desas = Daerah::where('kecamatan', $kecamatan)->pluck('desa');
        return response()->json($desas);
    }

    public function index()
    {
        $daerahs = Daerah::all();
        return view('daerahs.index', compact('daerahs'));
    }

    public function create()
    {
        return view('daerahs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
        ]);

        Daerah::create($request->all());
        return redirect()->route('daerahs.index')->with('success', 'Data Daerah created successfully.');
    }

    public function edit(Daerah $daerah)
    {
        return view('daerahs.edit', compact('daerah'));
    }

    public function update(Request $request, Daerah $daerah)
    {
        $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
        ]);

        $daerah->update($request->all());
        return redirect()->route('daerahs.index')->with('success', 'Data Daerah updated successfully.');
    }

    public function destroy(Daerah $daerah)
    {
        $daerah->delete();
        return redirect()->route('daerahs.index')->with('success', 'Data Daerah deleted successfully.');
    }
}
