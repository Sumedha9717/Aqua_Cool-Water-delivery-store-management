<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable = [
        'brand_name',
        'brand_slug',
        'brand_image',
        'status',
    ];
}
