<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traiteDuJour extends Model
{
    protected $primaryKey = 'idTraiteDuJour';
<<<<<<< HEAD
    protected $fillable = ['dateTraite','traiteMatin','traiteSoir','fermier_id','ProductionLait_id'];
=======
    protected $fillable = ['dateTraite','traiteMatin','traiteSoir','fermier_id','productionLait_id'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
    use HasFactory;

    public function fermier()
    {
        return $this->belongsTo('App\Models\fermier');
    }

    public function productionLait()
    {
        return $this->belongsTo('App\Models\productionLait');
    }

}
