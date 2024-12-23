<x-layout>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kegiatan</h1>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="namaKegiatan">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" id="namaKegiatan"
                                    placeholder="Nama Kegiatan" required>

                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>

                                <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" required>
                                    <option value="Akademik dan Riset">Akademik dan Riset</option>
                                    <option value="Teknologi dan Inovasi">Teknologi dan Inovasi</option>
                                    <option value="Seni dan Kreativitas">Seni dan Kreativitas</option>
                                    <option value="Olahraga dan Kesehatan">Olahraga dan Kesehatan</option>
                                </select>

                                <label for="linkPendaftaran">Link Pendaftaran</label>
                                <input type="url" name="link_pendaftaran" class="form-control" id="linkPendaftaran"
                                    placeholder="Link Pendaftaran">

                                <label for="linkJuknis">Link Juknis</label>
                                <input type="url" name="link_juknis" class="form-control" id="linkJuknis"
                                    placeholder="Link Juknis">

                                <label for="tempat">Tempat</label>
                                <input type="text" name="tempat" class="form-control" id="tempat"
                                    placeholder="Tempat Kegiatan">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="tanggalMulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" id="tanggalMulai"
                                    required>

                                <label for="tanggalSelesai">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control"
                                    id="tanggalSelesai">

                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>

                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" name="penyelenggara" class="form-control" id="penyelenggara"
                                    placeholder="Penyelenggara">
                            </div>

                            <div class="col-12">
                                <label for="file">File Poster Kegiatan</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Buat Kegiatan</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
