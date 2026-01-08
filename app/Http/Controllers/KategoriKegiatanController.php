<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKegiatan;

class KategoriKegiatanController extends Controller
{
    public function index()
    {
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('backend.content.kategori_kegiatan.list', compact('kategori_kegiatan'));
    }

    public function tambah(){
        return view('backend.content.kategori_kegiatan.formTambah');
    }

    public function prosesTambah(Request $request){
        $this->validate($request, [
            'nama_kategori_kegiatan' => 'required'
        ]);

        $kategori_kegiatan = new KategoriKegiatan();
        $kategori_kegiatan->nama_kategori_kegiatan = $request->nama_kategori_kegiatan;

        try {
            $kategori_kegiatan->save();

            // --- PERBAIKAN LOG (CREATE) ---
            activity()
                ->performedOn($kategori_kegiatan) // Menautkan objek kategori
                ->event('created')
                ->log('Menambahkan Kategori Kegiatan: ' . $request->nama_kategori_kegiatan);
            // ------------------------------

            return redirect(route('kategori_kegiatan.index'))->with('pesan', ['success','Data Kategori Kegiatan Berhasil Ditambahkan']);
        }catch (\Exception $e){
            return redirect(route('kategori_kegiatan.index'))->with('pesan', ['danger','Gagal tambah data!']);
        }
    }

    public function ubah($id){
        $kategori_kegiatan = KategoriKegiatan::findOrFail($id);
        return view('backend.content.kategori_kegiatan.formUbah', compact('kategori_kegiatan'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request, [
            'id_kategori_kegiatan' => 'required',
            'nama_kategori_kegiatan' => 'required'
        ]);

        $kategori_kegiatan = KategoriKegiatan::findOrFail($request->id_kategori_kegiatan);
        $kategori_kegiatan->nama_kategori_kegiatan = $request->nama_kategori_kegiatan;

        try {
            $kategori_kegiatan->save();

            // --- PERBAIKAN LOG (UPDATE) ---
            activity()
                ->performedOn($kategori_kegiatan) // Menautkan objek kategori
                ->event('updated')
                ->log('Mengubah Kategori Kegiatan menjadi: ' . $request->nama_kategori_kegiatan);
            // ------------------------------

            return redirect(route('kategori_kegiatan.index'))->with('pesan', ['success','Data Kategori Kegiatan Berhasil Diubah']);
        }catch (\Exception $e){
            return redirect(route('kategori_kegiatan.index'))->with('pesan', ['danger','Gagal ubah data!']);
        }
    }

    public function hapus($id){
        $kategori_kegiatan = KategoriKegiatan::findOrFail($id);

        try {
            // --- PERBAIKAN LOG (DELETE) ---
            // Log DULU sebelum dihapus agar datanya masih terbaca sistem
            activity()
                ->performedOn($kategori_kegiatan) // Menautkan objek kategori
                ->event('deleted')
                ->log('Menghapus Kategori Kegiatan: ' . $kategori_kegiatan->nama_kategori_kegiatan);
            // ------------------------------

            $kategori_kegiatan->delete();

            return redirect(route('kategori_kegiatan.index'))->with('pesan', ['success','Data Kategori Kegiatan Berhasil Dihapus!']);
        }catch (\Exception $e){
            return redirect(route('kategori_kegiatan.index'))->with('pesan', ['danger','Gagal hapus data!']);
        }
    }
}
