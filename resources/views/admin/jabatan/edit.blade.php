@extends('admin.layouts.app', [
    'activePage' => 'jabatan',
])

@section('content')
<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Edit Jabatan</h4>
         <div class="d-flex align-items-center">
         </div>
      </div>
      <div class="col-7 align-self-center">
         <div class="d-flex no-block justify-content-end align-items-center">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     Data Master
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/jabatan">List Data Jabatan</a></li>
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
               <h4 class="card-title">Form Edit Jabatan</h4>
               <hr>
               <!-- Display Error or Success Messages -->
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

               <!-- Form Edit Jabatan -->
               <form method="POST" action="/admin/jabatan/update/{{ $jabatan->id }}">
                  @csrf
                  <div class="form-group">
                     <label for="nama_jabatan">Nama Jabatan</label>
                     <input type="text" name="nama" id="nama_jabatan" class="form-control" value="{{ $jabatan->nama }}" required>
                  </div>
                  
                  <div class="d-flex justify-content-end">
                     <a href="/admin/jabatan" class="btn btn-secondary mr-2">Batal</a>
                     <button type="submit" class="btn btn-primary">Update Data</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
