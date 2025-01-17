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
    public $incrementing =  true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'idCustomer',
        'idKendaraan',
        'idAdmin',
        'tglPeminjaman',
        'tglSelesai',
        'status',
        'buktiBayar',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'nik');
    }

    public function kendaraan()
    {
        return $this->belongsTo(kendaraan::class, 'platNomor');
    }

    public function admin()
    {
        return $this->belongsTo(adminKendaraan::class, 'idAdmin');
    }
}
