@extends('admin.layouts.app', [
    'activePage' => 'ruangan',
])
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Ruangan</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/ruangan">Data Ruangan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Ruangan</li>
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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Edit Data Ruangan</h4>
                        <div>
                            <a href="/admin/ruangan" class="btn btn-primary btn-sm">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
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
                    <form action="/admin/ruangan/update/{{ $ruangan->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT') <!-- Menambahkan method PUT -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" name="nama" value="{{ $ruangan->nama }}" class="form-control" placeholder="Masukkan Nama Ruangan" required>     
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Bidang</label>
                                    <select name="id_bidang" class="form-control select2" required>
                                        <option value="">-- pilih bidang --</option>
                                        @foreach($bidang as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $ruangan->id_bidang ? 'selected' : '' }}>
                                            {{ $data->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <select name="id_pegawai" class="form-control select2" required>
                                        <option value="">-- pilih pegawai --</option>
                                        @foreach($pegawai as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $ruangan->id_pegawai ? 'selected' : '' }}>
                                            {{ $data->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1 mr-2"><span class="fa fa-save"></span> Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
