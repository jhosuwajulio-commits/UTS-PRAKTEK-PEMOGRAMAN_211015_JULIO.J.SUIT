@extends('layouts.app')

@section('title', 'Data Film')

@section('content')
    <h1>Data Film</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Sutradara</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($films as $film)
                <tr>
                    <td>{{ $film['id'] }}</td>
                    <td>{{ $film['title'] }}</td>
                    <td>{{ $film['director'] }}</td>
                    <td>{{ $film['year'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection