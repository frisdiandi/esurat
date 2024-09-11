@extends('admin.layouts.app', [
'activePage' => 'permintaan',
])
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="widget p-md clearfix">
            <div class="pull-left">
                <h1 class="widget-title" style="font-size: 30px; margin-bottom: 5px;">Data Permintaan</h1>
                <small class="text-color">Data Master <span style="margin:0px 3px 0px 3px"> > </span> <a href="/admin/permintaan">List Data Permintaan</a></small>
            </div>
        </div>
        <!-- .widget -->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <div class="pull-left">
                    <h4 class="widget-title" style="font-size:24px;">
                        <i class="glyphicon glyphicon-list"></i> List Data Permintaan
                    </h4>
                </div>
                <div class="pull-right">
                    <a href="/admin/permintaan/add" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
            </header>
            <!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
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
                    <table id="default-datatable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                            <tr>
                                <th width="3%" class="text-center">#</th>
                                <th width="10%" class="text-center">Tanggal Permintaan</th>
                                <th width="10%" class="text-center">Perihal</th>
                                <th width="5%" class="text-center">Lampiran</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permintaan as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->tgl_permintaan }}</td>
                                <td>{{ $data->deskripsi }}</td> <!-- Menganggap "deskripsi" adalah perihal -->
                                <td class="text-center">
                                    @if($data->foto)
                                        <a href="{{ asset('images/' . $data->foto) }}" target="_blank">Lihat Lampiran</a>
                                    @else
                                        Tidak ada lampiran
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/admin/permintaan/detail/{{ $data->id }}" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-list-alt" data-toggle="tooltip" data-placement="top" title="Detail Data"></i>
                                    </a>
                                    <a href="/admin/permintaan/edit/{{ $data->id }}" class="btn btn-success btn-xs">
                                        <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit Data"></i>
                                    </a>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal-{{ $data->id }}">
                                        <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Data"></i>
                                    </button>
                                    <!-- .widget-body -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- .widget -->
    </div>
    <!-- END column -->
</div>
<!-- .row -->

@foreach($permintaan as $data)
<div class="modal fade" id="deleteModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h2 class="text-center">Apakah Anda Yakin Menghapus Data Ini?<h2>
            <hr>
            <div class="form-group" style="font-size: 17px;">
               <label>Perihal</label>
               <input type="text" class="form-control" readonly value="{{ $data->deskripsi }}" style="background-color: white;">
            </div>
            <div class="row mt-1">
               <div class="col-md-6">
                  <a href="/admin/permintaan/delete/{{ $data->id }}" style="text-decoration: none;">
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
