<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <!-- CDN Bootstrap 5 untuk tampilan rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Daftar Data Film</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Judul Film</th>
                            <th scope="col">Sutradara</th>
                            <th scope="col">Tahun Rilis</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Perulangan data $films menggunakan directives @forelse --}}
                        @forelse ($films as $film)
                            <tr>
                                <td>{{ $film['id'] }}</td>
                                <td class="fw-bold">{{ $film['judul'] }}</td>
                                <td>{{ $film['sutradara'] }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $film['tahun'] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Data film tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>