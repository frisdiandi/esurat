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
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Tanggal</th>
                                    <th style="text-align: center;">Perihal</th>
                                    <th style="text-align: center;">Isi Surat</th>
                                    <th style="text-align: center;">ID User</th>
                                    <th style="text-align: center;">Lampiran</th>
                                    <th style="text-align: center;">Keterangan</th>
                                    <th style="text-align: center;">Aksi</th>
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
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                    <td>
                                        <a href="/admin/permintaan/edit/{{ $item->id }}">
                                            <i class="fas fa-edit" style="font-size: 15px; color: orange; margin: 0 5px;" title="Edit"></i>
                                        </a>
                                        <form action="/admin/permintaan/delete/{{ $item->id }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; padding: 0;">
                                                <i class="fas fa-trash-alt" style="font-size: 15px; color: red; margin: 0 5px;" title="Hapus"></i>
                                            </button>
                                        </form>
                                        <a href="/admin/permintaan/cetak/{{ $item->id }}">
                                            <i class="fas fa-print" style="font-size: 15px; color: blue; margin: 0 5px;" title="Cetak"></i>
                                        </a>
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
