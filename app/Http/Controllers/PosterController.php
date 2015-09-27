<?php

namespace App\Http\Controllers;

use App\Poster;
use Carbon\Carbon;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(0);

        return view('index', compact('posters'));
    }

    public function showPoster($slug)
    {
        $poster = Poster::whereSlug($slug)->firstOrFail();

        return view('poster')->withPoster($poster);
    }
}