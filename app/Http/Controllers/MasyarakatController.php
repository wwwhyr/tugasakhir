<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Daerah;
use App\Imports\MasyarakatImport;
use Maatwebsite\Excel\Facades\Excel;
use GuzzleHttp\Client;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::all();
        $kecamatans = Daerah::distinct()->pluck('kecamatan');
        $desas = Masyarakat::select('desa')->distinct()->get();

        return view('masyarakat.index', compact('masyarakats', 'kecamatans'));
    }

    public function create()
    {
        $kecamatans = Daerah::distinct()->pluck('kecamatan');
        return view('masyarakat.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
        ]);

        try {
            // Simpan data ke database
            Masyarakat::create($validatedData);
            // Redirect ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Redirect ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Masyarakat $masyarakat)
    {
        $kecamatans = Daerah::distinct()->pluck('kecamatan');
        return view('masyarakat.edit', compact('masyarakat', 'kecamatans'));
    }

    public function update(Request $request, Masyarakat $masyarakat)
    {
        $validatedData = $request->validate([
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
        ]);

        try {
            $masyarakat->update($validatedData);
            return redirect()->route('masyarakat.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.']);
        }
    }

    public function destroy(Masyarakat $masyarakat)
    {
        try {
            $masyarakat->delete();
            return redirect()->route('masyarakat.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data.']);
        }
    }

    public function print()
    {
        $masyarakats = Masyarakat::all();
        return view('masyarakat.print', compact('masyarakats'));
    }

    public function getDesa(Request $request)
    {
        $desas = Masyarakat::select('desa')
                            ->where('kecamatan', $request->kecamatan)
                            ->distinct()
                            ->get();

        return response()->json($desas);
    }

    public function filter(Request $request)
    {
        $query = Masyarakat::query();

        if ($request->filled('kecamatan')) {
            $query->where('kecamatan', $request->kecamatan);
        }

        if ($request->filled('desa')) {
            $query->where('desa', $request->desa);
        }

        $data = $query->get();

        $stuntingCount = $data->where('status', 'Stunting')->count();
        $tidakStuntingCount = $data->where('status', 'Tidak Stunting')->count();

        return response()->json([
            'data' => $data,
            'stuntingCount' => $stuntingCount,
            'tidakStuntingCount' => $tidakStuntingCount
        ]);
    }

    public function updateStatus()
    {
        $masyarakats = Masyarakat::all();

        $data = $masyarakats->map(function ($masyarakat) {
            return [
                'nama' => $masyarakat->nama,
                'usia' => $masyarakat->usia,
                'berat_badan' => $masyarakat->berat_badan,
                'tinggi_badan' => $masyarakat->tinggi_badan,
            ];
        })->toArray();

        $results = $this->calculateStunting($data);

        foreach ($results as $result) {
            $masyarakat = Masyarakat::where('nama', $result['nama'])->first();
            if ($masyarakat) {
                $masyarakat->status = $result['status'];
                $masyarakat->save();
            }
        }

        return redirect()->route('masyarakat.index')->with('success', 'Status berhasil diupdate.');
    }

    private function calculateStunting($data)
    {
        $client = new Client();
        $response = $client->post('http://localhost:5000/calculate-status', [
            'json' => ['data' => $data]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        try {
            Excel::import(new MasyarakatImport, $request->file('file')->store('temp'));
            return back()->with('success', 'Data berhasil diimpor.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengimpor data.']);
        }
    }
}
