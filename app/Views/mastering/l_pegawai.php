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
                <a class="btn btn-info btn-bg text-white" href="<?= base_url('/mpegawai/c_pegawai'); ?>">
                    <i class="far fa-address-book"></i> Tambah Pegawai
                </a>
                <h6> </h6>
                <h5 class="card-title">Daftar Semua Pegawai</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pegawai</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pegawai as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['kode_pegawai']; ?></td>
                                    <td><?= $p['nama_pegawai']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['nomor_telepon']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm text-white" title="Edit" href="<?= base_url('/mpegawai/edit/' . $p['slug']); ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="/mpegawai/<?= $p['kode_pegawai']; ?>" method="POST" class="d-inline">
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