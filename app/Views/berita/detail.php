<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card mb-4">
            <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800" class="card-img-top" alt="Teknologi AI">
            <div class="card-body">
                <h2 class="card-title">Teknologi AI Semakin Berkembang Pesat di Tahun 2026</h2>
                <div class="text-muted mb-3">
                    <i class="bi bi-calendar"></i> 24 April 2026
                </div>
                <div class="card-text" style="white-space: pre-line;">
                    Kecerdasan buatan (AI) kini telah menjadi bagian tak terpisahkan dari kehidupan kita sehari-hari. Mulai dari asisten virtual, sistem rekomendasi, hingga mobil otonom. Di tahun 2026, perkembangannya bahkan lebih pesat.
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('/') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
