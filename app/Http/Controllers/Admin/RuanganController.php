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

class ruanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Membaca data ruangan
    public function read(){
        $ruangan = DB::table('ruangan')->orderBy('id', 'DESC')->get();
        return view('admin.ruangan.index', ['ruangan' => $ruangan]);
    }

    // Menampilkan form tambah ruangan
    public function add(){
        return view('admin.ruangan.tambah');
    }

    // Menambah data ruangan baru
    public function create(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255', // Add validation
        ]);

        DB::table('ruangan')->insert([  
            'nama' => $request->nama
        ]);

        return redirect('/admin/ruangan')->with("success", "Data Berhasil Ditambah!");
    }

    // Mengedit data ruangan
    public function edit($id){
        $ruangan = DB::table('ruangan')->where('id', $id)->first();
        return view('admin.ruangan.edit', ['ruangan' => $ruangan]);
    }

    // Menampilkan detail ruangan
    public function detail($id){
        $ruangan = DB::table('ruangan')->where('id', $id)->first();
        return view('admin.ruangan.detail', ['ruangan' => $ruangan]);
    }

    // Mengupdate data ruangan
    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        DB::table('ruangan')  
            ->where('id', $id)
            ->update([
                'nama' => $request->nama
            ]);

        return redirect('/admin/ruangan')->with("success", "Data Berhasil Diupdate!");
    }

    // Menghapus data ruangan
    public function delete($id)
    {
        $ruangan = DB::table('ruangan')->where('id', $id)->first();
        DB::table('ruangan')->where('id', $id)->delete();

        return redirect('/admin/ruangan')->with("success", "Data Berhasil Dihapus!");
    }

    // Mengimport data ruangan dari file Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new ruanganImport, $request->file('file'));

        return redirect('/admin/ruangan')->with('success', 'Data Berhasil Diimport!');
    }

    // Mengekspor data ruangan ke file Excel
    public function export()
    {   
        return Excel::download(new ruanganExport, 'List Data ruangan.xlsx');
    }

    // Mencetak data ruangan ke PDF
    public function cetak()
    {
        $ruangan = DB::table('ruangan')->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadview('admin.ruangan.cetak', ['ruangan' => $ruangan]);

        return $pdf->stream('List Data ruangan.pdf');
    }
}
