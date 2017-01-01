<?php

namespace App\Http\Controllers;

use App\Poster;

class JsonController extends Controller
{

    protected $poster;
    public function __construct(Poster $poster)
    {
        $this->poster = $poster;
    }

    public function index()
    {
        return $this->poster->all();
    }

}