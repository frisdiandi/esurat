@extends('admin.layouts.app', [
'activePage' => 'dashboard',
])
@section('content')
<?php
   $pegawai= DB::table('pegawai')->where('id_user',Auth::User()->id)->first();
   if (!$pegawai) {
     $jabatan = ''; // Set default value if no record is found
   } else {
     $jabatan= DB::table('jabatan')->where('id',$pegawai->id_jabatan)->first();
   }
   $users= DB::table('users')->find(Auth::User()->id);
   ?>
<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title">Dashboard</h4>
         <div class="d-flex align-items-center">
         </div>
      </div>
      <div class="col-7 align-self-center">
         <div class="d-flex no-block justify-content-end align-items-center">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     Home
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/admin/home">Dashboard</a></li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="card  bg-light no-card-border">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <div class="m-r-10">
                     @if($pegawai != "")
                     <img src="{{url('public/profil')}}/{{$pegawai->foto}}" alt="user" width="60" class="rounded-circle" />
                     @else
                     <img src="{{url('assets-admin')}}/assets/images/user.png" alt="user" width="60" class="rounded-circle" />
                     @endif
                  </div>
                  <div>
                     <h3 class="m-b-0">Selamat Datang {{Auth::User()->name}}</h3>
                     <span>Anda Login Sebagai {{$jabatan ? $jabatan->nama:'Super Admin'}}</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection