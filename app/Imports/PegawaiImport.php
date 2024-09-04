<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!empty($row['nip']) && !empty($row['nama']) && !empty($row['id_jabatan'])) {
            $pegawai = DB::table('pegawai')->where('nip', $row['nip'])->first();
            if ($pegawai == '') {
                DB::table('users')->insert([
                    'name' => $row['nama'],
                    'username' => preg_replace('/\s+/', '', $row['nip']),
                    'password' => bcrypt('Admin2024'),
                    'level' => '2'
                ]);

                $users= DB::table('users')->orderBy('id','DESC')->first();

                DB::table('pegawai')->insert([  
                    'nip' => preg_replace('/\s+/', '', $row['nip']),
                    'nama' => $row['nama'],
                    'id_jabatan' => $row['id_jabatan'],
                    'id_user' => $users->id]);       
            }
        }
    }
}
