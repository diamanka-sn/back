<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achatAliment extends Model
{
    protected $primaryKey = 'idAchatAliment';
    protected $fillable = ['nomAliment','quantite','montant','idUtilisateur'];
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo('App\Models\admin');
    }
}
