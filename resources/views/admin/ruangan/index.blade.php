@extends('admin.layouts.app', [
    'activePage' => 'ruangan',
])
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Data Ruangan</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Ruangan</li>
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
                        <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Daftar Data Ruangan</h4>
                        <div>
                            <a href="/admin/ruangan/add" class="btn btn-primary btn-sm">
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
                                    <th>Nama Ruangan</th>
                                    <th>Nama Bidang</th>
                                    <th>Nama Pegawai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ruangan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @php
                                        $bidang = DB::table('bidang')->where('id', $item->id_bidang)->first();
                                        @endphp
                                        {{ $bidang ? $bidang->nama : 'Tidak ada' }}
                                    </td>
                                    <td>
                                        @php
                                        $pegawai = DB::table('pegawai')->where('id', $item->id_pegawai)->first();
                                        @endphp
                                        {{ $pegawai ? $pegawai->nama : 'Tidak ada' }}
                                    </td>
                                    <td>
                                        <a href="/admin/ruangan/edit/{{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/admin/ruangan/delete/{{ $item->id }}" method="POST" style="display:inline;">
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
