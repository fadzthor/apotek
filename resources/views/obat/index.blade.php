@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Obat</h1>
                    <button class="btn btn-success"><a class="" href="{{ route('obat.create') }}">
                            Insert</a></button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Daftar Obat</a></li>
                        <li class="breadcrumb-item active">List</li>
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
                            <h3 class="card-title">Daftar Obat</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jenis Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Tanggal Kadaluwarsa</th>
                                        <th>Tanggal Ditambahkan</th>
                                        <th>Tanggal Diperbarui</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obats as $Obat)
                                        <tr>
                                            <td>{{ $Obat->id }}</td>
                                            <td>{{ $Obat->id_jenis_obat }}</td>
                                            {{-- <td value="{{ $Obat->id_jenis_obat === $jenisobats->id }}">{{ $jenisobats->nama }}</td> --}}

                                            <td>{{ $Obat->nama_obat }}</td>
                                            <td>{{ $Obat->stok }}</td>
                                            <td>{{ $Obat->harga }}</td>
                                            <td>{{ $Obat->tanggal_kadaluarsa }}</td>
                                            <td>{{ $Obat->created_at }}</td>
                                            <td>{{ $Obat->updated_at }}</td>
                                            <td>
                                                <img src="{{ Storage::url('public/medicine/') . $Obat->gambar }}"
                                                    class="rounded" style="width: 40px">
                                            </td>

                                            {{-- <td>{{ $Obat->gambar }}</td> --}}
                                            <td>
                                                <form action="{{ route('obat.destroy', $Obat->id) }}" method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('obat.show', $Obat->id) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('obat.edit', $Obat->id) }}">Edit</a>

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

    {{-- card card card card card card card card card card card card card card card card  --}}
    {{-- card card card card card card card card card card card card card card card card  --}}

    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <!-- left column -->

                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        @foreach ($obats as $Obat)
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">Detail Daftar Obat</h3>
                                <div class="text-center">
                                    <img class="img-fluid" style="max-width: 76px;height: 76px;"
                                        src="{{ Storage::url('public/medicine/') . $Obat->gambar }}" alt="Medicine Image">
                                </div>
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
                                        <b>Tanggal Kadaluwarsa</b> <a
                                            class="float-right">{{ $Obat->tanggal_kadaluarsa }}</a>
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
                        @endforeach
                    </div>
                    <!-- /.card -->

                </div>

                <!-- /.row -->

            </div>


            {{-- card card card card card card card card card card card card card card card card  --}}
            {{-- card card card card card card card card card card card card card card card card  --}}


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Obat</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                        @foreach ($obats as $Obat)
                                            <div class="col-md-4">
                                                <!-- Profile Image -->
                                                <div class="card card-primary card-outline">
                                                    <div class="card-body box-profile">
                                                        <h3 class="profile-username text-center">Detail Daftar Obat</h3>
                                                        <div class="text-center">
                                                            <img class="img-fluid" style="max-width: 76px;height: 76px;"
                                                                src="{{ Storage::url('public/medicine/') . $Obat->gambar }}"
                                                                alt="Medicine Image">
                                                        </div>
                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item">
                                                                <b>ID</b> <a class="float-right">{{ $Obat->id }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Jenis Obat</b> <a
                                                                    class="float-right">{{ $Obat->id_jenis_obat }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Stok</b> <a class="float-right">{{ $Obat->stok }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Harga</b> <a class="float-right">{{ $Obat->harga }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Tanggal Kadaluwarsa</b> <a
                                                                    class="float-right">{{ $Obat->tanggal_kadaluarsa }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Tanggal Dibuat</b> <a
                                                                    class="float-right">{{ $Obat->created_at }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Tanggal Diperbarui</b> <a
                                                                    class="float-right">{{ $Obat->updated_at }}</a>
                                                            </li>

                                                        </ul>
                                                        <a href="{{ route('obat.index') }}"
                                                            class="btn bg-gray btn-block"><b>Kembali</b></a>
                                                    </div>
                                                    <!-- /.card-body -->
                                        @endforeach
                                    </td>
                                    </tr>
                            </div>
                            <!-- /.card -->

                        </div>
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

    </section>
@endsection
