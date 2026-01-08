<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenLainnya;
use Illuminate\Support\Facades\Storage;

class DokumenLainnyaController extends Controller
{
    public function index()
    {
        $data = DokumenLainnya::latest()->get();
        return view('backend.content.dokumenlainnya.list', compact('data'));
    }

    public function tambah()
    {
        return view('backend.content.dokumenlainnya.formTambah');
    }
//
    public function prosesTambah(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'file_pdf'  => 'required|mimes:pdf|max:5120', // Max 5MB, PDF Only
        ]);

        $file = $request->file('file_pdf');

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/dokumenlainnya_pdf', $filename);

        DokumenLainnya::create([
            'nama_file' => $request->nama_file,
            'path_file' => $filename,
        ]);

        return redirect()->route('dokumenlainnya.index')->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $dokumenlainnya = DokumenLainnya::findOrFail($id);
        return view('backend.content.dokumenlainnya.formUbah', compact('dokumenlainnya'));
    }

    public function prosesUbah(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'file_pdf'  => 'nullable|mimes:pdf|max:5120',
        ]);

        $dokumenlainnya = DokumenLainnya::findOrFail($request->id);
        $dataUpdate = ['nama_file' => $request->nama_file];

        if ($request->hasFile('file_pdf')) {
            // Hapus file lama
            if (Storage::exists('public/dokumenlainnya_pdf/' . $dokumenlainnya->path_file)) {
                Storage::delete('public/dokumenlainnya_pdf/' . $dokumenlainnya->path_file);
            }

            // Upload file baru
            $file = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumenlainnya_pdf', $filename);

            $dataUpdate['path_file'] = $filename;
        }

        $dokumenlainnya->update($dataUpdate);

        return redirect()->route('dokumenlainnya.index')->with('success', 'Dokumen berhasil diubah');
    }

    public function hapus($id)
    {
        $dokumenlainnya = DokumenLainnya::findOrFail($id);

        if (Storage::exists('public/dokumenlainnya_pdf/' . $dokumenlainnya->path_file)) {
            Storage::delete('public/dokumenlainnya_pdf/' . $dokumenlainnya->path_file);
        }

        $dokumenlainnya->delete();

        return redirect()->route('dokumenlainnya.index')->with('success', 'Dokumen berhasil dihapus');
    }
}
