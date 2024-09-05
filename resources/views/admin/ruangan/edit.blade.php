@extends('admin.layouts.app', [
'activePage' => 'ruangan',
])
@section('content')
<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Data ruangan</h4>
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
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/ruangan">Data ruangan</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/ruangan/edit/{{$ruangan->id}}">Edit Data ruangan</a></li>
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
                  <h4 class="card-title m-0"><i class="fa fa-edit"></i> Edit Data ruangan</h4>
                  <div>
                     <a href="/admin/ruangan" class="btn btn-primary btn-sm">
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
               <form action="/admin/ruangan/update/{{$ruangan->id}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>NIP ruangan</label>
                           <input type="number" name="nip" autofocus class="form-control" placeholder="Masukkan NIP ruangan ....." value="{{$ruangan->nip}}">     
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Nama ruangan</label>
                           <input type="text" name="nama" autofocus class="form-control" placeholder="Masukkan Nama ruangan ....." value="{{$ruangan->nama}}">     
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Jabatan ruangan</label>
                           <select class="form-control select2" name="id_jabatan">
                              <option value="{{$jabatanSelect->id}}">{{$jabatanSelect->nama}}</option>
                              @foreach($jabatan as $data)
                              <option value="{{$data->id}}">{{$data->nama}}</option>
                              @endforeach                       
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Foto</label>
                           @if($ruangan->foto == "")
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Upload</span>
                              </div>
                              <div class="custom-file">
                                 <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                                 <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                           </div>
                           @else
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                       <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                                       <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <a href="{{url('public/profil')}}/{{$ruangan->foto}}" target="_blank" class="btn btn-primary btn-block"><i class="fa fa-image"></i> Lihat Foto</a>
                              </div>
                           </div>
                           @endif
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