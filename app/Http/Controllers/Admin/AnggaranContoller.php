<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnggaranContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan data anggaran
    public function read()
    {
        $anggaran = DB::table('anggarann')->orderBy('id', 'DESC')->get();
        return view('admin.anggaran.index', ['anggaran' => $anggaran]);
    }

    // Menampilkan form tambah anggaran
    public function add()
    {
        return view('admin.anggaran.tambah');
    }

    // Menyimpan data anggaran ke database
    public function create(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'persoalan' => 'nullable|string',
            'peranggapan' => 'nullable|string',
            'fakta' => 'nullable|string',
            'analisis' => 'nullable|string',
            'kesimpulan' => 'nullable|string',
            'saran' => 'nullable|string',
            'sifat' => 'nullable|string',
            'catatan' => 'nullable|string',
            'status' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'alarm' => 'nullable|date',
            'lampiran' => 'required|file',
        ]);

         // Set default status if not provided
    $status = $request->status ?? 'Menunggu Persetujuan';


        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        }

        DB::table('anggarann')->insert([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'persoalan' => $request->persoalan,
            'peranggapan' => $request->peranggapan,
            'fakta' => $request->fakta,
            'analisis' => $request->analisis,
            'kesimpulan' => $request->kesimpulan,
            'saran' => $request->saran,
            'id_user' => Auth::id(),
            'sifat' => $request->sifat,
            'catatan' => $request->catatan,
            'status' => $status,
            'keterangan' => $request->keterangan,
            'alarm' => $request->alarm,
            'lampiran' => $lampiranPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/admin/anggaran')->with('success', 'Data Berhasil Ditambah!');
    }

    // Menampilkan form edit anggaran
    public function edit($id)
    {
        $anggaran = DB::table('anggarann')->where('id', $id)->first();
        if (!$anggaran) {
            abort(404);
        }
        return view('admin.anggaran.edit', compact('anggaran'));
    }

    // Mengupdate data anggaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            // Validasi tambahan untuk kolom lainnya jika perlu
        ]);

        // Set default status if not provided
    $status = $request->status ?? 'Menunggu Persetujuan';

        $anggaran = DB::table('anggarann')->where('id', $id)->first();
        if (!$anggaran) {
            abort(404);
        }

        DB::table('anggarann')->where('id', $id)->update([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'persoalan' => $request->persoalan,
            'peranggapan' => $request->peranggapan,
            'fakta' => $request->fakta,
            'analisis' => $request->analisis,
            'kesimpulan' => $request->kesimpulan,
            'saran' => $request->saran,
            'sifat' => $request->sifat,
            'catatan' => $request->catatan,
            'status' => $status,
            'keterangan' => $request->keterangan,
            'alarm' => $request->alarm,
            'updated_at' => now(),
        ]);

        return redirect('/admin/anggaran')->with('success', 'Data Berhasil Ditambah!');
    }

    // Menghapus data anggaran
    public function destroy($id)
    {
        $anggaran = DB::table('anggarann')->where('id', $id)->first();
        if (!$anggaran) {
            abort(404);
        }

        DB::table('anggarann')->where('id', $id)->delete();
        return redirect()->route('anggaran.index')->with('success', 'Data anggaran berhasil dihapus.');
    }

    // Mengupdate status anggaran
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $anggaran = DB::table('anggarann')->where('id', $id)->first();
        if (!$anggaran) {
            abort(404);
        }

        DB::table('anggarann')->where('id', $id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Status anggaran berhasil diperbarui.');
    }
}
