<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'comment',
        'recommended',
        'point_of_concern',
        'review',
        'created_at',
        'updated_at'
    ];


}
