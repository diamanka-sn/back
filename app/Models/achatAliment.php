<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achatAliment extends Model
{
    protected $primaryKey = 'idAchatAliment';
    public $filable = ['type','dateDepense','libelle','montant'];
    use HasFactory;
}
