<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    use HasFactory;

    protected $fillable = [
        'pincode',
        'location',
        'latitude',
        'longitude',
        'radius',
        'address',
        'status',
        'updated_by',
        'created_by',
        'del',

    ];
}
