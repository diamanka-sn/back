<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
<<<<<<< HEAD
    protected $fillable = [
      
     'nom','prenom','telephone',
     'adresse','photo','email','password',
     'profile','est_fermier','est_admin'
        
    ];
=======
    protected $fillable = ['nom', 'prenom', 'telephone', 'adresse', 'photo', 'login', 'password','email','est_fermier', 'est_admin','profile'];

>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }    
}
