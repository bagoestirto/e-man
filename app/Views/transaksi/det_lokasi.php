<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <?php
            foreach ($lokasi as $detLok) {
            }
            //$nama_pegawai = $detLok['nama_pegawai'];
            ?>
            <div class="card-body">
                <h4 class="card-title"></h4>

                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Nama Pegawai</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $detLok['nama_pegawai']; ?></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Nama Lokasi</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $detLok['nama_lokasi']; ?></label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Titik Koordinat</label>
                    <div class="col-sm-9">
                        <label class="col-sm-1 text-center control-label col-form-label">:</label>
                        <label class="col-sm-8 control-label col-form-label"><?= $detLok['titik_koordinat']; ?></label>
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
                <table id="" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Kode Sumberdana</th>
                            <th>Tgl Pembelian</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lokasi as $p) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $p['kode_barang']; ?></td>
                                <td><?= $p['nama_barang']; ?></td>
                                <td><?= $p['jenis_barang']; ?></td>
                                <td><?= $p['merk']; ?></td>
                                <td><?= $p['type']; ?></td>
                                <td><?= $p['kode_sumberdana']; ?></td>
                                <td><?= $p['tgl_pembelian']; ?></td>
                                <td><?= $p['kondisi']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>