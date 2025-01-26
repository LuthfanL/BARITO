<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $primaryKey = 'namaEvent';
    public $incrementing =  false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'namaEvent',
        'idAdmin',
        'tglMulai',
        'tglSelesai',
        'nMakanan',
        'nBarang',
        'nJasa',
        'deskripsi',
        'foto',
        'hargaTenant',
    ];

    public function pemTenant()
    {
        return $this->hasMany(pemTenant::class, 'namaEvent');
    }

    // Tambahkan relasi ke adminTenant jika diperlukan
    public function adminTenant()
    {
        return $this->belongsTo(adminTenant::class, 'idAdmin', 'idAdmin');
    }
}
