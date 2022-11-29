<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_obat',
        'harga',
        'stok',
        'gambar',
        'tanggal_kadaluarsa',
        'created_at',
        'updated_at',
        'id_jenis_obat'
    ];

    // public function jenisObat()
    // {
    //     return $this->belongsTo(JenisObat::class, 'nama');
    // }
}
