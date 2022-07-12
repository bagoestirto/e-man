<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/mbarang/update/' . $barang['id_barang']); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug_barang" value="<?= $barang['slug_barang']; ?>">
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <div class="form-group row">
                        <label for="kbar" class="col-sm-3 text-end control-label col-form-label">Kode Barang</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('kbar')) ? old('kbar') : $barang['kode_barang']; ?>" type="text" class="form-control <?= ($validation->hasError('kbar')) ? 'is-invalid' : ''; ?>" id="kbar" name="kbar" placeholder="Kode Barang" autofocus />
                            <div class="invalid-feedback"><?= $validation->getError('kbar'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('nbar')) ? old('nbar') : $barang['nama_barang']; ?>" type="text" class="form-control <?= ($validation->hasError('nbar')) ? 'is-invalid' : ''; ?>" id="nbar" name="nbar" placeholder="Nama Barang" />
                            <div class="invalid-feedback"><?= $validation->getError('nbar'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 text-end control-label col-form-label">Stok Barang</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('stok')) ? old('stok') : $barang['stok_barang']; ?>" type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" placeholder="Stok Barang" />
                            <div class="invalid-feedback"><?= $validation->getError('stok'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jbar" class="col-sm-3 text-end control-label col-form-label">Jenis Barang</label>
                        <div class="col-md-9">
                            <select class="select2 form-select shadow-none" name="jbar" required>
                                <option>Select</option>
                                <option value="Aset Tetap" <?= (old('jbar') == "Aset Tetap" or $barang['jenis_barang'] == "Aset Tetap") ? "selected" : ""; ?>>Aset Tetap</option>
                                <option value="Habis Pakai" <?= (old('jbar') == "Habis Pakai" or $barang['jenis_barang'] == "Habis Pakai") ? "selected" : ""; ?>>Habis Pakai</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk" class="col-sm-3 text-end control-label col-form-label">Merk</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('merk')) ? old('merk') : $barang['merk']; ?>" type="text" class="form-control <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merk" name="merk" placeholder="Merk" />
                            <div class="invalid-feedback"><?= $validation->getError('merk'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-3 text-end control-label col-form-label">Tipe</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('type')) ? old('type') : $barang['type']; ?>" type="text" class="form-control <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" id="type" name="type" placeholder="Tipe" />
                            <div class="invalid-feedback"><?= $validation->getError('type'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ksum" class="col-sm-3 text-end control-label col-form-label">Kode Sumberdana</label>
                        <div class="col-md-9">
                            <select class="select2 form-select shadow-none" name="ksum" required>
                                <option>Select</option>
                                <option value="001-BOS" <?= (old('ksum') == "001-BOS" or $barang['kode_sumberdana'] == "001-BOS") ? "selected" : ""; ?>>001-BOS</option>
                                <option value="Swadaya" <?= (old('ksum') == "Swadaya" or $barang['kode_sumberdana'] == "Swadaya") ? "selected" : ""; ?>>Swadaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_beli" class="col-sm-3 text-end control-label col-form-label">Tanggal Pembelian</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('tgl_beli')) ? old('tgl_beli') : $barang['tgl_pembelian']; ?>" type="text" class="form-control text-muted <?= ($validation->hasError('tgl_beli')) ? 'is-invalid' : ''; ?>" id="datepicker-autoclose" name="tgl_beli" placeholder="yyyy-mm-dd" />
                            <div class="invalid-feedback"><?= $validation->getError('tgl_beli'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-3 text-end control-label col-form-label">Satuan</label>
                        <div class="col-md-9">
                            <select class="select2 form-select shadow-none" required name="satuan">
                                <option>Select</option>
                                <option value="Unit" <?= (old('satuan') == "Unit" or $barang['satuan'] == "Unit") ? "selected" : ""; ?>>Unit</option>
                                <option value="Set" <?= (old('satuan') == "Set" or $barang['satuan'] == "Set") ? "selected" : ""; ?>>Set</option>
                                <option value="Pcs" <?= (old('satuan') == "Pcs" or $barang['satuan'] == "Pcs") ? "selected" : ""; ?>>Pcs</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kondisi" class="col-sm-3 text-end control-label col-form-label">Kondisi</label>
                        <div class="col-md-9">
                            <select class="select2 form-select shadow-none" name="kondisi" required="required">
                                <option>Select</option>
                                <option value="Baik" <?= (old('kondisi') == "Baik" or $barang['kondisi'] == "Baik") ? "selected" : ""; ?>>Baik</option>
                                <option value="Rusak" <?= (old('kondisi') == "Rusak" or $barang['kondisi'] == "Rusak") ? "selected" : ""; ?>>Rusak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 text-end control-label col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('harga')) ? old('harga') : $barang['harga']; ?>" type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" placeholder="Harga" />
                            <div class="invalid-feedback"><?= $validation->getError('harga'); ?></div>
                        </div>
                    </div>

                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>