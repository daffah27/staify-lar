<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kegiatan dalam waktu dekat</h1>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($kegiatans as $kegiatan)
                    <div class="col-12 col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid" src="{{ asset('storage/' . $kegiatan->file_kegiatan) }}" alt="{{ $kegiatan->nama_kegiatan }}">
                                </div>
                                <h5 class="text-center text-dark font-weight-bold">{{ $kegiatan->nama_kegiatan }}</h5>
                                <p class="text-center">{{ $kegiatan->status }}</p>
                                <a class="text-center d-block p-2 btn-primary btn" href="{{ route('kegiatan.show', $kegiatan->id) }}">Open</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->
</x-layout>
