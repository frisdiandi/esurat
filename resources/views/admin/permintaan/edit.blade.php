@extends('admin.layouts.app', [
    'activePage' => 'permintaan',
])

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Permintaan</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Permintaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Permintaan</h4>
                    <hr>
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span>{{ session('error') }}</span>
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                    
                    <form method="POST" action="{{ url('/admin/permintaan/update', $permintaan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ $permintaan->tanggal }}" required>
                        </div>

                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" name="perihal" class="form-control" value="{{ $permintaan->perihal }}" required>
                        </div>

                        <div class="form-group">
                            <label for="isi_surat">Isi Surat</label>
                            <textarea name="isi_surat" class="form-control" rows="5" required>{{ $permintaan->isi_surat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="file" name="lampiran" class="form-control">
                            <small class="text-muted">Lampiran saat ini: {{ $permintaan->lampiran }}</small>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control">{{ $permintaan->keterangan }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('/admin/permintaan') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
