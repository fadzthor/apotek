<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(JenisObat::class, 'foreign_key', 'nama');
    }

    protected $fillable = [
        'id',
        'distributor',            
        'jumlah',
        'tanggal_masuk',
        'created_at',
        'updated_at',
        'id_obat'
    ];
}
