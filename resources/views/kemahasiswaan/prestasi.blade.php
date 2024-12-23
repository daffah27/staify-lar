<x-layout>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Prestasi</h1>
        </div>

        <!-- Telah di Verifikasi -->
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h5 mb-2 text-gray-800">Telah di Verifikasi</h1>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kompetisi</th>
                            <th>Pencapaian</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan Mahasiswa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terverifikasi as $prestasi)
                            <tr>
                                <td>{{ $prestasi->nama_kompetisi }}</td>
                                <td>{{ $prestasi->pencapaian }}</td>
                                <td>{{ $prestasi->user->name }}</td>
                                <td>{{ $prestasi->user->jurusan }}</td>
                                <td>{{ $prestasi->konfirmasi }}</td>
                                <td><a href="{{ route('prestasi', $prestasi->id) }}"
                                        class="btn btn-info small">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Belum Verifikasi -->
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h5 mb-2 text-gray-800">Belum Verifikasi</h1>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kompetisi</th>
                            <th>Pencapaian</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan Mahasiswa</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($onReview as $prestasi)
                            <tr>
                                <td>{{ $prestasi->nama_kompetisi }}</td>
                                <td>{{ $prestasi->pencapaian }}</td>
                                <td>{{ $prestasi->user->namalengkap }}</td>
                                <td>{{ $prestasi->user->jurusan }}</td>
                                <td>
                                    <div class="text-center">
                                        <form action="{{ route('prestasi.accept', $prestasi->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success small">Terima</button>
                                        </form>
                                        <button data-toggle="modal" data-target="#tolakModal"
                                            class="btn btn-danger small">Tolak</button>
                                    </div>
                                </td>
                                <td><a href="{{ route('prestasi', $prestasi->id) }}"
                                        class="btn btn-info small">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
