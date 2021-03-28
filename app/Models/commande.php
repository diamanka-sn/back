<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    protected $primaryKey = 'idCom';
    protected $fillable = ['dateCom','client_id'];
    use HasFactory;


    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }
    public function venteLaits()
    {
        return $this->hasMany('App\Models\venteLait');
    }

    public function factures()
    {
        return $this->hasMany('App\Models\facture');
    }

    public function venteBovins()
    {
        return $this->hasMany('App\Models\venteBovin');
    }
}
