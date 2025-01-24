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
}
