<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Prestasi</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="card mb-3 col-12">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('storage/uploads/prestasi/' . $data->file_bukti) }}" class="img-fluid mb-4">
                                    <h5 class="card-title text-dark font-weight-bold"> Nama Kompetisi :
                                        {{ $data->nama_kompetisi }}</h5>
                                    <p class="card-text"> Deskripsi : {{ $data->deskripsi }}</p>
                                    <p class="card-text"> Jenis Kompetisi : {{ $data->jenis_kompetisi }}</p>
                                    <p class="card-text"> Jenjang : {{ $data->jenjang }}</p>
                                    <p class="card-text"> Penyelenggara : {{ $data->penyelenggara }}</p>

                                    @if ($data->konfirmasi == 'on-review')
                                        <p class="bg-info rounded p-3 text-white badge">On Review</p>
                                    @elseif ($data->konfirmasi == 'terverifikasi')
                                        <p class="rounded p-3 text-white badge bg-success">Approved</p>
                                    @elseif ($data->konfirmasi == 'ditolak')
                                        <p class="rounded p-3 text-white badge bg-danger">Reject</p>
                                        <p>Prestasi Anda ditolak karena {{ $data->alasan }}, Mohon Revisi</p>
                                    @endif
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- /.container-fluid -->
</x-layout>
