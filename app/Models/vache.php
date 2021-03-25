<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vache extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'idBovin';
<<<<<<< HEAD
    protected $fillable = ['codeBovin','nom','photo','dateNaiss','etatDeSante','geniteur','genitrice','etat','situation','idRace','prix'];
=======
    protected $fillable = ['codeBovin','nom','photo','dateNaiss','etatDeSante','geniteur','genitrice','etat','situation','idRace','idPeriode'];
>>>>>>> e002d398770c5357c27be6e9961d44c180864b04

    public function productionLaits()
    {
        return $this->hasMany('App\Models\productionLait');
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\periode');
    }
}
