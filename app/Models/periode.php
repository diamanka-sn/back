<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    protected $primaryKey = 'idPeriode';
    protected $fillable = ['nomPeriode','phase'];
    use HasFactory;

    public function vaches()
    {
        return $this->hasMany('App\Models\vache');
    }
}
