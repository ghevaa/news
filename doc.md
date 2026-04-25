4 Routes
https://www.notion.so/april-ns/Codeigniter4-Routes-b74976d8abe34022a607dbe6d1979939?pvs=4

5 Layout
https://www.notion.so/april-ns/Codeigniter4-Layout-7543f79c76b1498080d4d1f7cdc29918?pvs=4

# Penjelasan Konsep MVC (Model-View-Controller) — Proyek Website Berita

Arsitektur aplikasi ini menggunakan pola MVC (Model-View-Controller) dari framework **CodeIgniter 4**. Kode dipisahkan menjadi tiga peran utama agar lebih terstruktur, mudah dikelola, dan mudah dikembangkan.

Proyek ini menyimpan data berita secara **statis (hardcoded)** untuk keperluan demonstrasi UI, menggunakan template **NiceAdmin** untuk tampilan, dan memiliki fitur: daftar berita, detail berita, dan halaman profil.

---

## 1. Model (M) — `app/Models/BeritaModel.php`

**Deskripsi:**
Model bertugas mengelola semua urusan **data**. Dalam proyek ini, `BeritaModel` menyimpan data berita di dalam bentuk *array statis (hardcoded)* di dalam class. Model tidak tahu dan tidak peduli bagaimana data akan ditampilkan — ia murni hanya mengurus penyediaan data.

**Kode Asli Proyek:**
```php
<?php

namespace App\Models;

class BeritaModel
{
    private $data = [
        [
            'id' => 1,
            'judul' => 'Teknologi AI Semakin Berkembang Pesat di Tahun 2026',
            'isi' => 'Kecerdasan buatan (AI) kini telah menjadi bagian tak terpisahkan dari kehidupan kita sehari-hari. Mulai dari asisten virtual, sistem rekomendasi, hingga mobil otonom. Di tahun 2026, perkembangannya bahkan lebih pesat.',
            'gambar' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800',
            'created_at' => '2026-04-20 10:00:00'
        ],
        [
            'id' => 2,
            'judul' => 'Menjaga Kesehatan Mental di Era Digital',
            'isi' => 'Di era yang serba digital dan serba cepat ini, menjaga kesehatan mental adalah hal yang krusial. Beberapa ahli merekomendasikan detoks digital secara berkala.',
            'gambar' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=800',
            'created_at' => '2026-04-22 14:30:00'
        ],
        [
            'id' => 3,
            'judul' => 'Eksplorasi Luar Angkasa: Misi Mars Terbaru',
            'isi' => 'Badan antariksa dunia baru saja meluncurkan misi terbarunya ke planet merah. Misi ini diharapkan dapat menemukan tanda-tanda kehidupan mikroba di masa lampau.',
            'gambar' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=800',
            'created_at' => '2026-04-24 09:15:00'
        ]
    ];

    public function getBerita($id = false)
    {
        if ($id === false) {
            $sortedData = $this->data;
            usort($sortedData, function($a, $b) {
                return strtotime($b['created_at']) <=> strtotime($a['created_at']);
            });
            return $sortedData;
        }

        foreach ($this->data as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }

        return null;
    }
}
```

**Alur dalam Model:**
1. Model dipanggil oleh **Controller** (misal: `$this->beritaModel->getBerita()`).
2. Jika dipanggil tanpa parameter `$id`, method `getBerita()` akan mengambil seluruh isi array statis `$data`, mengurutkannya dari terbaru, lalu mengembalikannya.
3. Jika dipanggil dengan `$id`, method akan mencari satu berita yang ID-nya cocok dalam array tersebut.
4. Hasil data dikembalikan ke **Controller** yang memanggilnya.

---

## 2. View (V) — `app/Views/berita/index.php` & `app/Views/layout/template.php`

**Deskripsi:**
View bertugas menampilkan **antarmuka pengguna** (halaman web). Dalam proyek ini, View menggunakan sistem **Layout** dari CodeIgniter 4 — ada file `template.php` sebagai kerangka utama (berisi header, sidebar, footer dari NiceAdmin), dan file-file konten seperti `index.php` dan `detail.php` yang mengisi bagian tengah template tersebut. View hanya menampilkan data yang sudah dikirim oleh Controller.

**Kode Asli Proyek — Layout Template (`app/Views/layout/template.php`):**
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $title ?? 'Website Berita' ?></title>

  <!-- CSS NiceAdmin -->
  <link href="<?= base_url('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>

  <?= $this->include('layout/header') ?>   <!-- Menyisipkan header -->
  <?= $this->include('layout/sidebar') ?>  <!-- Menyisipkan sidebar -->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?= $title ?? 'Dashboard' ?></h1>
    </div>

    <section class="section">
        <?= $this->renderSection('content') ?>  <!-- DI SINILAH konten dari View anak disisipkan -->
    </section>
  </main>

  <?= $this->include('layout/footer') ?>   <!-- Menyisipkan footer -->

  <!-- JS NiceAdmin -->
  <script src="<?= base_url('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('NiceAdmin/assets/js/main.js') ?>"></script>

</body>
</html>
```

**Kode Asli Proyek — Halaman Daftar Berita (`app/Views/berita/index.php`):**
```php
<?= $this->extend('layout/template') ?>  <!-- Menggunakan template sebagai kerangka -->

<?= $this->section('content') ?>  <!-- Mulai mengisi bagian 'content' di template -->
<div class="row">
    <div class="col-lg-12">
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php foreach($berita as $b): ?>  <!-- Looping data berita dari Controller -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= $b['gambar'] ?>" class="card-img-top" 
                         alt="<?= htmlspecialchars($b['judul']) ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($b['judul']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars(substr($b['isi'], 0, 100)) ?>...</p>
                        <p class="card-text"><small class="text-muted">
                            <?= date('d M Y H:i', strtotime($b['created_at'])) ?>
                        </small></p>
                        <a href="<?= base_url('berita/' . $b['id']) ?>" class="btn btn-primary mt-auto">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if(empty($berita)): ?>
            <div class="col-12">
                <div class="alert alert-info">Belum ada berita.</div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>  <!-- Selesai mengisi bagian 'content' -->
```

**Alur dalam View:**
1. View tidak pernah berjalan sendiri. Ia dipanggil oleh **Controller** melalui perintah `return view('berita/index', $data)`.
2. File `berita/index.php` pertama-tama "meng-extend" (mewarisi) layout dari `layout/template.php` — artinya ia akan mendapatkan kerangka HTML lengkap (header, sidebar, footer NiceAdmin).
3. Bagian konten spesifik halaman ditulis di dalam blok `$this->section('content')` ... `$this->endSection()`.
4. Di dalam blok tersebut, View menerima variabel `$berita` (yang dikirim Controller) dan melakukan `foreach` untuk menampilkan setiap berita dalam bentuk kartu (card) Bootstrap.
5. Hasil render gabungan (template + konten) dikirim kembali ke browser pengguna sebagai halaman web utuh.

---

## 3. Controller (C) — `app/Controllers/Berita.php`

**Deskripsi:**
Controller adalah **otak pengatur alur** aplikasi. Ia menjadi penghubung antara permintaan pengguna (URL yang diakses), pengambilan data melalui Model, dan penampilan hasil melalui View. Dalam proyek ini, `Berita` Controller menangani halaman: daftar berita, detail, dan profil.

**Kode Asli Proyek:**
```php
<?php

namespace App\Controllers;

use App\Models\BeritaModel;  // <-- Memuat (import) Model

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        // Membuat instance Model saat Controller pertama kali dipanggil
        $this->beritaModel = new BeritaModel();
        helper(['url', 'form']);  // Memuat helper bawaan CI4
    }

    // ===== METHOD 1: Halaman Daftar Berita (route: /) =====
    public function index()
    {
        $data = [
            'title'  => 'Daftar Berita',
            'berita' => $this->beritaModel->getBerita()  // Minta semua data ke Model
        ];
        return view('berita/index', $data);  // Kirim data ke View
    }

    // ===== METHOD 2: Halaman Detail Berita (route: /berita/(:num)) =====
    public function detail($id)
    {
        $berita = $this->beritaModel->getBerita($id);  // Minta 1 berita spesifik ke Model
        if (empty($berita)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'  => $berita['judul'],
            'berita' => $berita
        ];
        return view('berita/detail', $data);  // Kirim ke View detail
    }

    // ===== METHOD 3: Halaman Profil (route: /profile) =====
    public function profile()
    {
        $data = [
            'title' => 'Profile Pembuat'
        ];
        return view('berita/profile', $data);
    }
}
```

**Alur dalam Controller:**
1. Pengguna mengakses URL (misal: `localhost:8080/`). **Router** (di `app/Config/Routes.php`) mengarahkan permintaan ini ke method `Berita::index()`.
2. Di dalam `__construct()`, Controller langsung membuat instance **Model** (`new BeritaModel()`) agar siap digunakan di semua method.
3. Method `index()` meminta data ke **Model** melalui `$this->beritaModel->getBerita()` — Model mengembalikan array data statis.
4. Controller menyiapkan array `$data` berisi judul halaman dan data berita, lalu melemparkannya ke **View** melalui `return view('berita/index', $data)`.

---

## Bonus: Router — `app/Config/Routes.php`

Router adalah komponen tambahan yang bertugas **mengarahkan URL ke Controller yang tepat**. Ia menentukan URL mana akan dihandle oleh method apa.

**Kode Asli Proyek:**
```php
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Berita::index');                    // Halaman utama → method index()
$routes->get('/berita/(:num)', 'Berita::detail/$1');   // Detail berita → method detail($id)
$routes->get('/profile', 'Berita::profile');            // Halaman profil → method profile()
```

---

## Simpulan Alur Keseluruhan MVC di Proyek Ini

Berikut skenario lengkap saat pengguna membuka halaman utama (`localhost:8080/`):

1. **Pengguna** mengetik `localhost:8080/` di browser.
2. **Router** (`Routes.php`) mencocokkan URL `/` dan mengarahkannya ke `Berita::index()`.
3. **Controller** (`Berita.php`) method `index()` dijalankan. Ia memanggil `$this->beritaModel->getBerita()`.
4. **Model** (`BeritaModel.php`) mengambil array data berita secara statis, mengurutkan dari terbaru, lalu mengembalikan hasilnya ke Controller.
5. **Controller** menerima array data berita tersebut, membungkusnya dalam `$data`, dan memanggil `return view('berita/index', $data)`.
6. **View** (`berita/index.php`) meng-extend `layout/template.php` (akan mendapat header, sidebar, footer NiceAdmin), lalu melakukan `foreach` pada variabel `$berita` untuk menampilkan setiap berita sebagai kartu (card).
7. **Pengguna** melihat halaman web lengkap berisi daftar berita di browsernya.
