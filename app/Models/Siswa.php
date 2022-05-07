<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "siswa";
    protected $primaryKey = "id";
    protected $guarded = ["id"];
    protected $fillable = [
        "nama",
        "alamat",
        "no_telpon",
        "email",
        "nama_orang_tua",
        "no_telpon_ortu",
    ];

    public function nilai_siswa()
    {
        return $this->hasMany(NilaiSiswa::class, "id");
    }

    public function pembayaran_siswa()
    {
        return $this->hasMany(PembayaranSiswa::class, "id");
    }
}
