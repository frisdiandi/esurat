<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RuanganImport;
use App\Exports\RuanganExport;
use Auth;
use PDF;

class RuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Membaca data ruangan
    public function read(){
        $ruangan = DB::table('ruangan')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.ruangan.index', ['ruangan' => $ruangan]);
    }

    // Menampilkan form tambah ruangan
    public function add(){
        return view('admin.ruangan.tambah');
    }

    // Menambahkan data ruangan baru
    public function create(Request $request) {
        // Validasi data
        $request->validate([
            'nama' => 'required|string',
            'id_bidang' => 'required|integer',
        ]);
        
        // Insert data ke tabel 'ruangan' dengan id_pegawai dari user yang sedang login
        DB::table('ruangan')->insert([  
            'nama' => $request->nama,
            'id_bidang' => $request->id_bidang,
            'id_pegawai' => Auth::user()->id,  // Menggunakan ID pengguna yang sedang login
        ]);
    
        return redirect('/admin/ruangan')->with("success", "Data Berhasil Ditambah!");
    }

    // Menampilkan form edit ruangan
    public function edit($id){
        $ruangan = DB::table('ruangan')->where('id', $id)->first();
        return view('admin.ruangan.edit', ['ruangan' => $ruangan]);
    }

    // Mengupdate data ruangan
    public function update(Request $request, $id) {
        // Validasi data
        $request->validate([
            'nama' => 'required|string',
            'id_bidang' => 'required|integer',
        ]);
        
        DB::table('ruangan')  
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'id_bidang' => $request->id_bidang
            ]);

        return redirect('/admin/ruangan')->with("success", "Data Berhasil Diupdate !");
    }

    // Menghapus data ruangan
    public function delete($id)
    {
        $ruangan = DB::table('ruangan')->where('id', $id)->first();
        DB::table('ruangan')->where('id', $id)->delete();

        return redirect('/admin/ruangan')->with("success", "Data Berhasil Dihapus !");
    }
}
