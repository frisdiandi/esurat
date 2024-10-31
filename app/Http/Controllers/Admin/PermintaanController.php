<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use PDF;

class PermintaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Menampilkan data permintaan
    public function read()
    {
        $permintaan = DB::table('permintaan')->orderBy('id', 'DESC')->get();
        return view('admin.permintaan.index', ['permintaan' => $permintaan]);
    }

    // Menampilkan form tambah permintaan
    public function add()
    {
        return view('admin.permintaan.tambah');
    }
    
    // Menyimpan data permintaan ke database
    public function create(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'Persoalan' => 'required|string',
            'Perangapan' => 'required|string',
            'Fakta' => 'required|string',
            'Analisis' => 'required|string',
            'Kesimpulan' => 'required|string',
            'Saran' => 'required|string',
            'keterangan' => 'nullable|string',
            // 'lampiran' => 'nullable|file',
        ]);

<<<<<<< HEAD
        // // Menyimpan lampiran jika ada
        // $lampiranPath = null;
        // if ($request->hasFile('lampiran')) {
        //     $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        // }

        // Menyimpan data ke database
        DB::table('permintaan')->insert([
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'Persoalan' => $request->Persoalan,
            'Perangapan' => $request->Perangapan,
            'Fakta' => $request->Fakta,
            'Analisis' => $request->Analisis,
            'Kesimpulan' => $request->Kesimpulan,
            'Saran' => $request->Saran,
            // 'lampiran' => $lampiranPath,
            'keterangan' => $request->keterangan,
            'id_user' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil ditambahkan');
    }

    // Menampilkan form edit permintaan
    public function edit($id)
    {
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
=======
        // Simpan lampiran jika ada
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        }

        // Simpan data ke database menggunakan query builder
        DB::table('permintaan')->insert([
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'isi_surat' => $request->isi_surat,
            'lampiran' => $lampiranPath, // Kolom lampiran
            'keterangan' => $request->keterangan,
            'id_user' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect('/admin/permintaan')->with('success', 'Data permintaan berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id)
    {
        // Ambil data berdasarkan ID
        $permintaan = DB::table('permintaan')->where('id', $id)->first();

        // Cek jika data ada, jika tidak kembalikan 404
>>>>>>> 22eb47e17e05ff7b632cc7bed80c0cd90f15a72c
        if (!$permintaan) {
            abort(404);
        }

        return view('admin.permintaan.edit', compact('permintaan'));
    }

    // Memperbarui data permintaan
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'Persoalan' => 'required|string',
            'Perangapan' => 'required|string',
            'Fakta' => 'required|string',
            'Analisis' => 'required|string',
            'Kesimpulan' => 'required|string',
            'Saran' => 'required|string',
            'keterangan' => 'nullable|string',
            // 'lampiran' => 'nullable|file',
        ]);

<<<<<<< HEAD
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
=======

        // Ambil data yang akan diupdate
        $permintaan = DB::table('permintaan')->where('id', $id)->first();

        // Cek jika data ada, jika tidak kembalikan 404
>>>>>>> 22eb47e17e05ff7b632cc7bed80c0cd90f15a72c
        if (!$permintaan) {
            abort(404);
        }

<<<<<<< HEAD
        // $lampiranPath = $permintaan->lampiran;
        // if ($request->hasFile('lampiran')) {
        //     if ($lampiranPath) {
        //         Storage::delete('public/' . $lampiranPath);
        //     }
        //     $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        // }
=======
        // Simpan lampiran baru jika ada
        $lampiranPath = $permintaan->lampiran; // Jika tidak ada lampiran baru, gunakan yang lama
        if ($request->hasFile('lampiran')) {
            // Hapus file lampiran lama jika ada file baru
            if ($lampiranPath) {
                Storage::delete('public/' . $lampiranPath);
            }
            // Simpan lampiran baru
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        }

        // Update data di database
        DB::table('permintaan')
            ->where('id', $id)
            ->update([
                'tanggal' => $request->tanggal,
                'perihal' => $request->perihal,
                'isi_surat' => $request->isi_surat,
                'lampiran' => $lampiranPath,
                'keterangan' => $request->keterangan,
                'updated_at' => now(),
            ]);
>>>>>>> 22eb47e17e05ff7b632cc7bed80c0cd90f15a72c

        DB::table('permintaan')
            ->where('id', $id)
            ->update([
                'tanggal' => $request->tanggal,
                'perihal' => $request->perihal,
                'Persoalan' => $request->Persoalan,
                'Perangapan' => $request->Perangapan,
                'Fakta' => $request->Fakta,
                'Analisis' => $request->Analisis,
                'Kesimpulan' => $request->Kesimpulan,
                'Saran' => $request->Saran,
                // 'lampiran' => $request->lampiran,
                'keterangan' => $request->keterangan,
                'updated_at' => now(),
            ]);

        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil diperbarui');
    }


<<<<<<< HEAD
    // Menghapus data permintaan
    public function destroy($id)
    {
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
        if (!$permintaan) {
            abort(404);
        }
=======
    // Method untuk menghapus data permintaan
    public function destroy($id)
    {
        // Ambil data yang akan dihapus
        $permintaan = DB::table('permintaan')->where('id', $id)->first();

        // Cek jika data ada, jika tidak kembalikan 404
        if (!$permintaan) {
            abort(404);
        }

        // Hapus file lampiran jika ada
        if ($permintaan->lampiran) {
            Storage::delete('public/' . $permintaan->lampiran);
        }

        // Hapus data dari database
        DB::table('permintaan')->where('id', $id)->delete();
>>>>>>> 22eb47e17e05ff7b632cc7bed80c0cd90f15a72c

        if ($permintaan->lampiran) {
            Storage::delete('public/' . $permintaan->lampiran);
        }

        DB::table('permintaan')->where('id', $id)->delete();

        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil dihapus');
    }

    // Menu cetak
    public function cetak($id)
    {
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
        $pdf = PDF::loadview('admin.permintaan.cetak', ['permintaan' => $permintaan]);
        return $pdf->stream('Data Permintaan.pdf');
    }

}