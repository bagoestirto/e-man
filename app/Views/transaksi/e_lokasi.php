<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<form class="form-horizontal" action="<?= base_url('/mtrans/s_lokasi'); ?>" method="POST">
    <?= csrf_field(); ?>

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
                            <select class="select2 form-select shadow-none" name="kpeg" required>
                                <option value="" selected disabled>Select</option>
                                <?php foreach ($pegawai as $peg) : ?>
                                    <option value="<?= $peg['kode_pegawai']; ?>" <?= ($peg['kode_pegawai'] == $detLok['kode_pegawai']) ? "selected" : "" ?>><?= $peg['nama_pegawai']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Nama Lokasi</label>
                        <div class="col-sm-9">
                            <input required value="<?= $detLok['nama_lokasi']; ?>" type="text" class="form-control" id="nlok" name="nlok" placeholder="Nama Lokasi" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Titik Koordinat</label>
                        <div class="col-sm-9">
                            <input required value="<?= $detLok['titik_koordinat']; ?>" type="text" class="form-control" id="nlok" name="nlok" placeholder="Nama Lokasi" />

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
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Merk</th>
                                <th>Tipe</th>
                                <th>Kode Sumberdana</th>
                                <th>Tgl Pembelian</th>
                                <th>Kondisi</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lokasi as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['nama_barang']; ?></td>
                                    <td><?= $p['jenis_barang']; ?></td>
                                    <td><?= $p['merk']; ?></td>
                                    <td><?= $p['type']; ?></td>
                                    <td><?= $p['kode_sumberdana']; ?></td>
                                    <td><?= $p['tgl_pembelian']; ?></td>
                                    <td><?= $p['kondisi']; ?></td>
                                    <td><?= $p['qty']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>