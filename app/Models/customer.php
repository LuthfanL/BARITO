<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customer';

    protected $primaryKey = 'NIK';
    public $incrementing =  false;
    protected $keyType = 'char';
    
    protected $fillable = [
        'nik',
        'name',
        'alamat',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $cast = [
        'password' => 'hashed',
        'remember_token' => 'hashed',
    ];

    public function pemRuangan()
    {
        return $this->hasMany(pemRuangan::class, 'idCustomer');
    }

    public function pemKendaraan()
    {
        return $this->hasMany(pemKendaraan::class, 'idCustomer');
    }

    public function pemTenant()
    {
        return $this->hasMany(pemTenant::class, 'idCustomer');
    }
}
