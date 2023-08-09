<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPartner extends Model
{
    use HasFactory;
    protected $fillable=[
        'shipping_partner',
            'shipping_tracking_id',
            'tracking_url'
    ];
}
