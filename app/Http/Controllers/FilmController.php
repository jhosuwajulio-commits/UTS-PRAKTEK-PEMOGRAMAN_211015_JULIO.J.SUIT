<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FilmController extends Controller
{
    public function index(): View
    {
        $films = [
            ['id' => 1, 'title' => 'Parasite', 'director' => 'Bong Joon-ho', 'year' => 2019],
            ['id' => 2, 'title' => 'Inception', 'director' => 'Christopher Nolan', 'year' => 2010],
            ['id' => 3, 'title' => 'Laskar Pelangi', 'director' => 'Riri Riza', 'year' => 2008],
            ['id' => 4, 'title' => 'Pengabdi Setan', 'director' => 'Joko Anwar', 'year' => 2017],
            ['id' => 5, 'title' => 'Spirited Away', 'director' => 'Hayao Miyazaki', 'year' => 2001],
        ];

        return view('films.index', compact('films'));
    }
}