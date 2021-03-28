<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id'];

    public function achatAliments()
    {
        return $this->hasMany('App\Models\achatAliment');
    }

    public function autresDepenses()
    {
        return $this->hasMany('App\Models\autresDepense');
    }

    public function achatBovins()
    {
        return $this->hasMany('App\Models\achatBovin');
    }

}
