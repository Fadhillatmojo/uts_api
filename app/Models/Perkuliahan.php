<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perkuliahan extends Model
{
    use HasFactory;

    protected $table = 'perkuliahan'; // Tambahkan ini
    protected $primaryKey = 'id_perkuliahan';  // Jika id_perkuliahan adalah primary key

    protected $fillable = [
        'nim',
        'kode_mk',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
