<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\LaporanKegiatan;
use App\Models\Dosen;
use App\Models\KategoriKegiatan;
use Illuminate\Support\Facades\Storage;

class LaporanKegiatanController extends Controller
{
    public function index(){
        // Load relasi dosen DAN kategori_kegiatan biar tidak query berulang-ulang (N+1 problem)
        $laporan = LaporanKegiatan::with(['dosen', 'kategori_kegiatan'])->get();
        return view('backend.content.laporan.list', compact('laporan'));
    }

    public function tambah(){
        $dosen = Dosen::all();
        $kategori = KategoriKegiatan::all();

        // Kirim kedua data ke view
        return view('backend.content.laporan.formTambah', compact('dosen', 'kategori'));
    }

    public function prosesTambah(Request $request){
        $this->validate($request,[
            'nama_ketua' => 'required',
            'id_dosen' => 'required',
            'id_kategori_kegiatan' => 'required', // Validasi kategori
            'tahun' => 'required',
            'lokasi' => 'required',
            'judul' => 'required',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $request->file('file_pdf')->store('public/laporan_pdf');
        $nama_file_pdf = $request->file('file_pdf')->hashName();

        $laporan = new LaporanKegiatan();
        $laporan->nama_ketua = $request->nama_ketua;
        $laporan->id_dosen = $request->id_dosen;
        $laporan->id_kategori_kegiatan = $request->id_kategori_kegiatan; // Simpan Kategori
        $laporan->tahun = $request->tahun;
        $laporan->lokasi = $request->lokasi;
        $laporan->judul = $request->judul;
        $laporan->file_pdf = $nama_file_pdf;

        try {
            $laporan->save();

            // --- TAMBAHAN LOG (CREATE) ---
            activity()
                ->performedOn($laporan) // Menautkan objek laporan
                ->event('created')
                ->log('Mengupload Laporan Kegiatan: ' . $request->judul);
            // -----------------------------

            return redirect(route('laporan_kegiatan.index'))->with('pesan',['success','Berhasil Upload Laporan!']);
        }catch (\Exception $e){
            return redirect(route('laporan_kegiatan.index'))->with('pesan',['danger','Gagal Upload Laporan!']);
        }
    }

    public function ubah($id){
        $laporan = LaporanKegiatan::findOrFail($id);
        $dosen = Dosen::all();
        $kategori = KategoriKegiatan::all();
        return view('backend.content.laporan.formUbah', compact('laporan', 'dosen', 'kategori'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request,[
            'nama_ketua' => 'required',
            'id_dosen' => 'required',
            'id_kategori_kegiatan' => 'required',
            'tahun' => 'required',
            'lokasi' => 'required',
            'judul' => 'required',
            'file_pdf' => 'mimes:pdf|max:2048',
        ]);

        $laporan = LaporanKegiatan::findOrFail($request->id_laporan);
        $laporan->nama_ketua = $request->nama_ketua;
        $laporan->id_dosen = $request->id_dosen;
        $laporan->id_kategori_kegiatan = $request->id_kategori_kegiatan;
        $laporan->tahun = $request->tahun;
        $laporan->lokasi = $request->lokasi;
        $laporan->judul = $request->judul;

        if($request->hasFile('file_pdf')){

            // 1. Hapus file lama jika ada
            $oldFilePath = 'public/laporan_pdf/' . $laporan->file_pdf;
            if(Storage::exists($oldFilePath)){
                Storage::delete($oldFilePath);
            }

            // 2. Simpan file baru
            $request->file('file_pdf')->store('public/laporan_pdf');
            $nama_file_baru = $request->file('file_pdf')->hashName();

            // 3. Update nama file di database
            $laporan->file_pdf = $nama_file_baru;
        }

        try {
            $laporan->save();

            // --- TAMBAHAN LOG (UPDATE) ---
            activity()
                ->performedOn($laporan)
                ->event('updated')
                ->log('Mengubah Laporan Kegiatan: ' . $request->judul);
            // -----------------------------

            return redirect(route('laporan_kegiatan.index'))->with('pesan',['success','Berhasil Mengubah Laporan!']);
        }catch (\Exception $e){
            return redirect(route('laporan_kegiatan.index'))->with('pesan',['danger','Gagal Mengubah Laporan!']);
        }
    }

    public function hapus($id){
        $laporan = LaporanKegiatan::findOrFail($id);

        try {
            // --- TAMBAHAN LOG (DELETE) ---
            // Log DULU sebelum dihapus agar subjeknya terbaca
            activity()
                ->performedOn($laporan) // Menautkan objek laporan
                ->event('deleted')
                ->log('Menghapus Laporan Kegiatan: ' . $laporan->judul);
            // -----------------------------

            $laporan->delete();

            return redirect(route('laporan_kegiatan.index'))->with('pesan', ['success','Data Laporan Kegiatan Berhasil Dihapus!']);
        }catch (\Exception $e){
            return redirect(route('laporan_kegiatan.index'))->with('pesan', ['danger','Gagal hapus data!']);
        }
    }
}
