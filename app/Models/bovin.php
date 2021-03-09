<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bovin extends Model
{
    protected $primaryKey = 'idBovin';
<<<<<<< HEAD
    protected $fillable = ['codeBovin','nom','photo','etatDeSante','geniteur','genitrice','etat','situation'];
=======
    protected $fillable = ['codeBovin','nom','photo','dateNaiss','etatDeSante','geniteur','genitrice','etat','situation','idRace'];
>>>>>>> 557898fabf757c97e8e3289ccaf31f9cda69fb65
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
