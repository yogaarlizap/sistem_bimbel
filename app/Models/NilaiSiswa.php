<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiSiswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "nilai_siswa";
    protected $primaryKey = "id";
    protected $guarded = ["id"];
    protected $fillable = [
        "nilai_angka",
        "nilai_huruf",
        "siswa_id"
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, "siswa_id");
    }
}
