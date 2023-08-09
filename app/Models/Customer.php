<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_name',
        'sender_contact',
        'sender_country',
        'sender_state',
        'sender_city',
        'sender_zip',
        'sender_address',

        'receiver_name',
        'receiver_contact',
        'receiver_country',
        'receiver_state',
        'receiver_city',
        'receiver_zip',
        'receiver_address',
    ];
}
