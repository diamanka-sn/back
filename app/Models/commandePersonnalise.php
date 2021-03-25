<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class commandePersonnalise extends Model
{
    protected $primaryKey = 'idComPerso';
    protected $fillable = ['prix','quantite','idUtilisateur','dateComPerso'];
    use HasFactory;

    public function client()
    {
        return $this->belongsTo('App\Models\client');
    }
}
