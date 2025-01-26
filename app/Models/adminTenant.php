<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminTenant extends Authenticatable
{
    use HasFactory;

    protected $table = 'adminTenant';

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

    public function pemTenant()
    {
        return $this->hasMany(pemTenant::class, 'idAdmin');
    }

    public function event()
    {
        return $this->hasMany(event::class, 'idAdmin');
    }

    public function User(){
        return $this->hasOne(User::class, 'email');
    }

    public static function getIdAdminByEmail($email)
    {
        return self::where('email', $email)->value('idAdmin');
    }
}
