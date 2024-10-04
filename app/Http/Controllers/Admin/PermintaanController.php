<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

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
    
    // Method untuk menyimpan data permintaan ke database
    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
            'lampiran' => 'required|file',
            'keterangan' => 'nullable|string',
        ]);

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
        if (!$permintaan) {
            abort(404);
        }

        return view('admin.permintaan.edit', compact('permintaan'));
    }

    // Method untuk mengupdate data permintaan di database
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
            'lampiran' => 'nullable|file',
            'keterangan' => 'nullable|string',
        ]);

        // Ambil data yang akan diupdate
        $permintaan = DB::table('permintaan')->where('id', $id)->first();

        // Cek jika data ada, jika tidak kembalikan 404
        if (!$permintaan) {
            abort(404);
        }

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

        // Redirect dengan pesan sukses
        return redirect('/admin/permintaan')->with('success', 'Data permintaan berhasil diupdate');
    }

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

        // Redirect dengan pesan sukses
        return redirect('/admin/permintaan')->with('success', 'Data permintaan berhasil dihapus');
    }
}
