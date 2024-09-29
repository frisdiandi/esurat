@extends('admin.layouts.app', ['
    activePage' => 'anggaran'
])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Anggaran</h4>
        <a href="/admin/anggaran/add" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Tambah Anggaran
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->perihal }}</td>
                    <td>
                        <a href="/admin/anggaran/edit/{{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/admin/anggaran/delete/{{ $item->id }}" method="POST" style="display:inline;">
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
@endsection
