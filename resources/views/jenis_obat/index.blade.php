@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jenis Obat</h1>
                    <button class="btn btn-success"><a class="" href="{{ route('jenisobat.create') }}">
                            Insert</a></button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">jenis-obat</li>
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
                            <h3 class="card-title">Daftar Jenis Obat</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jenis Obat</th>
                                        <th>Tanggal Ditambahkan</th>
                                        <th>Tanggal Diperbarui</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_obats as $jenisObat)
                                        <tr>
                                            <td>{{ $jenisObat->id }}</td>
                                            <td>{{ $jenisObat->nama }}</td>
                                            <td>{{ $jenisObat->created_at }}</td>
                                            <td>{{ $jenisObat->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('jenisobat.destroy', $jenisObat->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('jenisobat.show', $jenisObat->id) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('jenisobat.edit', $jenisObat->id) }}">Edit</a>

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
