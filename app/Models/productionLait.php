<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productionLait extends Model
{   protected $primaryKey = 'idProductionLait';
    use HasFactory;

    public function traiteDuJours()
    {
        return $this->hasMany('App\Models\traiteDuJour');
    }

    public function vache()
    {
        return $this->belongsTo('App\Models\vache');
    }
}
