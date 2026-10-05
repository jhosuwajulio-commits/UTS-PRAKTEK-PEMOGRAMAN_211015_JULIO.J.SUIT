<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = [
            [
                'id' => 1,
                'title' => 'Dasar Pemrograman Web',
                'author' => 'julio Pratama',
            ],
            [
                'id' => 2,
                'title' => 'Basis Data Terapan',
                'author' => 'lionel ando',
            ],
        ];

        return view('books.index', compact('books'));
    }

    public function show(int $id): View
    {
        return view('books.show-static', ['id' => $id]);
    }
}
