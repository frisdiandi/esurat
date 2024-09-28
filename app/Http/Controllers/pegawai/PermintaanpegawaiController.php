<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermintaanpegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Menampilkan form tambah permintaan
    public function create()
    {
        return view('admin.permintaan.tambah');
    }

    // Menyimpan data permintaan
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle upload file lampiran
        $filename = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        }

        // Simpan data ke database
        DB::table('permintaan')->insert([
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'isi_surat' => $request->isi_surat,
            'lampiran' => $filename,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil ditambahkan.');
    }
}
