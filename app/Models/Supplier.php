<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'nama_supplier',
    ];

    public function penerimaanSupplier()
    {
        return $this->hasOne(Penerimaan::class);
    }
}
