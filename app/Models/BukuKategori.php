<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKategori extends Model
{
    protected $table = "kategori_buku";
    protected $fillable = [
        'nama_kategori'
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_kategori', 'id');
    }
}
