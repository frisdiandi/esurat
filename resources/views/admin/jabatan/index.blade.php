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
               <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="card-title m-0"><i class="fa fa-list"></i> List Data Jabatan</h4>
                  <div>
                     <a href="/admin/jabatan/add" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i> Tambah Data
                     </a>
                     <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#import">
                      <i class="fa fa-upload"></i> Import Data
                     </button>
                     <a href="/admin/jabatan/export" target="_blank" class="btn btn-info btn-sm">
                      <i class="fa fa-download"></i> Export Data
                     </a>
                     <a href="/admin/jabatan/cetak" target="_blank" class="btn btn-success btn-sm">
                      <i class="fa fa-print"></i> Cetak Data
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
               <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered table-hover">
                     <thead class="bg-primary" style="color: white;">
                        <tr>
                           <th width="3%" class="text-center">#</th>
                           <th>Nama Jabatan</th>
                           <th width="15%" class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        @foreach($jabatan as $data)
                        <tr>
                           <td class="text-center" width="3%">{{ $no++ }}</td>
                           <td>{{ $data->nama }}</td>
                           <td class="text-center" width="15%">
                              <a href="/admin/jabatan/detail/{{$data->id}}">
                                 <button class="btn btn-info btn-xs">
                                    <i class="mdi mdi-account-card-details" data-toggle="tooltip" data-placement="top" title="Detail Data"></i>
                                 </button>
                              </a>
                              <a href="/admin/jabatan/edit/{{$data->id}}">
                                 <button class="btn btn-success btn-xs">
                                    <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit Data"></i>
                                 </button>
                              </a>
                              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#data-{{ $data->id }}">
                                 <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Data"></i>
                              </button>
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
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h2 class="text-center">Import Data<h2>
            <hr>
            <form method="post" action="/admin/jabatan/import" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label>Pilih File Excel</label>
                     <input type="file" name="file" required="required" class="form-control">
                  </div>                 
                   <div class="row mt-1">
                     <div class="col-md-6">
                       <a href="{{url('template/Template Jabatan.xlsx')}}">
                        <button type="button" class="btn btn-dark btn-block"> <span class="glyphicon glyphicon-download"></span> Download Template</button>
                       </a>
                     </div>
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block"> <span class="glyphicon glyphicon-floppy-save"></span> Import Data</button>
                     </div>
                   </div>
            </form>
         </div>
      </div>
   </div>
</div>
@foreach($jabatan as $data)
<div class="modal fade" id="data-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h2 class="text-center">Apakah Anda Yakin Menghapus Data Ini?<h2>
            <hr>
            <div class="form-group" style="font-size: 17px;">
               <label>Nama Jabatan</label>
               <input type="text" class="form-control" readonly value="{{$data->nama}}" style="background-color: white;">  
            </div>
            <div class="row mt-1">
               <div class="col-md-6">
                  <a href="/admin/jabatan/delete/{{$data->id}}" style="text-decoration: none;">
                  <button type="button" class="btn btn-primary btn-block">Ya</button>
                  </a>
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endforeach
@endsection