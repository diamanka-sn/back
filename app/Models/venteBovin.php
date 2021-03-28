<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venteBovin extends Model
{
    protected $primaryKey = 'idVenteBovin';
    protected $fillable = ['bovin_id','commande_id','dateVenteBovin','prixBovin'];
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }

    public function bovin()
    {
        return $this->belongsTo('App\Models\bovin');
    }
}
