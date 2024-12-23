<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pengajuan</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="card mb-3 col-12">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title text-dark font-weight-bold">Nama Kegiatan: {{ $dana->nama_kegiatan }}
                            </h4>
                            <h5 class="card-text text-dark font-weight-normal mb-4">Diajukan oleh:
                                {{ $dana->user->name }} </h5>

                            <div class="row mb-4">
                                <div class="col-3">
                                    <p class="card-text">Tempat</p>
                                    <p class="card-text">Deskripsi</p>
                                    <p class="card-text">Jenis Kegiatan</p>
                                    <p class="card-text">Tanggal Mulai</p>
                                    <p class="card-text">Tanggal Selesai</p>
                                    <p class="card-text">Nominal Pengajuan</p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text">: {{ $dana->tempat }}</p>
                                    <p class="card-text">: {{ $dana->deskripsi }}</p>
                                    <p class="card-text">: {{ $dana->jenis_kegiatan }}</p>
                                    <p class="card-text">: {{ $dana->tanggal_mulai }}</p>
                                    <p class="card-text">: {{ $dana->tanggal_selesai }}</p>
                                    <p class="card-text">: Rp. {{ number_format($dana->nominal, 0, ',', '.') }}</p>
                                </div>
                            </div>



                            <embed src="{{ asset('storage/uploads/proposal/' . $dana->file_proposal) }}"
                                type="application/pdf" width="100%" height="600px" class="mb-1">
                            {{-- <a href="{{ asset('storage/uploads/proposal/' . $dana->file_proposal) }}"
                                class="card-text text-decoration-none" download>Download Proposal</a> --}}

                            <div class="text-center">
                                @if ($dana->konfirmasi == 'on-review')
                                    <p class="bg-success rounded p-3 text-white badge">On Review</p>
                                @elseif ($dana->konfirmasi == 'terverifikasi')
                                    <p class="rounded p-3 text-white badge bg-success">Approved</p>
                                @elseif ($dana->konfirmasi == 'ditolak')
                                    <p class="rounded p-3 text-white badge bg-danger">Reject</p>
                                    <p>Proposal Anda ditolak karena {{ $dana->alasan }}, Mohon Revisi</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


</x-layout>
