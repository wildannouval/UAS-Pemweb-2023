<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
            'nama_barang',
            'keterangan_barang',
            'jumlah_barang',
    ];

    public function penerimaanBarang(){
        return $this->hasOne(Penerimaan::class);
    }
}