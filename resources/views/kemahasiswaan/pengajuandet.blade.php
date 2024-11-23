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
                            <h5 class="card-title text-dark font-weight-bold">Nama Kegiatan: {{ $dana->nama_kegiatan }}
                            </h5>
                            <p class="card-text">Tempat: {{ $dana->tempat }}</p>
                            <p class="card-text">Deskripsi: {{ $dana->deskripsi }}</p>
                            <p class="card-text">Tanggal Mulai: {{ $dana->tanggal_mulai }}</p>
                            <p class="card-text">Tanggal Selesai: {{ $dana->tanggal_selesai }}</p>

                            <!-- Link untuk download proposal -->
                            <a href="{{ asset('fileProposal/' . $dana->file_proposal) }}"
                                class="card-text text-decoration-none" download>Download Proposal</a>

                            <div class="text-center">
                                @if ($dana->konfirmasi == 'pending')
                                    <p class="bg-info rounded p-3 text-white badge">On Review</p>
                                @elseif ($dana->konfirmasi == 'accepted')
                                    <p class="rounded p-3 text-white badge bg-primary">Approved</p>
                                @elseif ($dana->konfirmasi == 'rejected')
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
