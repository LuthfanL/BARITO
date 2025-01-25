<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemKendaraan extends Model
{
    use HasFactory;

    protected $table = 'pemKendaraan';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'idCustomer',
        'idKendaraan',
        'idAdmin',
        'tglMulai',
        'tglSelesai',
        'status',
        // 'buktiBayar',
    ];

    public function customer()
    {
        return $this->belongsTo(customer::class, 'idCustomer', 'NIK');
    }

    public function kendaraan()
    {
        return $this->belongsTo(kendaraan::class, 'idKendaraan', 'platNomor');
    }

    public function adminKendaraan()
    {
        return $this->belongsTo(adminKendaraan::class, 'idAdmin', 'idAdmin');
    }
}

