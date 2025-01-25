<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';

    protected $primaryKey = 'platNomor';
    public $incrementing =  false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'platNomor',
        'idAdmin',
        'nama', 
        'jumlahKursi', 
        'tv', 
        'sound',
        'ac', 
        'deskripsi', 
        'cc', 
        'tahunKeluar', 
        'foto', 
        'biayaSewa', 
    ];

    public function pemKendaraan()
    {
        return $this->hasMany(pemKendaraan::class, 'idKendaraan');
    }

    // Tambahkan relasi ke adminKendaraan jika diperlukan
    public function adminKendaraan()
    {
        return $this->belongsTo(adminKendaraan::class, 'idAdmin', 'idAdmin');
    }
}
