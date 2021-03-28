<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'user_id'; 
    protected $fillable = ['user_id'];

    public function commandes()
    {
        return $this->hasMany('App\Models\commande');
    }

    
}
