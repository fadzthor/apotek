@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Obat Masuk</h1>
                    <button class="btn btn-success"><a class="" href="{{ route('obatmasuk.create') }}">
                            Insert</a></button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        <li class="breadcrumb-item active">Obat Masuk</li>
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
                            <h3 class="card-title">Obat Masuk</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Distributor</th>
                                        <th>Obat</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Masuk</th>                                        
                                        {{-- <th>Tanggal Ditambahkan</th>
                                        <th>Tanggal Diperbarui</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat_masuks as $obatMasuk)
                                        <tr>
                                            <td>{{ $obatMasuk->id }}</td>
                                            <td>{{ $obatMasuk->distributor }}</td>
                                            <td>{{ $obatMasuk->id_obat }}</td>
                                            <td>{{ $obatMasuk->jumlah }}</td>
                                            <td>{{ $obatMasuk->tanggal_masuk }}</td>                                            
                                            {{-- <td>{{ $obatMasuk->created_at }}</td>
                                            <td>{{ $obatMasuk->updated_at }}</td> --}}
                                            <td>
                                                <form action="{{ route('obatmasuk.destroy', $obatMasuk->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('obatmasuk.show', $obatMasuk->id) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('obatmasuk.edit', $obatMasuk->id) }}">Edit</a>

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
