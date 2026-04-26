<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800" class="card-img-top" alt="Teknologi AI" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Teknologi AI Semakin Berkembang Pesat di Tahun 2026</h5>
                        <p class="card-text">Kecerdasan buatan (AI) kini telah menjadi bagian tak terpisahkan dari kehidupan kita sehari-hari...</p>
                        <p class="card-text"><small class="text-muted">24 Apr 2026 09:15</small></p>
                        <a href="<?= base_url('berita/detail') ?>" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
