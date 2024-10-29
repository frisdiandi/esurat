@extends('admin.layouts.app', [
    'activePage' => 'permintaan',
])
@section('content')
<div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Tambah Data Permintaan</h4>
                <div>
                    <a href="/admin/permintaan" class="btn btn-primary btn-sm">
                     <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
        </div>
    <form action="/admin/permintaan/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_uraian">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan Tanggal">
        </div>
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" name="perihal" class="form-control" id="perihal" placeholder="Masukkan Perihal">
        </div>
        <div class="form-group">
            <label for="isi_surat">Isi Surat</label>
            <textarea name="isi_surat" class="form-control" id="isi_surat" placeholder="Masukkan Isi Surat"></textarea>
        </div>
        <div class="form-group">
            <label for="lampiran">Lampiran</label>
            <input type="file" name="lampiran" class="form-control" id="lampiran" placeholder="Masukkan Lampiran">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Keterangan"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
