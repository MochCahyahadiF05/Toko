<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'cust_id',
        'qty',
        'total_price',
        'sale_date',
        'cust_nama',
        'status_payment',

    ];

    protected $timetamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
