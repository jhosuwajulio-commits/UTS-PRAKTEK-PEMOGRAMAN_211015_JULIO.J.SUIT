@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-bold">Edit Data Buku</h5>
                    <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-dark">Kembali</a>
                </div>
                <div class="card-body p-4">

                    {{-- Pesan Validasi Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Edit Buku --}}
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Input Judul Buku --}}
                        {{-- <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul Buku</label>
                            <input type="text" 
                                   name="judul" 
                                   id="judul" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $book->judul) }}" 
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- Input Penulis --}}
                        <div class="mb-3">
                            <label for="penulis" class="form-label fw-semibold">Penulis</label>
                            <input type="text" 
                                   name="penulis" 
                                   id="penulis" 
                                   class="form-control @error('penulis') is-invalid @enderror" 
                                   value="{{ old('penulis', $book->penulis) }}" 
                                   required>
                            @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Stok --}}
                        <div class="mb-4">
                            <label for="stok" class="form-label fw-semibold">Stok Buku</label>
                            <input type="number" 
                                   name="stok" 
                                   id="stok" 
                                   class="form-control @error('stok') is-invalid @enderror" 
                                   value="{{ old('stok', $book->stok) }}" 
                                   required 
                                   min="0">
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection