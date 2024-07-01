<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('dashboard', $data);
    }
    public function getStuntingData()
    {
        $data = DB::table('masyarakats')
            ->select('kecamatan', 'desa', DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN status = "stunting" THEN 1 ELSE 0 END) as stunting'))
            ->groupBy('kecamatan', 'desa')
            ->get();

        $groupedData = $data->groupBy('kecamatan');

        return response()->json($groupedData);
    }
}
