@extends('admin.layouts.app', [
'activePage' => 'jabatan',
])
@section('content')
<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Data Jabatan</h4>
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
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/jabatan">Data Jabatan</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/jabatan/detail/{{$jabatan->id}}">Detail Data Jabatan</a></li>
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
                  <h4 class="card-title m-0"><i class="fa fa-detail"></i> Detail Data Jabatan</h4>
                  <div>
                     <a href="/admin/jabatan" class="btn btn-primary btn-sm">
                     <i class="fa fa-arrow-left"></i> Back
                     </a>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="nama" autofocus class="form-control" readonly placeholder="Masukkan Nama Jabatan ....." value="{{$jabatan->nama}}" style="background-color: white;">     
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection