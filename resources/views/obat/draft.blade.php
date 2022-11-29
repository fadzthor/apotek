<div class="row">
    <!-- left column -->
    @foreach ($obats as $Obat)
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
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
    @endforeach
</div>
<!-- /.row -->
