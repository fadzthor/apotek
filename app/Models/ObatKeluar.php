<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_pasien',            
        'jumlah',
        'jumlah_pembayaran',
        'created_at',
        'updated_at',
        'id_obat'
    ];
}
