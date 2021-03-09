<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'idUtilisateur'; 
    protected $fillable = ['nom','prenom','tel','adresse','photo','login','password','profile'];

    public function commandes()
    {
        return $this->hasMany('App\Models\commande');
    }

    
}
