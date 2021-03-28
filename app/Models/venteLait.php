<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venteLait extends Model
{
    protected $primaryKey = 'idVenteLait';
    protected $fillable = ['prixTotale','bouteille_id','commande_id'];
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }

    public function bouteille()
    {
        return $this->belongsTo('App\Models\bouteille');
    }
}
