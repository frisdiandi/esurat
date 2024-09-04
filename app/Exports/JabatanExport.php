<?php
 
namespace App\Exports;
 
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
 
class JabatanExport implements FromView
{
    public function view(): View
    {
        $jabatan = DB::table('jabatan')->orderBy('id','DESC')->get();
        
        return view('admin.jabatan.export',['jabatan'=>$jabatan]);
    }
}