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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lokasi as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p->kode_lokasi; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-success btn-sm text-white" title="Edit" href="<?php // echo base_url('/mbarang/edit/' . $p['slug_barang']); 
                                                                                                        ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="/mbarang/<? //echo $p['id_barang']; 
                                                                ?>" method="POST" class="d-inline">
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