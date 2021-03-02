<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alimentationDuJour extends Model
{
    use HasFactory;
    protected $fillable = ['idUtilisateur','nomAlimentation','quantiteAlimentation','date'];

    public function fermier()
    {
        return $this->belongsTo('App\Models\fermier');
    }
}
