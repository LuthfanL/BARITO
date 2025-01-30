<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemRuangan extends Model
{
    use HasFactory;

    protected $table = 'pemRuangan';

    protected $primaryKey = 'id';
    public $incrementing =  true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'idCustomer',
        'idRuangan',
        'idAdmin',
        'namaPemohon',
        'noWa',
        'namaRuangan',
        'keperluan', 
        'keterangan',
        'tglMulai',
        'tglSelesai',
        'status',
        'buktiBayar',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'NIK');
    }

    public function ruangan()
    {
        return $this->belongsTo(ruangan::class, 'id');
    }

    public function admin()
    {
        return $this->belongsTo(adminRuangan::class, 'idAdmin');
    }
}
