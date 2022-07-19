<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <?php
            foreach ($perawatan as $perawat) {
            }
            //$nama_pegawai = $perawat['nama_pegawai'];
            ?>
            <div class="card-body">
                <h4 class="card-title"></h4>

                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Tgl Perawatan</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $perawat['tgl_perawatan']; ?></label>
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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($perawatan as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['nama_barang']; ?></td>
                                    <td><?= $p['jenis_barang']; ?></td>
                                    <td><?= $p['tgl_pembelian']; ?></td>
                                    <td><?= $p['qty']; ?></td>
                                    <td>
                                        <input type="hidden" value="<?= $p['kode_perawatan']; ?>" name="kper[]">
                                        <input type="hidden" value="<?= $p['kode_barang']; ?>" name="kbar[]">
                                        <select class="select2 form-select shadow-none" name="status[]" required>
                                            <option value="">Pilih Barang</option>
                                            <option value="proses" <?= ($p['status'] == 'proses') ? 'selected' : '' ?>>Dalam Proses</option>
                                            <option value="selesai" <?= ($p['status'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                                            <option value="batal" <?= ($p['status'] == 'batal') ? 'selected' : '' ?>>Batal</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <div class="card-body">
                            <input type="submit" value="Submit" class="btn btn-primary">
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