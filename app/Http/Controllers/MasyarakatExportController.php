<?php

namespace App\Http\Controllers;

use App\Exports\MasyarakatExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Masyarakat;

class MasyarakatExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new MasyarakatExport, 'masyarakat.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new MasyarakatExport, 'masyarakat.csv');
    }

    public function exportPdf()
    {
        $masyarakats = Masyarakat::all();
        $pdf = PDF::loadView('exports.masyarakat', compact('masyarakats'));
        return $pdf->download('masyarakat.pdf');
    }
}
