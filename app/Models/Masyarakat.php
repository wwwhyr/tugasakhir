<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan', 'desa', 'nama', 'usia', 'tinggi_badan', 'berat_badan', 'status'
    ];
}
