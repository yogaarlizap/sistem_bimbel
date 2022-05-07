<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajar extends Model
{
    use HasFactory;
    protected $table = "pengajar";
    protected $primaryKey = "id";
    protected $guarded  = ["id"];
    protected $fillable = [
        "nomor_induk",
        "user_id",
        "pendidikan_terakhir",
        "asal_pendidikan",
        "nomor_telpon",
        "alamat",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
