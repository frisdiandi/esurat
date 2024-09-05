<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use PDF;


class BidangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $bidang = DB::table('bidang')->orderBy('id','DESC')->get();
        return view('admin.bidang.index',['bidang'=>$bidang]);
    }

    public function add(){
        return view('admin.bidang.tambah');
    }

    //menambahkan data
    public function create(Request $request) {
        // Insert data ke tabel 'bidang' dengan id_pegawai dari user yang sedang login
        DB::table('bidang')->insert([  
            'nama' => $request->nama,
            'id_pegawai' => Auth::user()->id,  // Menggunakan ID pengguna yang sedang login
        ]);
    
        return redirect('/admin/bidang')->with("success", "Data Berhasil Ditambah!");
    }

    //mengedit data
    public function edit($id){
        $bidang= DB::table('bidang')->where('id',$id)->first();
        return view('admin.bidang.edit',['bidang'=>$bidang]);
    }

    //update data
    public function update(Request $request, $id) {
        DB::table('bidang')  
            ->where('id', $id)
            ->update([
            'nama' => $request->nama]);

        return redirect('/admin/bidang')->with("success","Data Berhasil Diupdate !");
    }

    //delate data
    public function delete($id)
    {
        $bidang= DB::table('bidang')->where('id',$id)->first();
        DB::table('bidang')->where('id',$id)->delete();
        //DB::table('pegawai')->where('id_bidang',$id)->delete();

        return redirect('/admin/bidang')->with("success","Data Berhasil Dihapus !");
    }

}
