<x-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pengelolaan Akun</h1>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary">
                Tambah Ormawa
            </a>
        </div>

        <!-- Akun Ormawa -->
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h5 mb-2 text-gray-800">Akun Ormawa</h1>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Organisasi Mahasiswa</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akunormawa as $index => $akun)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $akun->username }}</td>
                                <td>{{ $akun->name }}</td>
                                <td>{{ $akun->email }}</td>
                                <td>
                                    <div class="text-center">

                                        <a href="#" data-toggle="modal"
                                            data-target="#resetModal-{{ $akun->id }}" class="btn btn-info">
                                            <i class="bi bi-eraser"></i>
                                        </a>
                                        <a href="#" data-toggle="modal"
                                            data-target="#hapusModal-{{ $akun->id }}" class="btn btn-danger">
                                            <i class="bi bi-dash-square"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <!-- Hapus Modal-->
                            <div class="modal fade" id="hapusModal-{{ $akun->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('akun.destroy', $akun->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin untuk menghapus akun ini ?</p>
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

                            <!-- Reset Modal-->
                            <div class="modal fade" id="resetModal-{{ $akun->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('akun.reset', $akun->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reset Password Akun
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin untuk mereset password akun ini ?</p>
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

        <!-- Akun Mahasiswa -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-3">
                    <h1 class="h5 mb-2 text-gray-800">Akun Mahasiswa</h1>

                    <input type="text" id="searchInput" class="form-control " style="width: 300px;" placeholder="Cari berdasarkan nama lengkap ...">
                </div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($akunmahasiswa as $index => $akun)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $akun->username }}</td>
                                <td>{{ $akun->name }}</td>
                                <td>{{ $akun->nim }}</td>
                                <td>{{ $akun->jurusan }}</td>
                                <td>{{ $akun->email }}</td>
                                <td>
                                    <div class="text-center">

                                        <a href="#" data-toggle="modal"
                                            data-target="#resetModal-{{ $akun->id }}" class="btn btn-info">
                                            <i class="bi bi-eraser"></i>
                                        </a>
                                        <a href="#" data-toggle="modal"
                                            data-target="#hapusModal-{{ $akun->id }}" class="btn btn-danger">
                                            <i class="bi bi-dash-square"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <!-- Hapus Modal-->
                            <div class="modal fade" id="hapusModal-{{ $akun->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('akun.destroy', $akun->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin untuk menghapus akun ini ?</p>
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

                            <!-- Reset Modal-->
                            <div class="modal fade" id="resetModal-{{ $akun->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('akun.reset', $akun->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reset Password Akun
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin untuk mereset password akun ini ?</p>
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

        <!-- Tambah Akun Ormawa Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('akun.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Ormawa</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Organisasi Mahasiswa</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <input type="text" name="role" value="ormawa" hidden>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</x-layout>

<script>
    // Ambil input pencarian dan tabel
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');

    searchInput.addEventListener('input', function() {
        const filter = searchInput.value.toLowerCase();
        const rows = tableBody.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const nameCell = rows[i].getElementsByTagName('td')[2]; // Kolom Nama Lengkap
            if (nameCell) {
                const nameValue = nameCell.textContent || nameCell.innerText;
                rows[i].style.display = nameValue.toLowerCase().includes(filter) ? '' : 'none';
            }
        }
    });
</script>
