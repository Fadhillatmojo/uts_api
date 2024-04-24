<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah'; // Tambahkan ini
    protected $primaryKey = 'kode_mk';  // Jika kode_mk adalah primary key
    public $incrementing = false;    // Jika primary key adalah string
    protected $keyType = 'string';   // Jika primary key adalah string
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
    ];
}
