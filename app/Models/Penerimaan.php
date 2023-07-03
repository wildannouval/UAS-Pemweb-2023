<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $table = 'penerimaan';
    protected $fillable = [
            'id_barang',
            'id_supplier',
            'id_kategori',
        ];

    public function barang()
    {
        return $this->belongsTo(Barang::class,'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id');
    }
}
