<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password']; // sesuaikan field di DB
}


