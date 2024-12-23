<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Prestasi</h1>
            <a class="btn btn-primary" href="/prestasitambah">Tambah</a>
        </div>

        @if (session('message'))
            <p class="text-primary"> {{ session('message') }}</p>
        @endif

        <!-- DataTales Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Kompetisi</th>
                                <th>Jenjang Kompetisi</th>
                                <th>Pencapaian</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($prestasis as $prestasi)
                                <tr>
                                    <td>{{ $prestasi->nama_kompetisi }}</td>
                                    <td>{{ $prestasi->jenis_kompetisi }}</td>
                                    <td>{{ $prestasi->pencapaian }}</td>
                                    <td>{{ $prestasi->tanggal_mulai }}</td>
                                    <td>
                                        @if ($prestasi->konfirmasi == 'on-review')
                                            <p class="rounded p-2 text-white badge bg-info">On Review</p>
                                        @elseif ($prestasi->konfirmasi == 'terverifikasi')
                                            <p class="rounded p-2 text-white badge bg-success">Approved</p>
                                        @elseif ($prestasi->konfirmasi == 'ditolak')
                                            <p class="rounded p-2 text-white badge bg-danger">Reject</p>
                                            <p>Prestasi Anda ditolak karena {{ $data->alasan }}, Mohon Revisi</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('prestasi.detail', $prestasi->id) }}"
                                            class="btn btn-secondary">
                                            <i class="bi bi-exclamation-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </div>
    <!-- /.container-fluid -->
</x-layout>
