<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class RabContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Menampilkan data RAB
    public function read(){
        $rab = DB::table('rab')->orderBy('id','DESC')->get();
        return view('admin.rab.index',['rab' => $rab]);
    }

    // Menampilkan form tambah RAB
    public function add(){
        return view('admin.rab.tambah');
    }

    // Menambahkan data
    public function create(Request $request) 
    {
        // Validasi input dari form
        $request->validate([
            'nama_uraian' => 'required|string|max:255',
            'kode_induk' => 'required|string|max:255',
            'kode_uraian' => 'required|string|max:255',
        ]);

        // Menyimpan data ke tabel 'rab'
        DB::table('rab')->insert([
            'nama_uraian' => $request->nama_uraian,
            'kode_induk' => $request->kode_induk,
            'kode_uraian' => $request->kode_uraian,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect kembali ke halaman daftar RAB dengan pesan sukses
        return redirect('/admin/rab')->with('success', 'Data RAB berhasil ditambahkan!');
    }

    // Mengedit data RAB
    public function edit($id){
        $rab = DB::table('rab')->where('id', $id)->first();

        if (!$rab) {
            return redirect('/admin/rab')->with('error', 'Data RAB tidak ditemukan!');
        }

        return view('admin.rab.edit', ['rab' => $rab]);
    }

    // Memperbarui data RAB
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_uraian' => 'required|string|max:255',
            'kode_induk' => 'required|string|max:255',
            'kode_uraian' => 'required|string|max:255',
        ]);

        // Update data RAB berdasarkan id
        DB::table('rab')
            ->where('id', $id)
            ->update([
                'nama_uraian' => $request->nama_uraian,
                'kode_induk' => $request->kode_induk,
                'kode_uraian' => $request->kode_uraian,
                'updated_at' => now(),
            ]);

        // Redirect kembali ke halaman daftar RAB dengan pesan sukses
        return redirect('/admin/rab')->with('success', 'Data RAB berhasil diupdate!');
    }

    // Menghapus data RAB
    public function delete($id)
    {
        // Hapus data RAB berdasarkan id
        DB::table('rab')->where('id', $id)->delete();

        // Redirect kembali ke halaman daftar RAB dengan pesan sukses
        return redirect('/admin/rab')->with('success', 'Data RAB berhasil dihapus!');
    }
}
