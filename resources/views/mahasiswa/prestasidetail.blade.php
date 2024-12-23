<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Prestasi</h1>
        </div>

        <div class="row">
            <!-- Area Chart -->
            <div class="card mb-3 col-12">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title text-dark font-weight-bold">Nama Kompetisi:
                                {{ $data->nama_kompetisi }}
                            </h4>
                            <h5 class="card-text text-dark font-weight-normal mb-4">Diajukan oleh:
                                {{ $data->user->name }} </h5>

                            <div class="row mb-4">
                                <div class="col-3">
                                    <p class="card-text">Jenis Kompetisi</p>
                                    <p class="card-text">Jenjang</p>
                                    <p class="card-text">Pencapaian</p>
                                    <p class="card-text">Penyelenggara</p>
                                    <p class="card-text">Tanggal Mulai</p>
                                    <p class="card-text">Tanggal Selesai</p>
                                    <p class="card-text">Tempat Kompetsis</p>
                                    <p class="card-text">Deskripsi</p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text">: {{ $data->jenis_kompetisi }}</p>
                                    <p class="card-text">: {{ $data->jenjang }}</p>
                                    <p class="card-text">: {{ $data->pencapaian }}</p>
                                    <p class="card-text">: {{ $data->penyelenggara }}</p>
                                    <p class="card-text">: {{ $data->tanggal_mulai }}</p>
                                    <p class="card-text">: {{ $data->tanggal_selesai }}</p>
                                    <p class="card-text">: {{ $data->tempat_kompetisi }}</p>
                                    <p class="card-text">: {{ $data->deskripsi }}</p>
                                </div>
                            </div>
                            <img src="{{ asset('storage/uploads/prestasi/' . $data->file_bukti) }}"
                                class="img-fluid mb-4">
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


    <!-- /.container-fluid -->
</x-layout>
