<?php

namespace App\Http\Controllers;

use App\Models\DokumenLainnya;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pedoman;

class HomeController extends Controller
{
    public function index(){
        $berita = Berita::with('kategori_kegiatan')->latest()->take(3)->get();

        return view('frontend.content.home', compact('berita'));
    }

    public function sejarah(){
        return view('frontend.content.sejarah');
    }

    public function visimisi(){
        return view('frontend.content.visimisi');
    }

    public function struktur(){
        return view('frontend.content.struktur');
    }

    public function detail($id)
    {
        $berita = Berita::with('kategori_kegiatan')->where('id_berita', $id)->firstOrFail();
        return view('frontend.content.detailBerita', compact('berita'));
    }

    public function pedoman()
    {
        $pedomans = Pedoman::latest()->get();

        return view('frontend.content.pedoman', compact('pedomans'));
    }

    public function dokumenlainnya()
    {
        $dokumenlainnya = DokumenLainnya::latest()->get();

        return view('frontend.content.dokumenlainnya', compact('dokumenlainnya'));
    }

    public function penelitian()
    {
       $berita = Berita::whereHas('kategori_kegiatan', function($query) {
            $query->where('nama_kategori_kegiatan', 'LIKE', '%Penelitian%');
        })->latest()->get();

       return view('frontend.content.penelitian', compact('berita'));
    }

    public function pkm()
    {
        $berita = Berita::whereHas('kategori_kegiatan', function($query) {
            $query->where('nama_kategori_kegiatan', 'LIKE', '%pengabdian kepada masyarakat%');
        })->latest()->get();

        return view('frontend.content.pkm', compact('berita'));
    }
}
