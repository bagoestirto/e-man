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
                <a class="btn btn-info btn-bg text-white" href="<?= base_url('/mtrans/c_lokasi'); ?>">
                    <i class="far fa-address-book"></i> Tambah Lokasi Barang
                </a>
                <h6> </h6>
                <h5 class="card-title">Daftar Lokasi Semua Barang</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Lokasi</th>
                                <th>Nama Pegawai</th>
                                <th>Nama Lokasi</th>
                                <th>Titik Koordinat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            //$before = null;
                            ?>
                            <?php foreach ($lokasi as $p) : ?>
                                <?php
                                // if (($p['kode_lokasi']) != $before) :
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['kode_lokasi']; ?></td>
                                    <td><?= $p['nama_pegawai']; ?></td>
                                    <td><?= $p['nama_lokasi']; ?></td>
                                    <td><?= $p['titik_koordinat']; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm text-white" title="View" href="<?= base_url('/mtrans/det_lokasi/' . $p['kode_lokasi']); ?>">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a class="btn btn-success btn-sm text-white" title="Edit" href="<?= base_url('/mtrans/e_lokasi/' . $p['kode_lokasi']); ?>">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <form action="/mtrans/dLokasi/" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="kode_lokasi" value="<?= $p['kode_lokasi']; ?>">
                                            <button type="submit" title="Del" class="btn btn-danger btn-sm text-white" tittle="Del" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                                // endif;
                                //$before = $p['kode_lokasi'];
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>