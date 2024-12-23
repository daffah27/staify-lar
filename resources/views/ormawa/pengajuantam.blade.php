<x-layout>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengajuan Tambahan Dana</h1>
        </div>

        <!-- Area Chart -->
        <div class="card mb-3 col-12">
            <!-- Card Body -->
            <div class="card-body">
                <form action="{{ route('dana.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="name">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="nama_kegiatan" id="name"
                                    placeholder="" value="{{ old('nama_kegiatan') }}">
                                @error('nama_kegiatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <label for="jenis">Jenis Kegiatan</label>
                                <select class="form-control" name="jenis_kegiatan" id="exampleFormControlSelect1">
                                    <option value="Akademik dan Riset">Akademik dan Riset</option>
                                    <option value="Teknologi dan Inovasi">Teknologi dan Inovasi</option>
                                    <option value="Seni dan Kreativitas">Seni dan Kreativitas</option>
                                    <option value="Olahraga dan Kesehatan">Olahraga dan Kesehatan</option>
                                </select>
                                @error('jenis_kegiatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="4">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="tempat">Tempat</label>
                                <input type="text" name="tempat" class="form-control" id="tempat" placeholder=""
                                    value="{{ old('tempat') }}">
                                @error('tempat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai"
                                    value="{{ old('tanggal_mulai') }}">
                                @error('tanggal_mulai')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai"
                                    value="{{ old('tanggal_selesai') }}">
                                @error('tanggal_selesai')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <label for="nominal">Nominal</label>
                                <input type="number" name="nominal" class="form-control" id="nominal" placeholder=""
                                    value="{{ old('nominal') }}">
                                @error('nominal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="col-12">
                                <label for="file">File Proposal</label>
                                <input type="file" name="file_proposal" class="form-control" id="file_proposal">
                                @error('file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Ajukan</button>
                </form>
            </div>
        </div>

    </div>

</x-layout>
