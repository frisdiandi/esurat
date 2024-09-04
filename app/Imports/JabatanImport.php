<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class JabatanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!empty($row['nama'])) {
            $jabatan= DB::table('jabatan')->where('nama',$row['nama'])->first();
            if($jabatan == ""){
                DB::table('jabatan')->insert([  
                    'nama' => $row['nama']]);            
            }
        }
    }
}
