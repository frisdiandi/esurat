@extends('admin.layouts.app', [
    'activePage' => 'rab',
])
@section('content')
<div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Tambah Data Rab</h4>
                <div>
                    <a href="/admin/rab" class="btn btn-primary btn-sm">
                     <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
        </div>
    <form action="/admin/rab/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_uraian">Nama Uraian</label>
            <input type="text" name="nama_uraian" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kode_induk">Kode Induk</label>
            <input type="text" name="kode_induk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kode_uraian">Kode Uraian</label>
            <input type="text" name="kode_uraian" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
