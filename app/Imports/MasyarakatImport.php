<?php

namespace App\Imports;

use App\Models\Masyarakat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasyarakatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Log data row untuk debug
        \Log::info('Row data: ', $row);

        return new Masyarakat([
            'kecamatan' => $row['kecamatan'] ?? null,
            'desa' => $row['desa'] ?? null,
            'nama' => $row['nama'] ?? null,
            'usia' => $row['usia'] ?? 0, // Nilai default 0 jika null
            'tinggi_badan' => $row['tinggi_badan'] ?? 0, // Nilai default 0 jika null
            'berat_badan' => $row['berat_badan'] ?? 0, // Nilai default 0 jika null
            'status' => $row['status'] ?? 'Tidak Diketahui', // Nilai default jika null
        ]);
    }
}
