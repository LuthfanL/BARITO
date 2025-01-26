<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';

    protected $primaryKey = 'id';
    public $incrementing =  true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'idAdmin',
        'nama',
        'lokasi',
        'podium',
        'meja',
        'kursi',
        'sound',
        'ac',
        'proyektor',
        'luas',
        'deskripsi',
        'lantai',
        'foto',
        'biayaSewa',
    ];

    public function pemRuangan()
    {
        return $this->hasMany(pemRuangan::class, 'idRuangan');
    }

    // Tambahkan relasi ke adminRuangan jika diperlukan
    public function adminRuangan()
    {
        return $this->belongsTo(adminRuangan::class, 'idAdmin', 'idAdmin');
    }
}
