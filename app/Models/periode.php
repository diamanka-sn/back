<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    protected $primaryKey = 'idPeriode';
<<<<<<< HEAD
    protected $fillable = ['nomPeriode','phase'];
=======
    public $filable = ['nomPeriode','phase'];
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    use HasFactory;

    public function vaches()
    {
        return $this->hasMany('App\Models\vache');
    }
}
