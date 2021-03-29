<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genisse extends Model
{
    use HasFactory;
    protected $fillable = ['codeBovin','phase','dateIA','idBovin'];
    
    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
