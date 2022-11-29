@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Obat Keluar</h1>
                    <button class="btn btn-success"><a class="" href="{{ route('obatkeluar.create') }}">
                            Insert</a></button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Obat Keluar</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Obat Keluar</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pembeli</th>
                                        <th>Obat</th>
                                        <th>Jumlah</th>
                                        <th>Pembayaran</th>
                                        <th>Tanggal Pembelian</th>                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat_keluars as $obatKeluar)
                                        <tr>
                                            <td>{{ $obatKeluar->id }}</td>
                                            <td>{{ $obatKeluar->nama_pasien }}</td>
                                            <td>{{ $obatKeluar->id_obat }}</td>
                                            <td>{{ $obatKeluar->jumlah }}</td>
                                            <td>{{ $obatKeluar->jumlah_pembayaran }}</td>
                                            <td>{{ $obatKeluar->created_at }}</td>                                            
                                            <td>
                                                <form action="{{ route('obatkeluar.destroy', $obatKeluar->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('obatkeluar.show', $obatKeluar->id) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('obatkeluar.edit', $obatKeluar->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure?')"class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    
@endsection
