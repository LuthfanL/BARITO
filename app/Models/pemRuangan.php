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
        'tglPeminjaman',
        'tglSelesai',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'nik');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'idRuangan');
    }

    public function admin()
    {
        return $this->belongsTo(AdminRuangan::class, 'idAdmin');
    }
}
