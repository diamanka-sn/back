<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $primaryKey = 'idUtilisateur';
    protected $fillable = ['nom','prenom','tel','adresse','photo','email','password','profile'];
    use HasFactory;
}
