<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/muser/update/' . $user['id_user']); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>

                    <div class="form-group row">
                        <label for="nama_user" class="col-sm-3 text-end control-label col-form-label">Nama User</label>
                        <div class="col-sm-9">
                            <input value="<?= (old('nama_user')) ? old('nama_user') : $user['nama_user']; ?>" type="text" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" id="nama_user" name="nama_user" placeholder="Nama User" autofocus required />
                            <div class="invalid-feedback"><?= $validation->getError('nama_user'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 text-end control-label col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input value="<?= (old('username')) ? old('username') : $user['username']; ?>" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username" required />
                            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input value="" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password" required />
                            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confpassword" class="col-sm-3 text-end control-label col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input value="" type="password" class="form-control <?= ($validation->hasError('confpassword')) ? 'is-invalid' : ''; ?>" id="confpassword" name="confpassword" placeholder="Konfirmasi Password" required />
                            <div class="invalid-feedback"><?= $validation->getError('confpassword'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-3 text-end control-label col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none" id="jabatan" name="jabatan" required>
                                <option value="">Pilih Jabatan</option>
                                <option value="Admin" <?= (old('jabatan') == "Admin" or $user['jabatan'] == "Admin") ? "selected" : ""; ?>>Administrator</option>
                                <option value="Kepala" <?= (old('jabatan') == "Kepala" or $user['jabatan'] == "Kepala") ? "selected" : ""; ?>>Kepala</option>
                            </select>
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