<?php

namespace App\Http\Controllers;

use App\Poster;
use Carbon\Carbon;

class PosterController extends Controller
{

    protected $poster;
    public function __construct(Poster $poster)
    {
        $this->poster = $poster;
    }

    public function index()
    {

        $posters = $this->poster->all();

        //dd(compact('posters'));

//        return View::make('index')
//            ->with('posters', $posters)
//            ->orderBy('published_at', 'desc');


//        $posters = Poster::where('published_at', '<=', Carbon::now())
//            ->orderBy('published_at', 'desc')
//            ->paginate(0);

        //return view('index', compact('posters'));
        return view('index')->withPosters($posters);
    }

    public function showPoster($slug)
    {
        $poster = Poster::whereSlug($slug)->firstOrFail();

        return view('poster')->withPoster($poster);
    }
}