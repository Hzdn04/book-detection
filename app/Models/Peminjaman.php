<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $fillable = [
        "id_buku",
        "id_user",
        "tgl_peminjaman",
        "tgl_pengembalian",
        "is_return"
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(Buku::class, 'id ');
    }
}
