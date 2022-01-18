<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      //  'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  /*  public function getPasswordAttribute()
    {
        return Crypt::decryptString($this->password);
    }*/

    public function getPasswordAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']= Crypt::encryptString($value);

    }

    public function passwordValidate($password){
        return  $this->password===$password;
    }

    public function logout(){
        
    }




}
