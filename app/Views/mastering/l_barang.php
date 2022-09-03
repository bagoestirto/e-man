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
                <a class="btn btn-info btn-bg text-white" href="<?= base_url('/mbarang/c_barang'); ?>">
                    <i class="far fa-address-book"></i> Tambah Barang
                </a>
                <a class="btn btn-success btn-bg text-white" style="margin-right: 50%;" href="<?= base_url('/mbarang/a_barang'); ?>">
                    <i class="far fa-address-book"></i> Tambah Stok Barang
                </a>

                <!-- <form action="/mbarang/printBarang" method="GET" class="text-end d-inline" target="_blank">
                    <select onchange="getPrint(this)" class="select2 shadow-none" name="jenis_barang" required>
                        <option value="">Pilih Barang</option>
                        <option value="Aset Tetap">Aset Tetap</option>
                        <option value="Habis Pakai">Habis Pakai</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-bg text-white" tittle="Del"><i class="fas fa-print"> Print</i></button>
                </form> -->

                <h6> </h6>
                <h5 class="card-title">Daftar Semua Barang</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok Barang</th>
                                <th>Jenis Barang</th>
                                <th>Merk</th>
                                <th>Tipe</th>
                                <th>Kode Sumberdana</th>
                                <th>Tgl Pembelian</th>
                                <th>Satuan</th>
                                <th>Kondisi</th>
                                <th>Harga</th>
                                <?php if ($hapus == 'bukan') { ?> <th>Action</th><?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($barang as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['kode_barang']; ?></td>
                                    <td><?= $p['nama_barang']; ?></td>
                                    <td><?= $p['stok_barang']; ?></td>
                                    <td><?= $p['jenis_barang']; ?></td>
                                    <td><?= $p['merk']; ?></td>
                                    <td><?= $p['type']; ?></td>
                                    <td><?= $p['kode_sumberdana']; ?></td>
                                    <td><?= $p['tgl_pembelian']; ?></td>
                                    <td><?= $p['satuan']; ?></td>
                                    <td><?= $p['kondisi']; ?></td>
                                    <td><?= $p['harga']; ?></td>
                                    <?php if ($hapus == 'bukan') { ?>
                                        <td>
                                            <a class="btn btn-success btn-sm text-white" title="Edit" href="<?= base_url('/mbarang/edit/' . $p['id_barang']); ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <?php if ($p['jenis_barang'] == 'Aset Tetap') { ?>
                                                <a class="btn btn-danger btn-sm text-white" title="Edit" href="<?= base_url('/mbarang/delaset/' . $p['id_barang']); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            <?php } else { ?>
                                                <form action="/mbarang/<?= $p['id_barang']; ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm text-white" tittle="Del" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            <?php } ?>
                                        </td>
                                    <?php } ?>
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