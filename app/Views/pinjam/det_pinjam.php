<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <?php
            foreach ($pinjam as $pinjami) {
            }
            //$nama_pegawai = $perawat['nama_pegawai'];
            ?>
            <div class="card-body">
                <h4 class="card-title"></h4>

                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Kode Pinjam</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $pinjami['kode_pinjam']; ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Username</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $pinjami['username']; ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $pinjami['tgl_pinjam']; ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Tgl Jatuh Tempo</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $pinjami['tgl_jatuh_tempo']; ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Nama Peminjam</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $pinjami['nama_pegawai']; ?></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Status</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $pinjami['status']; ?></label>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6> </h6>
                <h5 class="card-title">Daftar Barang</h5>
                <form action="<?= base_url('/mperawatan/s_det_per'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Tgl Pembelian</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pinjam as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['nama_barang']; ?></td>
                                    <td><?= $p['jenis_barang']; ?></td>
                                    <td><?= $p['tgl_pembelian']; ?></td>
                                    <td><?= $p['jumlah']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <div class="card-body">
                            <?php if ($halaman == 'det_pinjam') { ?>
                                <a class="btn btn-primary btn-bg text-white" target="_blank" href="<?= base_url('/mpinjam/generate/' . $pinjami['kode_pinjam']); ?>">
                                    <i class="fas fa-print"></i> Print PDF
                                </a>
                            <?php } else { ?>
                                <form action="/mpinjam/s_kembali/" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="kode_pinjam" value="<?= $p['kode_pinjam']; ?>">
                                    <button type="submit" title="Del" class="btn btn-danger btn-lg text-white" tittle="Del" onclick="return confirm('Apakah anda yakin, akan memproses data pengembalian?')"><i class="fas fa-arrow-alt-circle-down"> Proses Pengembalian</i></button>
                                </form>
                            <?php } ?>
                            <!-- <a type="submit" value="Submit" class="btn btn-primary"> -->
                            <!-- Submit
                        </button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>