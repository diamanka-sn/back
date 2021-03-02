<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bouteille extends Model
{
    protected $primaryKey = 'idBouteille';
    protected $fillable = ['idStock','capacite'];
    
    use HasFactory;

    public function stockLait()
    {
        return $this->belongsTo('App\Models\stockLait');
    }


    public function venteLaits()
    {
        return $this->hasMany('App\Models\venteLait');
    }
}
