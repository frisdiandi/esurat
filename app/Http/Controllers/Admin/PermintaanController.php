<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PermintaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // Menampilkan data permintaan
    public function read(){
        $permintaan = DB::table('permintaan')->orderBy('id','DESC')->get();
        return view('admin.permintaan.index',['permintaan' => $permintaan]);
    }

    // Menampilkan form tambah permintaan
    public function add(){
        return view('admin.permintaan.tambah');
    }
    
    // Method untuk menyimpan data permintaan ke database
    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
            'lampiran' => 'required|file',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data ke database
        $permintaan = new Permintaan();
        $permintaan->tanggal = $request->tanggal;
        $permintaan->perihal = $request->perihal;
        $permintaan->isi_surat = $request->isi_surat;
        $permintaan->id_user = auth()->user()->id; // Menyimpan ID user yang membuat permintaan

        // Jika ada lampiran, simpan file ke folder dan simpan path-nya
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
            $permintaan->lampiran = $lampiranPath;
        }

        $permintaan->keterangan = $request->keterangan;
        $permintaan->save();

        // Redirect dengan pesan sukses
        return redirect('/admin/permintaan')->with('success', 'Data permintaan berhasil ditambahkan');
    }

    // Method untuk mengedit data permintaan
    public function edit($id)
    {
        $permintaan = Permintaan::findOrFail($id);

        return view('admin.permintaan.edit', compact('permintaan'));
    }

    // Method untuk mengupdate data permintaan di database
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'isi_surat' => 'required|string',
            'lampiran' => 'nullable|file',
            'keterangan' => 'nullable|string',
        ]);

        $permintaan = Permintaan::findOrFail($id);
        $permintaan->tanggal = $request->tanggal;
        $permintaan->perihal = $request->perihal;
        $permintaan->isi_surat = $request->isi_surat;

        // Jika ada lampiran baru, update file
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
            $permintaan->lampiran = $lampiranPath;
        }

        $permintaan->keterangan = $request->keterangan;
        $permintaan->save();

        // Redirect dengan pesan sukses
        return redirect('/admin/permintaan')->with('success', 'Data permintaan berhasil diupdate');
    }

    // Method untuk menghapus data permintaan
    public function destroy($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/permintaan')->with('success', 'Data permintaan berhasil dihapus');
    }
}