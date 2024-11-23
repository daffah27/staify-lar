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
                            <th>Nama Kegiatan</th>
                            <th>Jenis Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Penyelenggara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatans as $kegiatan)
                            <tr>
                                <td>{{ $kegiatan->nama_kegiatan }}</td>
                                <td>{{ $kegiatan->jenis_kegiatan }}</td>
                                <td>{{ $kegiatan->tanggal_mulai }}</td>
                                <td>{{ $kegiatan->tempat }}</td>
                                <td>{{ $kegiatan->penyelenggara }}</td>
                                <td>
                                    <a href="{{ route('kegiatan.show', $kegiatan->id) }}"
                                        class="btn btn-info small">Detail</a>
                                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                        class="btn btn-success small">Edit</a>
                                    <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger small">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-layout>
