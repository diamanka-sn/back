<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fermier extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'user_id';
<<<<<<< HEAD
    protected $fillable = ['user_id','salaire'];
=======
    protected $fillable = ['user_id', 'salaire'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902

    public function traiteDuJours()
    {
        return $this->hasMany('App\Models\traiteDuJour');
    }

    public function alimentationDuJours()
    {
        return $this->hasMany('App\Models\alimentationDuJour');
    }
}
