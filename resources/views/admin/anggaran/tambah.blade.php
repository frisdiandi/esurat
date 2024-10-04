@extends('admin.layouts.app', [
'activePage' => 'anggaran',
])

@section('content')

<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Data anggaran</h4>
         <div class="d-flex align-items-center">
         </div>
      </div>
      <div class="col-7 align-self-center">
         <div class="d-flex no-block justify-content-end align-items-center">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Data Master</li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/anggaran">Data anggaran</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/anggaran/add">Tambah Data anggaran</a></li>
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
                  <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Tambah Data anggaran</h4>
                  <div>
                     <a href="/admin/anggaran" class="btn btn-primary btn-sm">
                     <i class="fa fa-arrow-left"></i> Back
                     </a>
                  </div>
               </div>
               <hr>
               @if (session('error'))
               <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span>{{ session('error')}}</span>
               </div>
               @endif
               @if (session('success'))
               <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span>{{ session('success')}}</span>
               </div>
               @endif
               <form action="/admin/anggaran/create" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="mb-3">
                      <label for="no_surat" class="form-label">No Surat</label>
                      <input type="text" class="form-control" id="no_surat" name="no_surat" required>
                  </div>
                  <div class="mb-3">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                  </div>
                  <div class="mb-3">
                      <label for="perihal" class="form-label">Perihal</label>
                      <input type="text" class="form-control" id="perihal" name="perihal" required>
                  </div>
                  <div class="mb-3">
                      <label for="lampiran" class="form-label">Lampiran</label>
                      <input type="file" class="form-control" id="lampiran" name="lampiran" required>
                  </div>
                  <div class="mb-3">
                      <label for="persoalan" class="form-label">Persoalan</label>
                      <textarea class="form-control" id="persoalan" name="persoalan" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="peranggapan" class="form-label">Peranggapan</label>
                      <textarea class="form-control" id="peranggapan" name="peranggapan" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="fakta" class="form-label">Fakta</label>
                      <textarea class="form-control" id="fakta" name="fakta" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="analisis" class="form-label">Analisis</label>
                      <textarea class="form-control" id="analisis" name="analisis" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="kesimpulan" class="form-label">Kesimpulan</label>
                      <textarea class="form-control" id="kesimpulan" name="kesimpulan" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="saran" class="form-label">Saran</label>
                      <textarea class="form-control" id="saran" name="saran" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="sifat" class="form-label">Sifat</label>
                      <input type="text" class="form-control" id="sifat" name="sifat">
                  </div>
                  <div class="mb-3">
                      <label for="catatan" class="form-label">Catatan</label>
                      <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                  </div>
                  
                  <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="alarm" class="form-label">Alarm</label>
                      <input type="date" class="form-control" id="alarm" name="alarm">
                  </div>

                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
