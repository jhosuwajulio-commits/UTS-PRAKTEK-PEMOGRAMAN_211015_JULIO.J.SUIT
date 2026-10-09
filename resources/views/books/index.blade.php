@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
<style>
    .container-buku {
        max-width: 900px;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }

    /* Form Pencarian */
    .search-box {
        margin-bottom: 20px;
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .search-box input[type="search"] {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 300px;
    }

    /* Table Styling */
    .table-buku {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table-buku th, 
    .table-buku td {
        padding: 10px 12px;
        border-bottom: 1px solid #e0e0e0;
        text-align: left;
    }

    .table-buku th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    .table-buku tr:hover {
        background-color: #f9f9f9;
    }

    /* Action Buttons */
    .action-cell {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-search { background: #007bff; color: white; }
    .btn-reset { background: #6c757d; color: white; }
    .btn-detail { background: #17a2b8; color: white; }
    .btn-delete { background: #dc3545; color: white; }

    /* Pagination */
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }
</style>

<div class="container-buku">
    <h1>Data Buku</h1>

    <form method="GET" action="{{ route('books.index') }}" class="search-box">
        <input
            type="search"
            name="q"
            value="{{ $keyword }}"
            placeholder="Cari judul, penulis, atau ISBN"
        >
        <button type="submit" class="btn btn-search">Cari</button>
        <a href="{{ route('books.index') }}" class="btn btn-reset">Reset</a>
    </form>

    <table class="table-buku">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author ?? '-' }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <div class="action-cell">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-detail">Detail</a>
                            <form
                                method="POST"
                                action="{{ route('books.destroy', $book) }}"
                                onsubmit="return confirm('Hapus data buku ini?')"
                                style="margin: 0;"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                             <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($books->hasPages())
        <nav class="pagination-container">
            <div>
                @if ($books->onFirstPage())
                    <span>Sebelumnya</span>
                @else
                    <a href="{{ $books->previousPageUrl() }}">Sebelumnya</a>
                @endif
            </div>
    
            <span>
                Halaman {{ $books->currentPage() }} dari {{ $books->lastPage() }}
            </span>

            <div>
                @if ($books->hasMorePages())
                    <a href="{{ $books->nextPageUrl() }}">Berikutnya</a>
                @else
                    <span>Berikutnya</span>
                @endif
            </div>
        </nav>
    @endif
</div>
@endsection
