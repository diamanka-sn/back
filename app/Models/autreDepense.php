<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autreDepense extends Model
{
    protected $primaryKey = 'idDepenses';
    protected $fillable = ['dateDepenses','type','libelle','montant','admin_id'];
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo('App\Models\admin');
    }
}
