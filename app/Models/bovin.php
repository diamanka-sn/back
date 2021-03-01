<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bovin extends Model
{
    protected $fillable = ['codeBovin','nom','photo','etatSante','geniteur','genitrice','etat','situation'];
    use HasFactory;
}
