<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veau extends Model
{
    use HasFactory;
    protected $fillable = ['codeBovin','nom','photo','dateNaiss','etatDeSante','geniteur','genitrice','etat','situation','idRace'];
    
    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
