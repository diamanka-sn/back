<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    protected $primaryKey = 'idFacture';
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }
}
