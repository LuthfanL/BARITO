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
    ];

    public function pemRuangan()
    {
        return $this->hasMany(pemRuangan::class, 'idRuangan');
    }
}
