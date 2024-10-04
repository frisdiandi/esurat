@extends('admin.layouts.app', [
'activePage' => 'anggaran',
])

@section('content')


<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Data Anggaran</h4>
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
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/anggaran">List Data Anggaran</a></li>
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
                  <h4 class="card-title m-0"><i class="fa fa-list"></i> List Data Anggaran</h4>
                  <div>
                     <a href="/admin/anggaran/add" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i> Tambah Data
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
                           <th width="3%" class="text-center">No Surat</th>
                           <th width="3%" class="text-center">Tanggal</th>
                           <th width="3%" class="text-center">Perihal</th>
                           <th width="3%" class="text-center">Sifat</th>
                           <th width="3%" class="text-center">Status</th>
                           <th width="15%" class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        @foreach($anggaran as $data)
                        <tr>
                           <td class="text-center" width="3%">{{ $no++ }}</td>
                           <td>{{ $data->no_surat }}</td>
                           <td>{{ $data->tanggal }}</td>
                           <td>{{ $data->perihal }}</td>
                           <td>{{ $data->sifat }}</td>
                           <td>{{ $data->status }}</td>

                           <td class="text-center" width="15%">
                              <a href="/admin/anggaran/edit/{{$data->id}}">
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





@endsection