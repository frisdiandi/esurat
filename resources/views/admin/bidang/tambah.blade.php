@extends('admin.layouts.app', [
'activePage' => 'bidang',
])
@section('content')
<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Data Bidang</h4>
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
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/bidang">Data Bidang</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/bidang/add">Tambah Data Bidang</a></li>
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
                  <h4 class="card-title m-0"><i class="mdi mdi-library-plus"></i> Tambah Data Bidang</h4>
                  <div>
                     <a href="/admin/bidang" class="btn btn-primary btn-sm">
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
               <form action="/admin/bidang/create" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Nama bidang</label>
                           <input type="text" name="nama" autofocus class="form-control" placeholder="Masukkan Nama bidang .....">     
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary mt-1 mr-2"><span class="fa fa-save"></span> Tambah Data</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection