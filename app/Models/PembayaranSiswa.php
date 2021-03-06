<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranSiswa extends Model
{
    use HasFactory;
    protected $table = "pembayaran_siswa";
    protected $primaryKey = "id";
    protected $guarded = ["id"];
    protected $fillable = [
        "status",
        "nominal_diterima",
        "nominal_tertunggak",
        "siswa_id",
        "jenis_pembayaran",
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, "siswa_id");
    }
}
