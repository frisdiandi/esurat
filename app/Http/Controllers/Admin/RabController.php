<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Auth;
use PDF;

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


}