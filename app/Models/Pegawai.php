<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_perkawinan',
        'pengalaman_kerja',
        'ipk',
        'usia',
        'nilai_psikotest',
        'nilai_tes_tertulis',
        'nilai_wawancara',
    ];
}