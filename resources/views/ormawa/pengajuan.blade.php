<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pendanaan Ormawa</h1>
            <a class="btn btn-primary" href="{{ route('dana.create') }}">Tambah</a>
        </div>

        <!-- Content Row -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Ormawa</th>
                                <th>Status</th>
                                <th>Nominal Pendanaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danas as $index => $dana)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dana->nama_kegiatan }}</td>
                                    <td>{{ $dana->user->name }}</td>
                                    <td>
                                        @if ($dana->konfirmasi == 'on-review')
                                            <p class="rounded p-2 text-white badge bg-info">On Review</p>
                                        @elseif ($dana->konfirmasi == 'terverifikasi')
                                            <p class="rounded p-2 text-white badge bg-success">Approved</p>
                                        @elseif ($dana->konfirmasi == 'ditolak')
                                            <p class="rounded p-2 text-white badge bg-danger">Reject</p>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($dana->nominal, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('dana.detail', $dana->id) }}" class="btn btn-secondary">
                                                <i class="bi bi-exclamation-square"></i>
                                            </a>
                                        </div>
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
