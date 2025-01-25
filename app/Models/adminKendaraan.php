<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminKendaraan extends Authenticatable
{
    use HasFactory;

    protected $table = 'adminKendaraan';

    protected $primaryKey = 'idAdmin';
    public $incrementing =  false;
    protected $keyType = 'char';
    
    protected $fillable = [
        'idAdmin',
        'name',
        'noHP',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    
    protected $cast = [
        'password' => 'hashed',
    ];

    public function pemKendaraan()
    {
        return $this->hasMany(pemKendaraan::class, 'idAdmin');
    }

    public function kendaraan()
    {
        return $this->hasMany(kendaraan::class, 'idAdmin');
    }

    public function User(){
        return $this->hasOne(User::class, 'email');
    }

    public static function getIdAdminByEmail($email)
    {
        return self::where('email', $email)->value('idAdmin');
    }
}
