<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemTenant extends Model
{
    use HasFactory;

    protected $table = 'pemTenant';

    protected $primaryKey = 'id';
    public $incrementing =  true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'idCustomer',
        'namaEvent',
        'idAdmin',
        'namaTenant',
        'tipeTenant',
        'tglMulai',
        'tglSelesai',
        'buktiBayar',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'nik');
    }

    public function event()
    {
        return $this->belongsTo(event::class, 'namaEvent');
    }

    public function admin()
    {
        return $this->belongsTo(adminTenant::class, 'idAdmin');
    }
}
