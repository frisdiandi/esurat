@extends('admin.layouts.app', ['activePage' => 'permintaan'])

@section('content')
<div class="container">
    <h2>Tambah Permintaan</h2>
    <form action="{{ route('permintaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tanggal Permintaan</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Perihal</label>
            <input type="text" name="perihal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Isi Surat</label>
            <textarea name="isi_surat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Lampiran (opsional)</label>
            <input type="file" name="lampiran" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
@endsection
