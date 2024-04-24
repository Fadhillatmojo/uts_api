<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Tambahkan ini
    protected $primaryKey = 'nim';  // Jika nim adalah primary key
    public $incrementing = false;    // Jika primary key adalah string
    protected $keyType = 'string';   // Jika primary key adalah string

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'tanggal_lahir',
    ];
}
