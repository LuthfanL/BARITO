<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';
    public $incrementing =  true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $cast = [
        'password' => 'hashed',
        'remember_token' => 'hashed',
    ];

    public function customer()
    {
        return $this->hasOne(customer::class, 'email');
    }

    public function adminRuangan()
    {
        return $this->hasOne(adminRuangan::class, 'email');
    }

    public function adminkendaraan()
    {
        return $this->hasOne(adminkendaraan::class, 'email');
    }

    public function adminTenant(){
        return $this->hasOne(adminTenant::class, 'email');
    }
}
