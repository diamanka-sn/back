<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veau extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = ['codeBovin','idBovin'];
=======
    protected $fillable = ['idBovin','codeBovin'];
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
    
    public $incrementing = false;
    protected $primaryKey = 'idBovin';
}
