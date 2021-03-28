<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venteLait extends Model
{
    protected $primaryKey = 'idVenteLait';
<<<<<<< HEAD
    protected $fillable = ['prixTotale','bouteille_id','commande_id'];
=======
    protected $fillable = ['bovin_id','commande_id','bouteille_id','prixTotale'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
    use HasFactory;

    public function commande()
    {
        return $this->belongsTo('App\Models\commande');
    }

    public function bouteille()
    {
        return $this->belongsTo('App\Models\bouteille');
    }
}
