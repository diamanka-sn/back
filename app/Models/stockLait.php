<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockLait extends Model
{
    protected $primaryKey = 'idStockLait';
    use HasFactory;

    public function bouteilles()
    {
        return $this->hasMany('App\Models\bouteille');
    }
}
