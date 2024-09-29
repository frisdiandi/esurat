<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan data ruangan
    public function read(){
        $ruangan = DB::table('ruangan')->orderBy('id', 'DESC')->get();
        $bidang = DB::table('bidang')->orderBy('id', 'DESC')->get();
        $pegawai = DB::table('pegawai')->orderBy('id', 'DESC')->get();
        return view('admin.ruangan.index', ['ruangan' => $ruangan, 'bidang' => $bidang, 'pegawai' => $pegawai]);
    }

    // Menampilkan form tambah ruangan
    public function add(){
        $bidang = DB::table('bidang')->orderBy('id', 'DESC')->get(); // Fetch bidang data
        $pegawai = DB::table('pegawai')->orderBy('id', 'DESC')->get(); // Fetch pegawai data
        return view('admin.ruangan.tambah', ['bidang' => $bidang, 'pegawai' => $pegawai]);
    }

    // Menambahkan data ke tabel 'ruangan'
    public function create(Request $request) {
        // Validasi input form
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_bidang' => 'required|exists:bidang,id',
            'id_pegawai' => 'required|exists:pegawai,id',
        ]);

        // Insert data ke tabel 'ruangan'
        DB::table('ruangan')->insert([
            'nama' => $request->nama,
            'id_bidang' => $request->id_bidang,
            'id_pegawai' => $request->id_pegawai,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Redirect ke halaman ruangan dengan pesan sukses
        return redirect('/admin/ruangan')->with('success', 'Data Berhasil Ditambah!');
    }

    // Menampilkan form edit ruangan
public function edit($id) {
    $ruangan = DB::table('ruangan')->where('id', $id)->first();
    $bidang = DB::table('bidang')->orderBy('id', 'DESC')->get();
    $pegawai = DB::table('pegawai')->orderBy('id', 'DESC')->get();
    return view('admin.ruangan.edit', ['ruangan' => $ruangan, 'bidang' => $bidang, 'pegawai' => $pegawai]);
}

// Mengupdate data ruangan
public function update(Request $request, $id) {
    // Validasi input form
    $request->validate([
        'nama' => 'required|string|max:255',
        'id_bidang' => 'required|exists:bidang,id',
        'id_pegawai' => 'required|exists:pegawai,id',
    ]);

    // Update data ke tabel 'ruangan'
    DB::table('ruangan')->where('id', $id)->update([
        'nama' => $request->nama,
        'id_bidang' => $request->id_bidang,
        'id_pegawai' => $request->id_pegawai,
        'updated_at' => now(),
    ]);

    // Redirect ke halaman ruangan dengan pesan sukses
    return redirect('/admin/ruangan')->with('success', 'Data Berhasil Diperbarui!');
    }
}