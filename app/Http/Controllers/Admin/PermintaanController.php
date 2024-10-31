<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use PDF;

class PermintaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Menampilkan data permintaan
    public function read()
    {
        $permintaan = DB::table('permintaan')->orderBy('id', 'DESC')->get();
        return view('admin.permintaan.index', ['permintaan' => $permintaan]);
    }

    // Menampilkan form tambah permintaan
    public function add()
    {
        return view('admin.permintaan.tambah');
    }
    
    // Menyimpan data permintaan ke database
    public function create(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'Persoalan' => 'required|string',
            'Perangapan' => 'required|string',
            'Fakta' => 'required|string',
            'Analisis' => 'required|string',
            'Kesimpulan' => 'required|string',
            'Saran' => 'required|string',
            'keterangan' => 'nullable|string',
            // 'lampiran' => 'nullable|file',
        ]);

        // // Menyimpan lampiran jika ada
        // $lampiranPath = null;
        // if ($request->hasFile('lampiran')) {
        //     $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        // }

        // Menyimpan data ke database
        DB::table('permintaan')->insert([
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'Persoalan' => $request->Persoalan,
            'Perangapan' => $request->Perangapan,
            'Fakta' => $request->Fakta,
            'Analisis' => $request->Analisis,
            'Kesimpulan' => $request->Kesimpulan,
            'Saran' => $request->Saran,
            // 'lampiran' => $lampiranPath,
            'keterangan' => $request->keterangan,
            'id_user' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil ditambahkan');
    }

    // Menampilkan form edit permintaan
    public function edit($id)
    {
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
        if (!$permintaan) {
            abort(404);
        }

        return view('admin.permintaan.edit', compact('permintaan'));
    }

    // Memperbarui data permintaan
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'Persoalan' => 'required|string',
            'Perangapan' => 'required|string',
            'Fakta' => 'required|string',
            'Analisis' => 'required|string',
            'Kesimpulan' => 'required|string',
            'Saran' => 'required|string',
            'keterangan' => 'nullable|string',
            // 'lampiran' => 'nullable|file',
        ]);

        $permintaan = DB::table('permintaan')->where('id', $id)->first();
        if (!$permintaan) {
            abort(404);
        }

        // $lampiranPath = $permintaan->lampiran;
        // if ($request->hasFile('lampiran')) {
        //     if ($lampiranPath) {
        //         Storage::delete('public/' . $lampiranPath);
        //     }
        //     $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        // }

        DB::table('permintaan')
            ->where('id', $id)
            ->update([
                'tanggal' => $request->tanggal,
                'perihal' => $request->perihal,
                'Persoalan' => $request->Persoalan,
                'Perangapan' => $request->Perangapan,
                'Fakta' => $request->Fakta,
                'Analisis' => $request->Analisis,
                'Kesimpulan' => $request->Kesimpulan,
                'Saran' => $request->Saran,
                // 'lampiran' => $request->lampiran,
                'keterangan' => $request->keterangan,
                'updated_at' => now(),
            ]);

        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil diperbarui');
    }


    // Menghapus data permintaan
    public function destroy($id)
    {
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
        if (!$permintaan) {
            abort(404);
        }

        if ($permintaan->lampiran) {
            Storage::delete('public/' . $permintaan->lampiran);
        }

        DB::table('permintaan')->where('id', $id)->delete();

        return redirect()->route('permintaan.index')->with('success', 'Data permintaan berhasil dihapus');
    }

    // Menu cetak
    public function cetak($id)
    {
        $permintaan = DB::table('permintaan')->where('id', $id)->first();
        $pdf = PDF::loadview('admin.permintaan.cetak', ['permintaan' => $permintaan]);
        return $pdf->stream('Data Permintaan.pdf');
    }

}