<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = "denda";
    protected $fillable = [
        "id_peminjaman",
        "cash"
    ];

    public function buku_kategori()
    {
        return $this->belongsTo(Buku::class, 'id_peminjaman');
    }
}
