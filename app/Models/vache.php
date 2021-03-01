<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vache extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
