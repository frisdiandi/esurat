@extends('admin.layouts.app', [
    'activePage' => 'permintaan',
])

@section('content')
<<<<<<< HEAD
=======
<div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Tambah Data Permintaan</h4>
                <div>
                    <a href="/admin/permintaan" class="btn btn-primary btn-sm">
                     <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
        </div>
    <form action="/admin/permintaan/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_uraian">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan Tanggal">
        </div>
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" name="perihal" class="form-control" id="perihal" placeholder="Masukkan Perihal">
        </div>
        <div class="form-group">
            <label for="isi_surat">Isi Surat</label>
            <textarea name="isi_surat" class="form-control" id="isi_surat" placeholder="Masukkan Isi Surat"></textarea>
        </div>
        <div class="form-group">
            <label for="lampiran">Lampiran</label>
            <input type="file" name="lampiran" class="form-control" id="lampiran" placeholder="Masukkan Lampiran">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Keterangan"></textarea>
        </div>
>>>>>>> 22eb47e17e05ff7b632cc7bed80c0cd90f15a72c

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tambah Data Permintaan</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/permintaan">Data Permintaan</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/admin/permintaan/create">Tambah Data Permintaan</a></li>
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
                        <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Tambah Data Permintaan</h4>
                        <div>
                            <a href="/admin/permintaan" class="btn btn-primary btn-sm">
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

                    <form action="/admin/permintaan/create" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            <div class="invalid-feedback">
                                Tanggal harus diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" required>
                        </div>

                        <div class="mb-3">
                            <label for="persoalan" class="form-label">Persoalan</label>
                            <textarea class="form-control" id="persoalan" name="persoalan" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="peranggapan" class="form-label">Peranggapan</label>
                            <textarea class="form-control" id="peranggapan" name="peranggapan" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="fakta" class="form-label">Fakta</label>
                            <textarea class="form-control" id="fakta" name="fakta" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="analisis" class="form-label">Analisis</label>
                            <textarea class="form-control" id="analisis" name="analisis" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kesimpulan" class="form-label">Kesimpulan</label>
                            <textarea class="form-control" id="kesimpulan" name="kesimpulan" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="saran" class="form-label">Saran</label>
                            <textarea class="form-control" id="saran" name="saran" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="id_user" class="form-label">ID User</label>
                            <input type="text" class="form-control" id="id_user" name="id_user" required>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
