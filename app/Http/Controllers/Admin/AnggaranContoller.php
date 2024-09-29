<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AnggaranContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Menampilkan data anggaran
    public function read(){
        $anggaran = DB::table('anggaran')->orderBy('id','DESC')->get();
        return view('admin.anggaran.index',['anggaran' => $anggaran]);
    }

    // Menampilkan form tambah anggaran
    public function add(){
        return view('admin.anggaran.tambah');
    }

    public function create(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'no_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string',
            'persoalan' => 'required|string',
            'peranggapan' => 'nullable|string',
            'fakta' => 'nullable|string',
            'analisis' => 'nullable|string',
            'kesimpulan' => 'nullable|string',
            'saran' => 'nullable|string',
            'sifat' => 'nullable|string',
            'catatan' => 'nullable|string',
            'status' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'alarm' => 'nullable|date',
        ]);

        // Menyimpan data ke tabel 'anggaran' menggunakan query builder
        DB::table('anggaran')->insert([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'persoalan' => $request->persoalan,
            'peranggapan' => $request->peranggapan,
            'fakta' => $request->fakta,
            'analisis' => $request->analisis,
            'kesimpulan' => $request->kesimpulan,
            'saran' => $request->saran,
            'id_user' => Auth::id(), // Mendapatkan ID user yang sedang login
            'sifat' => $request->sifat,
            'catatan' => $request->catatan,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'alarm' => $request->alarm,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect kembali ke halaman daftar anggaran dengan pesan sukses
        return redirect('/admin/anggaran')->with('success', 'Data anggaran berhasil ditambahkan!');
    }
}
