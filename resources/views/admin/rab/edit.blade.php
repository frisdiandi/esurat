@extends('admin.layouts.app', [
    'activePage' => 'rab',
])
@section('content')
<div class="container">
    <h2>Edit Data RAB</h2>
    <form action="/admin/rab/update/{{ $rab->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_uraian">Nama Uraian</label>
            <input type="text" name="nama_uraian" class="form-control" value="{{ $rab->nama_uraian }}" required>
        </div>
        <div class="form-group">
            <label for="kode_induk">Kode Induk</label>
            <input type="text" name="kode_induk" class="form-control" value="{{ $rab->kode_induk }}" required>
        </div>
        <div class="form-group">
            <label for="kode_uraian">Kode Uraian</label>
            <input type="text" name="kode_uraian" class="form-control" value="{{ $rab->kode_uraian }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
