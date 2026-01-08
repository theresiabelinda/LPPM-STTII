<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    protected $table = 'kategori_kegiatan';
    protected $primaryKey = 'id_kategori_kegiatan';
    protected $fillable = ['nama_kategori_kegiatan'];
}
