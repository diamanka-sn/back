<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genisse extends Model
{
    use HasFactory;
    protected $fillable = ['codeBovin','nom','photo','dateNaiss','etatDeSante','geniteur','genitrice','etat','situation','idRace','phase','dateIA'];
    
    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
