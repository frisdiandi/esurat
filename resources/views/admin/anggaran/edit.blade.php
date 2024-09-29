@extends('admin.layouts.app', ['activePage' => 'anggaran'])

@section('content')
<div class="container">
    <h4>Edit Anggaran</h4>

    <form action="/admin/anggaran/update/{{ $anggaran->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="no_surat">No Surat</label>
            <input type="text" name="no_surat" class="form-control" value="{{ $anggaran->no_surat }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $anggaran->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" name="perihal" class="form-control" value="{{ $anggaran->perihal }}" required>
        </div>
        <!-- Tambahkan field lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
