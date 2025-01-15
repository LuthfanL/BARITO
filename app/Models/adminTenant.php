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
}
