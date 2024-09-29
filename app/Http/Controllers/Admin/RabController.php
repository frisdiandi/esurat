<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function read(){
        $rab = DB::table('rab')->orderBy('id','DESC')->get();
        return view('admin.rab.index',['rab'=>$rab]);
    }
  // Menampilkan form tambah ruangan
  public function add(){
    return view('admin.rab.tambah');
}

//menambahkan data
public function create(Request $request) {
    // Insert data ke tabel 'bidang' dengan id_pegawai dari user yang sedang login
    DB::table('rab')->insert([  
        'nama' => $request->nama,
        'id_pegawai' => Auth::user()->id,  // Menggunakan ID pengguna yang sedang login
    ]);

    return redirect('/admin/bidang')->with("success", "Data Berhasil Ditambah!");
}

}