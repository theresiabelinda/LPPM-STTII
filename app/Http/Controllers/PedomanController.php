<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedoman;
use Illuminate\Support\Facades\Storage;

class PedomanController extends Controller
{
    public function index()
    {
        $data = Pedoman::latest()->get();
        return view('backend.content.pedoman.list', compact('data'));
    }

    public function tambah()
    {
        return view('backend.content.pedoman.formTambah');
    }

    public function prosesTambah(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'file_pdf'  => 'required|mimes:pdf|max:5120', // Max 5MB, PDF Only
        ]);

        $file = $request->file('file_pdf');
        // Simpan ke folder storage/app/public/pedoman_pdf
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/pedoman_pdf', $filename);

        Pedoman::create([
            'nama_file' => $request->nama_file,
            'path_file' => $filename,
        ]);

        return redirect()->route('pedoman.index')->with('success', 'Pedoman berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $pedoman = Pedoman::findOrFail($id);
        return view('backend.content.pedoman.formUbah', compact('pedoman'));
    }

    public function prosesUbah(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'file_pdf'  => 'nullable|mimes:pdf|max:5120',
        ]);

        $pedoman = Pedoman::findOrFail($request->id);
        $dataUpdate = ['nama_file' => $request->nama_file];

        if ($request->hasFile('file_pdf')) {
            // Hapus file lama
            if (Storage::exists('public/pedoman_pdf/' . $pedoman->path_file)) {
                Storage::delete('public/pedoman_pdf/' . $pedoman->path_file);
            }

            // Upload file baru
            $file = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pedoman_pdf', $filename);

            $dataUpdate['path_file'] = $filename;
        }

        $pedoman->update($dataUpdate);

        return redirect()->route('pedoman.index')->with('success', 'Pedoman berhasil diubah');
    }

    public function hapus($id)
    {
        $pedoman = Pedoman::findOrFail($id);

        // Hapus file fisik
        if (Storage::exists('public/pedoman_pdf/' . $pedoman->path_file)) {
            Storage::delete('public/pedoman_pdf/' . $pedoman->path_file);
        }

        $pedoman->delete();

        return redirect()->route('pedoman.index')->with('success', 'Pedoman berhasil dihapus');
    }
}
