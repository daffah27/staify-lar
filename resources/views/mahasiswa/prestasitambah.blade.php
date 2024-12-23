<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Prestasi</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="card mb-3 col-12">
                <!-- Card Body -->
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/prestasitambah" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="name">Nama Kompetisi</label>
                                    <input type="text" class="form-control" name="kompetisi" id="name"
                                        value="{{ old('kompetisi') }}" placeholder="">

                                    <label for="jenis">Jenis Kompetisi</label>
                                    <select class="form-control" name="jns_kompetisi" id="exampleFormControlSelect1">
                                        <option value="Akademik dan Riset"
                                            {{ old('jns_kompetisi') == 'Akademik dan Riset' ? 'selected' : '' }}>
                                            Akademik dan Riset</option>
                                        <option value="Teknologi dan Inovasi"
                                            {{ old('jns_kompetisi') == 'Teknologi dan Inovasi' ? 'selected' : '' }}>
                                            Teknologi dan Inovasi</option>
                                        <option value="Seni dan Kreativitas"
                                            {{ old('jns_kompetisi') == 'Seni dan Kreativitas' ? 'selected' : '' }}>Seni
                                            dan Kreativitas</option>
                                        <option value="Olahrga dan Kesehatan"
                                            {{ old('jns_kompetisi') == 'Olahrga dan Kesehatan' ? 'selected' : '' }}>
                                            Olahrga dan Kesehatan</option>
                                    </select>

                                    <label for="">Jenjang</label>
                                    <select class="form-control" name="jenjang" id="exampleFormControlSelect1">
                                        <option value="Regional" {{ old('jenjang') == 'Regional' ? 'selected' : '' }}>
                                            Regional</option>
                                        <option value="Nasional" {{ old('jenjang') == 'Nasional' ? 'selected' : '' }}>
                                            Nasional</option>
                                        <option value="Internasional"
                                            {{ old('jenjang') == 'Internasional' ? 'selected' : '' }}>Internasional
                                        </option>
                                    </select>

                                    <label for="">Pencapaian</label>
                                    <select class="form-control" name="pencapaian" id="exampleFormControlSelect1">
                                        <option value="Juara 1" {{ old('pencapaian') == 'Juara 1' ? 'selected' : '' }}>
                                            Juara 1</option>
                                        <option value="Juara 2" {{ old('pencapaian') == 'Juara 2' ? 'selected' : '' }}>
                                            Juara 2</option>
                                        <option value="Juara 3" {{ old('pencapaian') == 'Juara 3' ? 'selected' : '' }}>
                                            Juara 3</option>
                                        <option value="Harapan 1"
                                            {{ old('pencapaian') == 'Harapan 1' ? 'selected' : '' }}>Harapan 1</option>
                                        <option value="Harapan 2"
                                            {{ old('pencapaian') == 'Harapan 2' ? 'selected' : '' }}>Harapan 2</option>
                                        <option value="Harapan 3"
                                            {{ old('pencapaian') == 'Harapan 3' ? 'selected' : '' }}>Harapan 3</option>
                                    </select>

                                    <label for="">Penyelenggara</label>
                                    <input type="text" class="form-control" name="penyelenggara" id="nim"
                                        value="{{ old('penyelenggara') }}" placeholder="">
                                </div>

                                <div class="col-12 col-sm-6">
                                    <label for="">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" id="nim"
                                        value="{{ old('tanggal_mulai') }}" placeholder="">

                                    <label for="">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" id="nim"
                                        value="{{ old('tanggal_selesai') }}" placeholder="">

                                    <label for="">Tempat Kompetisi</label>
                                    <input type="text" class="form-control" name="tempat" id="nim"
                                        value="{{ old('tempat') }}" placeholder="">

                                    <label for="">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="4">{{ old('deskripsi') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label for="">File Bukti</label>
                                    <input type="file" name="file" class="form-control" id="nim"
                                        placeholder="">
                                </div>

                                {{-- <div class="col-12">
                                    <label for="file">File Bukti (PDF Only)</label>
                                    <input 
                                        type="file" 
                                        name="file" 
                                        class="form-control" 
                                        id="file" 
                                        accept="application/pdf" 
                                        required
                                    >
                                </div> --}}
                                
                            </div>
                        </div>
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-user btn-block">Tambah Prestasi</button>
                    </form>


                </div>
            </div>



        </div>
    </div>

    <!-- /.container-fluid -->
</x-layout>
