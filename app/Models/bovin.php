<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bovin extends Model
{
    protected $primaryKey = 'idBovin';
    protected $fillable = ['codeBovin','nom','photo','dateNaissance','etatDeSante','geniteur','genitrice','etat','situation','race_id','prix'];
    use HasFactory;

    public function race()
    {
        return $this->belongsTo('App\Models\race');
    }

    public function pesages()
    {
        return $this->hasMany('App\Models\pesage');
    }

    public function diagnostics()
    {
        return $this->hasMany('App\Models\diagnostic');
    }

    public function achatBovins()
    {
        return $this->hasMany('App\Models\achatBovin');
    }

    public function venteBovins()
    {
        return $this->hasMany('App\Models\venteBovin');
    }
}
