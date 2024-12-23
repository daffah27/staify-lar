<x-layout>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">Daftar Prestasi</h1>
        </div>

        <div class="d-flex justify-content-left mb-3">
            <a href="#" class="btn btn-primary mr-2" id="btn-belum-terverifikasi">Belum Diverifikasi</a>
            <a href="#" class="btn btn-secondary" id="btn-terverifikasi">Telah Diverifikasi</a>
        </div>

        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="Cari Nama Mahasiswa..." />
        </div>

        @if (session('success'))
            <p class="text-primary"> {{ session('success') }}</p>
        @endif

        <!-- Belum Verifikasi -->
        <div id="belum-terverifikasi" class="card mb-3">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kompetisi</th>
                            <th>Pencapaian</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan Mahasiswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="belumVerifikasiTable">
                        @foreach ($onReview as $prestasi)
                            <tr>
                                <td>{{ $prestasi->nama_kompetisi }}</td>
                                <td>{{ $prestasi->pencapaian }}</td>
                                <td>{{ $prestasi->user->name }}</td>
                                <td>{{ $prestasi->user->jurusan }}</td>
                                <td>
                                    <div class="text-center">
                                        @if ($prestasi->konfirmasi == 'on-review')
                                            <a href="#" data-toggle="modal"
                                                data-target="#terimaModal-{{ $prestasi->id }}" class="btn btn-success">
                                                <i class="bi bi-check-square"></i>
                                            </a>
                                            <a href="#" data-toggle="modal"
                                                data-target="#tolakModal-{{ $prestasi->id }}" class="btn btn-danger">
                                                <i class="bi bi-x-square"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('prestasi.detail', $prestasi->id) }}"
                                            class="btn btn-secondary">
                                            <i class="bi bi-exclamation-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>


                            <!-- Tolak Modal-->
                            <div class="modal fade" id="tolakModal-{{ $prestasi->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('prestasi.reject', $prestasi->id) }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tolak Prestasi</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Masukkan alasan anda menolak prestasi ini</p>
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
                            <div class="modal fade" id="terimaModal-{{ $prestasi->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('prestasi.accept', $prestasi->id) }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Terima Prestasi</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin untuk menerima prestasi ini ?</p>
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

        <!-- Telah di Verifikasi -->
        <div id="terverifikasi" class="card mb-3">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
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
                    <tbody id="terverifikasiTable">
                        @foreach ($terverifikasi as $prestasi)
                            <tr>
                                <td>{{ $prestasi->nama_kompetisi }}</td>
                                <td>{{ $prestasi->pencapaian }}</td>
                                <td>{{ $prestasi->user->name }}</td>
                                <td>{{ $prestasi->user->jurusan }}</td>
                                <td>
                                    @if ($prestasi->konfirmasi == 'on-review')
                                        <p class="rounded p-2 text-white badge bg-info">On Review</p>
                                    @elseif ($prestasi->konfirmasi == 'terverifikasi')
                                        <p class="rounded p-2 text-white badge bg-success">Approved</p>
                                    @elseif ($prestasi->konfirmasi == 'ditolak')
                                        <p class="rounded p-2 text-white badge bg-danger">Reject</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('prestasi.detail', $prestasi->id) }}"
                                        class="btn btn-secondary">
                                        <i class="bi bi-exclamation-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const btnBelumTerverifikasi = document.getElementById('btn-belum-terverifikasi');
        const btnTerverifikasi = document.getElementById('btn-terverifikasi');
        const cardTerverifikasi = document.getElementById('terverifikasi');
        const cardBelumTerverifikasi = document.getElementById('belum-terverifikasi');
        const searchInput = document.getElementById('search');

        function toggleVisibility(showTerverifikasi) {
            if (showTerverifikasi) {
                cardBelumTerverifikasi.style.display = 'none';
                cardTerverifikasi.style.display = 'block';
            } else {
                cardBelumTerverifikasi.style.display = 'block';
                cardTerverifikasi.style.display = 'none';
            }
        }

        btnTerverifikasi.addEventListener('click', function() {
            btnTerverifikasi.classList.add('btn-primary');
            btnTerverifikasi.classList.remove('btn-secondary');
            btnBelumTerverifikasi.classList.add('btn-secondary');
            btnBelumTerverifikasi.classList.remove('btn-primary');
            toggleVisibility(true);
        });

        btnBelumTerverifikasi.addEventListener('click', function() {
            btnBelumTerverifikasi.classList.add('btn-primary');
            btnBelumTerverifikasi.classList.remove('btn-secondary');
            btnTerverifikasi.classList.add('btn-secondary');
            btnTerverifikasi.classList.remove('btn-primary');
            toggleVisibility(false);
        });

        toggleVisibility(false);

        // Filter table rows based on search input
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            filterTable('belumVerifikasiTable', searchTerm);
            filterTable('terverifikasiTable', searchTerm);
        });

        function filterTable(tableId, searchTerm) {
            const tableRows = document.getElementById(tableId).getElementsByTagName('tr');
            for (let row of tableRows) {
                const nameCell = row.cells[2]; // "Nama Mahasiswa" is the 3rd column
                if (nameCell) {
                    const nameText = nameCell.textContent.toLowerCase();
                    if (nameText.indexOf(searchTerm) === -1) {
                        row.style.display = 'none';
                    } else {
                        row.style.display = '';
                    }
                }
            }
        }
    });
</script>
