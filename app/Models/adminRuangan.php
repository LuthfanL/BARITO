<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminRuangan extends Authenticatable
{
    use HasFactory;

    protected $table = 'adminRuangan';

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

    public function pemRuangan()
    {
        return $this->hasMany(pemRuangan::class, 'idAdmin');
    }

    public function ruangan()
    {
        return $this->hasMany(ruangan::class, 'idAdmin');
    }

    public function User(){
        return $this->hasOne(User::class, 'email');
    }

    public static function getIdAdminByEmail($email)
    {
        return self::where('email', $email)->value('idAdmin');
    }
}
