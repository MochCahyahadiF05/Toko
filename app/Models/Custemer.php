<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custemer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_customer',
        'no_telp',
        'alamat'
    ];

    protected $timetamps = true;
}
