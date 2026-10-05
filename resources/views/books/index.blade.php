@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
    <h1>Data Buku</h1>

    <ul>
        @forelse ($books as $book)
            <li>
                <a href="{{ route('books.show', $book['id']) }}">
                    {{ $book['title'] }}
                </a>
                - {{ $book['author'] }}
            </li>
        @empty
            <li>Data belum tersedia.</li>
        @endforelse
    </ul>
@endsection
