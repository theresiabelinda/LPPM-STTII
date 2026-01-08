<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
use App\Models\KategoriKegiatan; // Pastikan model ini ada

class LaporanKegiatan extends Model
{
    protected $table = 'laporan_kegiatan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'nama_ketua',
        'id_dosen',
        'id_kategori_kegiatan',
        'tahun',
        'lokasi',
        'judul',
        'file_pdf'
    ];

    // Relasi ke Dosen
    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    // Relasi ke Kategori Kegiatan
    public function kategori_kegiatan(){
        return $this->belongsTo(KategoriKegiatan::class, 'id_kategori_kegiatan', 'id_kategori_kegiatan');
    }
}
