<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pendanaan Ormawa</h1>
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
                                            @if ($dana->konfirmasi == 'on-review')
                                                <a href="#" data-toggle="modal"
                                                    data-target="#terimaModal-{{ $dana->id }}"
                                                    class="btn btn-success">
                                                    <i class="bi bi-check-square"></i>
                                                </a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#tolakModal-{{ $dana->id }}"
                                                    class="btn btn-danger">
                                                    <i class="bi bi-x-square"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('dana.detail', $dana->id) }}" class="btn btn-secondary">
                                                <i class="bi bi-exclamation-square"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Tolak Modal-->
                                <div class="modal fade" id="tolakModal-{{ $dana->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('dana.reject', $dana->id) }}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pendanaan</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Masukkan alasan anda menolak pendanaan ini</p>
                                                    <textarea class="form-control" name="alasan" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-danger" type="submit">Tolak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Terima Modal-->
                                <div class="modal fade" id="terimaModal-{{ $dana->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('dana.accept', $dana->id) }}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Terima Pendanaan</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin untuk menerima pendanaan ini ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-success" type="submit">Yakin</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</x-layout>
