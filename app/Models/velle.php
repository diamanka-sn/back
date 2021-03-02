<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class velle extends Model
{
    use HasFactory;
    protected $fillable = ['idBovin'];

    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
