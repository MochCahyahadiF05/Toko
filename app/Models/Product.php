<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jenis_satuan',
        'stok',
        'harga_jual',
        'harga_beli',
    ];
    protected $timetamps = true;
    public function sales()
    {
        return $this->hasMany(Sales::class, 'product_id');
    }

}
