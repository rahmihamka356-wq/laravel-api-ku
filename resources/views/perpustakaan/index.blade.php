<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Perpustakaan - NIM 131</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="text-primary">Sistem Manajemen Perpustakaan</h2>
                <hr>
                <p>Nama: <strong>Rahmi Hamka</strong></p>
                <p>NIM: <strong>60200124131</strong></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">Input Data Buku</div>
                    <div class="card-body">
                        <form action="{{ route('perpustakaan.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label>Kode Buku</label>
                                <input type="text" name="kode_buku" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Judul Buku</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Kategori</label>
                                <input type="text" name="kategori" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Penulis</label>
                                <input type="text" name="penulis" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 mt-2">Simpan Buku</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Daftar Koleksi Buku</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->kode_buku }}</td>
                                    <td>{{ $book->judul }}</td>
                                    <td>{{ $book->kategori }}</td>
                                    <td>{{ $book->penulis }}</td>
                                    <td>{{ $book->stok }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>