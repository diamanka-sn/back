<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traiteDuJour extends Model
{
    protected $primaryKey = 'idTraiteDuJour';
    protected $fillable = ['dateTraite','traiteMatin','traiteSoir','fermier_id','ProductionLait_id'];
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
