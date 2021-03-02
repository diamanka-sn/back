<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $primaryKey = 'idUtilisateur';
<<<<<<< HEAD
    protected $fillable = ['nom','prenom','tel','adresse','photo','login','password','profile'];
=======
    public $filable = ['nom','prenom','tel','adresse','photo','login','password','profile'];
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    use HasFactory;
}
