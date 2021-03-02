<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockLait extends Model
{
    protected $primaryKey = 'idStockLait';
    protected $fillable = ['quantiteTotale','quantiteVendue','quantiteDispo'];
    use HasFactory;

    public function bouteilles()
    {
        return $this->hasMany('App\Models\bouteille');
    }
}
