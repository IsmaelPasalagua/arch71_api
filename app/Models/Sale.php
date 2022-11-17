<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'order_id',
        'date',
        'subtotal',
        'total',
    ];
}
