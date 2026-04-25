<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        helper(['url', 'form']);
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Berita',
            'berita' => $this->beritaModel->getBerita()
        ];
        return view('berita/index', $data);
    }

    public function detail($id)
    {
        $berita = $this->beritaModel->getBerita($id);
        if (empty($berita)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $berita['judul'],
            'berita' => $berita
        ];
        return view('berita/detail', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile Pembuat'
        ];
        return view('berita/profile', $data);
    }
}
