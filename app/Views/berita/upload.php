<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Upload Berita</h5>

                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/upload/process') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <label for="judul" class="col-sm-3 col-form-label">Judul Berita</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="isi" class="col-sm-3 col-form-label">Isi Berita</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="isi" id="isi" rows="6" required><?= old('isi') ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gambar" class="col-sm-3 col-form-label">Gambar (Max 2MB)</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Upload Berita</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
