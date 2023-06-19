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
                <a class="btn btn-info btn-bg text-white" href="<?= base_url('/mpakai/c_pakai'); ?>">
                    <i class="far fa-address-book"></i> Tambah Pemakaian Barang
                </a>
                <h6> </h6>
                <h5 class="card-title">Daftar Pemakaian Semua Barang</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pakai</th>
                                <th>Nama Pegawai</th>
                                <th>Tanggal</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            //$before = null;
                            ?>
                            <?php foreach ($pakai as $p) : ?>
                                <?php
                                // if (($p['kode_lokasi']) != $before) :
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['kode_pakai']; ?></td>
                                    <td><?= $p['nama_pegawai']; ?></td>
                                    <td><?= $p['tgl']; ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm text-white" title="View" href="<?= base_url('/mpakai/det_pakai/' . $p['kode_pakai']); ?>">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <!-- <a class="btn btn-success btn-sm text-white" title="Edit" href="<?php //echo base_url('/mpakai/e_lokasi/' . $p['kode_pakai']);  
                                                                                                                ?>">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>-->
                                        <form action="/mpakai/dPakai/" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="kode_pakai" value="<?= $p['kode_pakai']; ?>">
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