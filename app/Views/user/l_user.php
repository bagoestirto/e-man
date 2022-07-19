<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-info btn-bg text-white" href="<?= base_url('/muser/c_user'); ?>">
                    <i class="far fa-address-book"></i> Tambah User
                </a>
                <h6></h6>
                <h5 class="card-title">Daftar Semua User</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $u) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $u['nama_user']; ?></td>
                                    <td><?= $u['username']; ?></td>
                                    <td><?= $u['jabatan']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm text-white" title="Edit" href="<?= base_url('/muser/edit/' . $u['id_user']); ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="/muser/<?= $u['id_user']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm text-white" tittle="Del" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>