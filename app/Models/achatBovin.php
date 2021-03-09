<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achatBovin extends Model
{
    protected $primaryKey = 'idAchatBovin';
    protected $fillable = ['montantBovin','dateAchatBovin'];
    use HasFactory;

    public function bovin()
    {
        return $this->belongsTo('App\Models\bovin');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\admin');
    }
}
