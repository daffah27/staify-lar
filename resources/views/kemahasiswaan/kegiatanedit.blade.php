<x-layout>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kegiatan</h1>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label for="namaKegiatan">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan"
                                value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" class="form-control"
                                id="namaKegiatan" required>

                            <label for="jenis_kegiatan">Jenis Kegiatan</label>
                            <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" required>
                                <option value="Akademik dan Riset"
                                    {{ $kegiatan->jenis_kegiatan == 'Akademik dan Riset' ? 'selected' : '' }}>Akademik
                                    dan Riset</option>
                                <option value="Teknologi dan Inovasi"
                                    {{ $kegiatan->jenis_kegiatan == 'Teknologi dan Inovasi' ? 'selected' : '' }}>
                                    Teknologi dan Inovasi</option>
                                <option value="Seni dan Kreativitas"
                                    {{ $kegiatan->jenis_kegiatan == 'Seni dan Kreativitas' ? 'selected' : '' }}>Seni dan
                                    Kreativitas</option>
                                <option value="Olahraga dan Kesehatan"
                                    {{ $kegiatan->jenis_kegiatan == 'Olahraga dan Kesehatan' ? 'selected' : '' }}>
                                    Olahraga dan Kesehatan</option>
                            </select>

                            <label for="linkPendaftaran">Link Pendaftaran</label>
                            <input type="text" name="link_pendaftaran"
                                value="{{ old('link_pendaftaran', $kegiatan->link_pendaftaran) }}" class="form-control"
                                id="linkPendaftaran">

                            <label for="linkJuknis">Link Juknis</label>
                            <input type="text" name="link_juknis"
                                value="{{ old('link_juknis', $kegiatan->link_juknis) }}" class="form-control"
                                id="linkJuknis">

                            <label for="tempat">Tempat</label>
                            <input type="text" name="tempat" value="{{ old('tempat', $kegiatan->tempat) }}"
                                class="form-control" id="tempat">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="tanggalMulai">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai"
                                value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai) }}" class="form-control"
                                id="tanggalMulai" required>

                            <label for="tanggalSelesai">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai"
                                value="{{ old('tanggal_selesai', $kegiatan->tanggal_selesai) }}" class="form-control"
                                id="tanggalSelesai">

                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>

                            <label for="penyelenggara">Penyelenggara</label>
                            <input type="text" name="penyelenggara"
                                value="{{ old('penyelenggara', $kegiatan->penyelenggara) }}" class="form-control"
                                id="penyelenggara">
                        </div>

                        <div class="col-12">
                            <label for="file">File Poster Kegiatan</label>
                            <img id="preview" src="#" alt="Preview Gambar"
                                style="max-width: 100%; max-height: 300px; display: none;" />

                            <input type="file" name="file" class="form-control" id="file"
                                accept="image/jpg,image/jpeg,image/png">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-user btn-block">Edit Kegiatan</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

<script>
    document.getElementById('file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                alert('File yang dipilih bukan gambar!');
            }
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
