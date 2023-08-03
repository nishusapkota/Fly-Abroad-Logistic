<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
    protected $fillable=[
        'shipment_completed',
        'destination',
        'local_partner',
        'year_of_experience'
    ];
}
