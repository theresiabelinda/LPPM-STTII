<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriKegiatan;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::with('kategori_kegiatan')->get();
        return view('backend.content.berita.list', compact('berita'));
    }

    public function tambah(){
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('backend.content.berita.formTambah', compact('kategori_kegiatan'));
    }

    public function prosesTambah(Request $request){
        $this->validate($request,[
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'tahun' => 'required',
            'id_kategori_kegiatan' => 'required',
            'gambar_berita' => 'required',
        ]);

        $request->file('gambar_berita')->store('public/berita');
        $gambar_berita = $request->file('gambar_berita')->hashName();

        $berita = new Berita;
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->tahun = $request->tahun;
        $berita->id_kategori_kegiatan = $request->id_kategori_kegiatan;
        $berita->gambar_berita = $gambar_berita;

        try {
            $berita->save();

            // --- PERBAIKAN LOG (CREATE) ---
            activity()
                ->performedOn($berita) // <--- INI PENTING: Menempelkan objek berita
                ->event('created')
                ->log('Menambahkan Berita Baru: ' . $request->judul_berita);
            // ------------------------------

            return redirect(route('berita.index'))->with('pesan',['success','Berhasil Menambahkan Berita!']);
        }catch (\Exception $e){
            return redirect(route('berita.index'))->with('pesan',['danger','Gagal Menambahkan Berita!']);
        }
    }

    public function ubah($id){
        $berita = Berita::findOrFail($id);
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('backend.content.berita.formUbah', compact('berita','kategori_kegiatan'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request,[
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'tahun' => 'required',
            'id_kategori_kegiatan' => 'required',
        ]);

        $berita = Berita::findOrFail($request->id_berita);
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->tahun = $request->tahun;
        $berita->id_kategori_kegiatan = $request->id_kategori_kegiatan;

        if($request->hasFile('gambar_berita')){
            $request->file('gambar_berita')->store('public/berita');
            $gambar_berita = $request->file('gambar_berita')->hashName();
            $berita->gambar_berita = $gambar_berita;
        }

        try {
            $berita->save();

            // --- PERBAIKAN LOG (UPDATE) ---
            activity()
                ->performedOn($berita) // <--- INI PENTING
                ->event('updated')
                ->log('Mengubah Data Berita: ' . $berita->judul_berita);
            // ------------------------------

            return redirect(route('berita.index'))->with('pesan',['success','Berhasil Ubah Berita!']);
        }catch (\Exception $e){
            return redirect(route('berita.index'))->with('pesan',['danger','Gagal Ubah Berita!']);
        }
    }

    public function hapus($id){
        $berita = Berita::findOrFail($id);

        try {
            // --- PERBAIKAN LOG (DELETE) ---
            // Log DULU sebelum dihapus agar datanya terbaca lengkap
            activity()
                ->performedOn($berita) // <--- INI PENTING
                ->event('deleted')
                ->log('Menghapus Berita: ' . $berita->judul_berita);
            // ------------------------------

            $berita->delete(); // Baru dihapus di sini

            return redirect(route('berita.index'))->with('pesan', ['success','Data Berita Berhasil Dihapus!']);
        }catch (\Exception $e){
            return redirect(route('berita.index'))->with('pesan', ['danger','Gagal Hapus Data!']);
        }
    }
}
