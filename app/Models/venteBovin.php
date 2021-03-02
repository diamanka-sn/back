<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venteBovin extends Model
{
    protected $primaryKey = 'idVenteBovin';
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
