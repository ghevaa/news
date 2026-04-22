<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-4 mx-auto">
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="<?= base_url('NiceAdmin/assets/img/foto.jpeg') ?>" alt="Profile" class="rounded-circle" style="width: 120px; height: auto;">
                <h2>Mahasiswa udinus</h2>
                <h3>Alex, Ghevary, Ghivary</h3>
                <div class="social-links mt-2">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            
            <div class="card-body">
                <hr>
                <h5 class="card-title">Tentang</h5>
                <p class="small fst-italic">Kami mahasiswa Universitas Dian Nuswantoro
                    yang bernama : 
                    <br> Alexander Bangkit Sugiharto Pranoto (A11.2024.16046) <br>
                    Ghevary Pappo Suprapto (A11.2024.16051) <br>
                    Ghivary Pappo Suprapto (A11.2024.16050) <br>

                </p>
                
                <h5 class="card-title">Detail Proyek</h5>
                <div class="row">
                  <div class="col-lg-5 col-md-6 label text-muted">Deskripsi</div>
                  <div class="col-lg-7 col-md-6">Projek berita mvc menggunakan ci4 dan tampilan antarmuka dari template NiceAdmin.</div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-5 col-md-6 label text-muted">Aplikasi</div>
                  <div class="col-lg-7 col-md-6">Portal Berita MVC</div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-5 col-md-6 label text-muted">Framework</div>
                  <div class="col-lg-7 col-md-6">CodeIgniter 4</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
