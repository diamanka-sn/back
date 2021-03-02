<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $primaryKey = 'idUtilisateur';
    public $filable = ['nom','prenom','tel','adresse','photo','login','password','profile'];
    use HasFactory;
}
