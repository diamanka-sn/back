<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autreDepense extends Model
{
    protected $primaryKey = 'idAutreDepense';
    protected $fillable = ['dateDepense','type','libelle','montant','idUtilisateur'];
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo('App\Models\admin');
    }
}
