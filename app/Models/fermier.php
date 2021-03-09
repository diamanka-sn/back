<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fermier extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['salaire'];
    protected $fillable = ['nom','prenom','tel','adresse','photo','login','password','profile','salaire'];

    public function traiteDuJours()
    {
        return $this->hasMany('App\Models\traiteDuJour');
    }

    public function alimentationDuJours()
    {
        return $this->hasMany('App\Models\alimentationDuJour');
    }

}
