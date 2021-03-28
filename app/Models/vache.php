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
    protected $fillable = ['codeBovin','periode_id','idBovin'];
=======
    protected $fillable = ['idBovin','codeBovin','periode_id'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902

    public function productionLaits()
    {
        return $this->hasMany('App\Models\productionLait');
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\periode');
    }
}
