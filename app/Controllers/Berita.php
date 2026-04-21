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

    public function upload()
    {
        $data = [
            'title' => 'Upload Berita'
        ];
        return view('berita/upload', $data);
    }

    public function process_upload()
    {
        if (!$this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->to('/upload')->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaGambar);

        $this->beritaModel->insert([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/')->with('success', 'Berita berhasil diupload.');
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile Pembuat'
        ];
        return view('berita/profile', $data);
    }
}
