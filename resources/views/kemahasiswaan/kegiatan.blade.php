<x-layout>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kegiatan</h1>
            <a class="btn btn-primary" href="{{ route('kegiatan.create') }}">Tambah</a>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Jenis Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Tempat</th>
                                <th>Penyelenggara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatans as $index => $kegiatan)
                                <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $kegiatan->jenis_kegiatan }}</td>
                                    <td>{{ $kegiatan->tanggal_mulai }} sd. {{ $kegiatan->tanggal_selesai }} </td>
                                    <td>{{ $kegiatan->tempat }}</td>
                                    <td>{{ $kegiatan->penyelenggara }}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('kegiatan.show', $kegiatan->id) }}"
                                                class="btn btn-secondary">
                                                <i class="bi bi-exclamation-square"></i>
                                            </a>
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                                class="btn btn-info">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" data-toggle="modal"
                                                data-target="#hapusModal-{{ $kegiatan->id }}" class="btn btn-danger">
                                                <i class="bi bi-dash-square"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                <!-- Hapus Modal-->
                                <div class="modal fade" id="hapusModal-{{ $kegiatan->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kegiatan</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin untuk menghapus kegiatan ini ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-danger" type="submit">Yakin</button>
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
</x-layout>
