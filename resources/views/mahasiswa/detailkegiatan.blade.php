<x-layout>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Kegiatan</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="card mb-3 col-12">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $data->file_kegiatan) }}" class="img-fluid mb-4 ">
                            </div>
                            <h3 class="card-title text-dark font-weight-bold">Nama Kegiatan</h3>
                            <p class="card-text">{{ $data->nama_kegiatan }}</p>

                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <h5 class="text-dark font-weight-bold">Penyelenggara</h5>
                                    <p class="card-text">{{ $data->penyelenggara }}</p>
                                </div>
                                <div class="col-12 col-sm-6 mb-3">
                                    <h5 class="text-dark font-weight-bold">Timeline Pendaftaran</h5>
                                    <p class="card-text">{{ $data->tanggal_mulai }} - {{ $data->tanggal_selesai }}</p>
                                </div>
                                <div class="col-12 col-sm-6 mb-3">
                                    <h5 class="text-dark font-weight-bold">Link Pendaftaran</h5>
                                    <a href="{{ $data->link_pendaftaran }}"
                                        class="text-decoration-none text-primary card-text">{{ $data->link_pendaftaran }}</a>
                                </div>
                                <div class="col-12 col-sm-6 mb-3">
                                    <h5 class="text-dark font-weight-bold">Juknis Kegiatan</h5>
                                    <a href="{{ $data->link_juknis }}"
                                        class="text-decoration-none text-primary card-text">{{ $data->link_juknis }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-layout>
