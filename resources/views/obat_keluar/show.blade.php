@extends('layouts.app')
@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Obat Keluar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Obat Keluar</a></li>
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
                    
                  <h3 class="profile-username text-center">Detail Obat Keluar</h3>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>ID</b> <a class="float-right">{{ $obatKeluar->id }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Pembeli</b> <a class="float-right">{{ $obatKeluar->nama_pasien }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Obat</b> <a class="float-right">{{ $obatKeluar->id_obat }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Jumlah</b> <a class="float-right">{{ $obatKeluar->jumlah }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Pembayaran</b> <a class="float-right">{{ $obatKeluar->jumlah_pembayaran }}</a>
                      </li>
                    <li class="list-group-item">
                        <b>Tanggal Pembelian</b> <a class="float-right">{{ $obatKeluar->created_at }}</a>
                      </li>                 
                  </ul>                  
                  <a href="{{ route('obatkeluar.index') }}" class="btn bg-gray btn-block"><b>Kembali</b></a>
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
