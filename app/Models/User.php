<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\ModelsPruned;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'residence',
        'updated_at'
    ];
}
