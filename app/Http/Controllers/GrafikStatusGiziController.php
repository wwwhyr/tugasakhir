<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class GrafikStatusGiziController extends Controller
{
    public function index(Request $request)
    {
        $kecamatans = Masyarakat::select('kecamatan')->distinct()->get();
        $desas = Masyarakat::select('desa')->distinct()->get();

        return view('grafik.status_gizi', compact('kecamatans', 'desas'));
    }

    public function filter(Request $request)
    {
        $query = Masyarakat::query();

        // Apply filters
        if ($request->has('kecamatan') && $request->kecamatan != '') {
            $query->where('kecamatan', $request->kecamatan);
        }
        if ($request->has('desa') && $request->desa != '') {
            $query->where('desa', $request->desa);
        }

        $masyarakats = $query->get()->toArray();
        $response = Http::post('http://localhost:5000/calculate-status', ['data' => $masyarakats]);
        $data = $response->json();

        $stuntingCount = count(array_filter($data, function ($item) {
            return $item['status'] === 'Stunting';
        }));
        $tidakStuntingCount = count($data) - $stuntingCount;

        return response()->json([
            'data' => $data,
            'stuntingCount' => $stuntingCount,
            'tidakStuntingCount' => $tidakStuntingCount,
        ]);
    }
}
