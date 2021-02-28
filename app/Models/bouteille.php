<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bouteille extends Model
{
    use HasFactory;

    public function stockLait(){
        return $this->belongsTo('App\stockLait');
    }
} 
