<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'sub_heading',
        'heading',
        'order',
        'visibility'
    ];
}
