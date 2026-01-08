<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriKegiatan;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = ['tahun','judul_berita','isi_berita','gambar_berita','id_kategori_kegiatan'];

    public function kategori_kegiatan(){
        return $this->belongsTo(KategoriKegiatan::class,'id_kategori_kegiatan');
    }
}
