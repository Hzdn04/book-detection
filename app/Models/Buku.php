<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";
    protected $fillable = [
        "id_kategori",
        "kode_barcode",
        "nama_buku",
        "tempat_terbit",
        "penerbit",
        "penulis",
        "tahun_terbit",
        "editor",
        "total_halaman",
        "tempat_buku",
        "buku_tersedia",
        "gambar"
    ];

    public function kategori_buku()
    {
        return $this->belongsTo(BukuKategori::class, 'id_kategori');
    }

    public function peminjaman()
    {
        return $this->hasMany(Buku::class, 'id_buku', 'id');
    }
}
