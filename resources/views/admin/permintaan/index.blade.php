@extends('admin.layouts.app', [
    'activePage' => 'permintaan',
])
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Data Permintaan</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Permintaan</li>
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
                        <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Daftar Data Permintaan</h4>
                        <div>
                            <a href="/admin/permintaan/add" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Tambah Data
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th> <!-- Ubah kolom sesuai urutan yang benar -->
                                    <th>Tanggal</th>
                                    <th>Perihal</th>
                                    <th>Isi Surat</th>
                                    <th>ID User</th>
                                    <th>Lampiran</th>
                                    <th>Keterangan</th> <!-- Kolom keterangan sudah ada di database -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($permintaan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->perihal }}</td>
                                    <td>{{ $item->isi_surat }}</td>
                                    <td>{{ $item->id_user }}</td>
                                    <td><a href="{{ asset('storage/' . $item->lampiran) }}" target="_blank">Lihat Lampiran</a></td>
                                    <td>{{ $item->keterangan ?? '-' }}</td> <!-- Tampilkan '-' jika keterangan kosong -->
                                    <td>
                                        <a href="/admin/permintaan/edit/{{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/admin/permintaan/delete/{{ $item->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
