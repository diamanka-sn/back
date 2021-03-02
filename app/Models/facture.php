<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    protected $primaryKey = 'idFacture';
    protected $fillable = ['montant','datePaiement','idCom'];
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }
}
