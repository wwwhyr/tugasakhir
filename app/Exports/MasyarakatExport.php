<?php

namespace App\Exports;

use App\Models\Masyarakat;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasyarakatExport implements FromCollection
{
    public function collection()
    {
        return Masyarakat::all();
    }
}
