<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'lppm@sttii',
             'password' => bcrypt('233033'),
         ]);

         DB::table('kategori_kegiatan')->insert([
            'nama_kategori_kegiatan' => 'Mission Trip',
         ]);

        DB::table('berita')->insert([
            'judul_berita' => 'Mission Trip Palembang',
            'isi_berita' => 'Pengabdian Kepada Masyarakat, Mission Trip to Palembang dengan judul kegiatan yaitu "Be like Jesus" dalam 1 Yohanes 2:6',
            'gambar_berita' => 'contoh.jpg',
            'tahun' => '2025',
            'id_kategori_kegiatan' => 1,
        ]);

        DB::table('laporan_kegiatan')->insert([
                'nama_ketua' => 'Kezia Agustina Br. Samosir',
                'id_dosen' => 1,
                'id_kategori_kegiatan' => 1,
                'tahun' => 2025,
                'lokasi' => 'Mission Trip Palembang',
                'judul' => 'Be Like Jesus (1 Yohanes 2:6)',
                'file_pdf' => 'Laporan Mission Trip Palembang 2025.pdf',
        ]);

        DB::table('dosen')->insert([
            ['nama_dosen' => 'Anon Dwi Saputro, M.Th', 'nidn' => '2303109501'],
            ['nama_dosen' => 'Arman Susilo, M.Th', 'nidn' => '2304027202'],
            ['nama_dosen' => 'Dr. Detty Manongko, M.Th', 'nidn' => '8963530021'],
            ['nama_dosen' => 'Endah Totok Budiono, M.Th', 'nidn' => '2319028001'],
            ['nama_dosen' => 'Dr. Farel Yosua Sualang, M.Th', 'nidn' => '2323039201'],
            ['nama_dosen' => 'Dr. Hasanema Wau, M.Th', 'nidn' => '2316096901'],
            ['nama_dosen' => 'Dr. Jani, M.Th', 'nidn' => '2317028201'],
            ['nama_dosen' => 'Dr. Lanny Laras, M.Th', 'nidn' => '2330066902'],
            ['nama_dosen' => 'Dr. Noor Anggraito, M.Th', 'nidn' => '2318036001'],
            ['nama_dosen' => 'Dr. Paulus Kunto Baskoro, M.Th', 'nidn' => '2311037701'],
            ['nama_dosen' => 'Dr. Philip Suciadi Chia, M.Th, Ph.D', 'nidn' => '2320048601'],
            ['nama_dosen' => 'Philipus Pada Sulistya, M.Th', 'nidn' => '2323047001'],
            ['nama_dosen' => 'Riston Batuara, M.Th', 'nidn' => '2316048702'],
            ['nama_dosen' => 'Dr. Sulastri, M.Th', 'nidn' => '2310037201'],
            ['nama_dosen' => 'Dr. Sumbut Yermianto, M.Th', 'nidn' => '2311126301'],
            ['nama_dosen' => 'Dr. Theophylus Doxa Ziraluo, M.Th', 'nidn' => '2319128202'],
            ['nama_dosen' => 'Dr. Tri Endah Astuti, M.Th', 'nidn' => '2326076701'],
            ['nama_dosen' => 'Dr. Tulus Raharjo, M.Th', 'nidn' => '2323046601'],
        ]);


    }
}
