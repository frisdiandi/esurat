@extends('admin.layouts.app', ['activePage' => 'anggaran'])

@section('content')
<div class="container">
    <h4>Tambah Anggaran</h4>

    <form action="/admin/anggaran/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_surat">No Surat</label>
            <input type="text" name="no_surat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" name="perihal" class="form-control" required>
        </div>
        <!-- Tambahkan field lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
