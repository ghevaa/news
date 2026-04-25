<?php

namespace App\Controllers;

class Berita extends BaseController
{
    public function index()
    {
        return view('berita/index');
    }

    public function detail()
    {
        return view('berita/detail');
    }

    public function profile()
    {
        return view('berita/profile');
    }
}
