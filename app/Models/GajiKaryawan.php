<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiKaryawan extends Model
{
    use HasFactory;

    protected $table = 'gaji_karyawan';
    protected $primaryKey = 'id_gaji_karyawan'; 
    protected $guarded = [];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}
