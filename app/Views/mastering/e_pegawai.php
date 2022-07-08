<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/mpegawai/update/' . $pegawai['kode_pegawai']); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $pegawai['slug']; ?>">
                <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>

                    <div class="form-group row">
                        <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Kode Pegawai</label>
                        <div class="col-sm-9">
                            <input value="<?= $pegawai['kode_pegawai']; ?>" type="text" readonly class="form-control <?= ($validation->hasError('kpeg')) ? 'is-invalid' : ''; ?>" id="kpeg" name="kpeg" placeholder="Kode Pegawai" autofocus />
                            <div class="invalid-feedback"><?= $validation->getError('kpeg'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npeg" class="col-sm-3 text-end control-label col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input value="<?= (old('npeg')) ? old('npeg') : $pegawai['nama_pegawai']; ?>" type="text" class="form-control <?= ($validation->hasError('npeg')) ? 'is-invalid' : ''; ?>" id="npeg" name="npeg" placeholder="Nama Pegawai" />
                            <div class="invalid-feedback"><?= $validation->getError('npeg'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat"><?= (old('alamat')) ? old('alamat') : $pegawai['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notelp" class="col-sm-3 text-end control-label col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input value="<?= (old('notelp')) ? old('notelp') : $pegawai['nomor_telepon']; ?>" type="text" class="form-control" id="notelp" name="notelp" placeholder="Nomor Telepon" />
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>