<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoresComment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'store_id',
        'comment_id',
    ];

}
