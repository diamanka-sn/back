<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vache extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'idBovin';
    protected $fillable = ['codeBovin','periode_id','idBovin'];

    public function productionLaits()
    {
        return $this->hasMany('App\Models\productionLait');
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\periode');
    }
}
