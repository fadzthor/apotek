@extends('layouts.app')
@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Obat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Daftar Obat</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    
                  <h3 class="profile-username text-center">Detail Daftar Obat</h3>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>ID</b> <a class="float-right">{{ $Obat->id }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Obat</b> <a class="float-right">{{ $Obat->id_jenis_obat }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Stok</b> <a class="float-right">{{ $Obat->stok }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Harga</b> <a class="float-right">{{ $Obat->harga }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal Kadaluwarsa</b> <a class="float-right">{{ $Obat->tanggal_kadaluarsa }}</a>
                      </li>
                    <li class="list-group-item">
                        <b>Tanggal Dibuat</b> <a class="float-right">{{ $Obat->created_at }}</a>
                      </li>
                    <li class="list-group-item">
                      <b>Tanggal Diperbarui</b> <a class="float-right">{{ $Obat->updated_at }}</a>
                    </li>                    
                  </ul>                  
                  <a href="{{ route('obat.index') }}" class="btn bg-gray btn-block"><b>Kembali</b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          <!-- /.card -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
