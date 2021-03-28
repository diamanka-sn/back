<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bouteille extends Model
{
    protected $primaryKey = 'idBouteille';
<<<<<<< HEAD
    protected $fillable = ['stock_id','capacite','prix','nombreDispo','prix','description'];
=======
    protected $fillable = ['stock_id','capacite','prix','nombreDispo','description'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
    
    use HasFactory;

    public function stockLait()
    {
        return $this->belongsTo('App\Models\stockLait');
    }


    public function venteLaits()
    {
        return $this->hasMany('App\Models\venteLait');
    }
    
}
