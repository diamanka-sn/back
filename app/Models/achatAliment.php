<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achatAliment extends Model
{
    protected $primaryKey = 'idAchatAliment';
<<<<<<< HEAD
    protected $fillable = ['nomAliment','quantite','montant','idUtilisateur'];
=======
    public $filable = ['type','dateDepense','libelle','montant'];
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo('App\Models\admin');
    }
}
