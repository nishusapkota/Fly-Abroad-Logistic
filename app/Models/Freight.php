<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    use HasFactory;
    protected $fillable=[
        'freight_name',
        'dim_factor',
        'weight_wise_rate',
        'dimension_wise_rate'
    ];
}
