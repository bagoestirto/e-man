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
                <a class="btn btn-info btn-bg text-white" href="<?= base_url('/mperawatan/c_perawatan'); ?>">
                    <i class="far fa-address-book"></i> Tambah Perawatan Barang
                </a>
                <h6> </h6>
                <h5 class="card-title">Daftar Perawatan Semua Barang</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Perawatan</th>
                                <th>Nama Barang</th>
                                <th>Keterangan</th>
                                <th>Biaya Perawatan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            //$before = null;
                            ?>
                            <?php foreach ($perawatan as $p) : ?>
                                <?php
                                // if (($p['kode_perawatan']) != $before) :
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['tgl_perawatan']; ?></td>
                                    <td><?= $p['nama_barang']; ?></td>
                                    <td><?= $p['keterangan']; ?></td>
                                    <td><?= $p['biaya_perawatan']; ?></td>
                                    <td><?= $p['status']; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm text-white" title="View" href="<?= base_url('/mperawatan/det_perawatan/' . $p['kode_perawatan']); ?>">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <!-- <a class="btn btn-success btn-sm text-white" title="Edit" href="<?php //echo base_url('/mperawatan/e_perawatan/' . $p['kode_perawatan']);  
                                                                                                                ?>">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>-->
                                        <form action="/mperawatan/dPer/" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="kode_perawatan" value="<?= $p['kode_perawatan']; ?>">
                                            <button type="submit" title="Del" class="btn btn-danger btn-sm text-white" tittle="Del" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                                // endif;
                                //$before = $p['kode_perawatan'];
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