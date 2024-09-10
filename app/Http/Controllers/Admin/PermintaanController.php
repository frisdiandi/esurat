<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PermintaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function read(){
        $permintaan = DB::table('permintaan')->orderBy('id','DESC')->get();
        return view('admin.permintaan.index',['permintaan'=>$permintaan]);
    }
  // Menampilkan form tambah ruangan
  public function add(){
    return view('admin.permintaan.tambah');
}


}