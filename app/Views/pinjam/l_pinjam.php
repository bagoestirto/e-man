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
                <div class="row">
                    <?php if ($halaman == 'l_pinjam') { ?>
                        <a class="btn btn-info btn-bg text-white col-md-3" href="<?= base_url('/mpinjam/c_pinjam'); ?>">
                            <i class="far fa-address-book"></i> Tambah Peminjaman Barang
                        </a>
                    <?php } ?>
                    <form action="/mpinjam/printPinKem/<?= ($halaman == 'l_pinjam') ? 'Keluar' : 'Kembali'; ?>" method="POST" class="col-md-<?= ($halaman == 'l_pinjam') ? '9' : '12'; ?> text-end d-inline" target="_blank">
                        <!-- <input type="hidden" value="<?= ($halaman == 'l_pinjam') ? 'Keluar' : 'Kembali'; ?>" name="status"> -->
                        <button type="submit" class="btn btn-success text-end btn-bg text-white" tittle="Del"><i class="fas fa-print"> Print</i></button>
                    </form>
                </div>

                <h6> </h6>
                <h5 class="card-title">Daftar Peminjaman Semua Barang</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pinjam</th>
                                <th>Username</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Kode Pegawai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            //$before = null;
                            ?>
                            <?php foreach ($pinjam as $p) : ?>
                                <?php
                                // if (($p['kode_perawatan']) != $before) :
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['kode_pinjam']; ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td><?= $p['tgl_pinjam']; ?></td>
                                    <td><?= $p['tgl_jatuh_tempo']; ?></td>
                                    <td><?= $p['nama_pegawai']; ?></td>
                                    <td><?= $p['status']; ?></td>
                                    <td>
                                        <?php if ($halaman == 'l_pinjam') { ?>
                                            <a class="btn btn-info btn-sm text-white" title="View" href="<?= base_url('/mpinjam/det_pinjam/' . $p['kode_pinjam']); ?>">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a class="btn btn-success btn-sm text-white" target="_blank" title="Print" href="<?php echo base_url('/mpinjam/cetak/' . $p['kode_pinjam']); ?>">
                                                <i class="fas fa-print"></i> Print
                                            </a>
                                            <form action="/mpinjam/dPer/" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="kode_pinjam" value="<?= $p['kode_pinjam']; ?>">
                                                <button type="submit" title="Del" class="btn btn-danger btn-sm text-white" tittle="Del" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        <?php } else { ?>
                                            <a class="btn btn-info btn-sm text-white" title="Proses Pengembalian" href="<?= base_url('/mpinjam/det_kembali/' . $p['kode_pinjam']); ?>">
                                                <i class="fas fa-arrow-alt-circle-down"></i> Proses Pengembalian
                                            </a>

                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
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