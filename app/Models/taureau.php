<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taureau extends Model
{
    use HasFactory;
    protected $fillable = ['codeBovin','idBovin'];

    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
