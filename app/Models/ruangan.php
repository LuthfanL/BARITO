<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';

    protected $primaryKey = 'idRuangan';
    public $incrementing =  false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'idRuangan',
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
}
