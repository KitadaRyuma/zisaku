<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'area_id',
        'name',
        'address',
        'tel',
        'station',
        'business_hours',
    ];

}
