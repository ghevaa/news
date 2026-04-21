<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card mb-4">
            <img src="<?= base_url('uploads/' . $berita['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($berita['judul']) ?>">
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($berita['judul']) ?></h2>
                <div class="text-muted mb-3">
                    <i class="bi bi-calendar"></i> <?= date('d F Y', strtotime($berita['created_at'])) ?>
                </div>
                <div class="card-text" style="white-space: pre-line;">
                    <?= htmlspecialchars($berita['isi']) ?>
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('/') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
