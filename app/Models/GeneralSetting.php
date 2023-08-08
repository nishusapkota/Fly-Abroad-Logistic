<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable=[
        'about_descs',
        'login_image',
        'terms_and_condition',
        'privacy_policy'
    ];
}
