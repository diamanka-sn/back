<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venteBovin extends Model
{
    protected $primaryKey = 'idVenteBovin';
<<<<<<< HEAD
    protected $fillable = ['bovin_id','prixBovin','dateVenteBovin','commande_id'];
=======
    protected $fillable = ['bovin_id','commande_id','dateVenteBovin','prixBovin'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }

    public function bovin()
    {
        return $this->belongsTo('App\Models\bovin');
    }
}
