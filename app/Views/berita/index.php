<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php foreach($berita as $b): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= $b['gambar'] ?>" class="card-img-top" alt="<?= htmlspecialchars($b['judul']) ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($b['judul']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars(substr($b['isi'], 0, 100)) ?>...</p>
                        <p class="card-text"><small class="text-muted"><?= date('d M Y H:i', strtotime($b['created_at'])) ?></small></p>
                        <a href="<?= base_url('berita/' . $b['id']) ?>" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
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
<?= $this->endSection() ?>
