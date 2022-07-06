<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
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
                                        <a class="btn btn-success btn-sm text-white" title="Edit" href="<?= base_url('/mpegawai/' . $p['slug']); ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" title="Del" onclick="return confirm('Are you sure you want to delete?')" href="<?= base_url('/mpegawai/' . $p['slug']); ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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