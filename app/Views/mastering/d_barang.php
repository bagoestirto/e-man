<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/mbarang/confdel'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_barang" value="<?= $barangMaster['id_barang']; ?>">
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <div class="form-group row">
                        <label for="kbar" class="col-sm-3 text-end control-label col-form-label">Kode Barang</label>
                        <div class="col-sm-9">
                            <input required readonly value="<?= (old('kbar')) ? old('kbar') : $barangMaster['kode_barang']; ?>" type="text" class="form-control <?= ($validation->hasError('kbar')) ? 'is-invalid' : ''; ?>" id="kbar" name="kbar" placeholder="Kode Barang" autofocus />
                            <div class="invalid-feedback"><?= $validation->getError('kbar'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input required readonly value="<?= (old('nbar')) ? old('nbar') : $barangMaster['nama_barang']; ?>" type="text" class="form-control <?= ($validation->hasError('nbar')) ? 'is-invalid' : ''; ?>" id="nbar" name="nbar" placeholder="Nama Barang" />
                            <div class="invalid-feedback"><?= $validation->getError('nbar'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 text-end control-label col-form-label">Jumlah Barang</label>
                        <div class="col-md-9">
                            <select class="select2 form-select shadow-none" id="jumbar" name="jumbar" required>
                                <option value="">Jumlah Barang</option>
                                <?php for ($ab = 1; $ab <= $barangMaster['stok_barang']; $ab++) { ?>
                                    <option value="<?= $ab; ?>"><?= $ab; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_beli" class="col-sm-3 text-end control-label col-form-label">Tanggal Pembelian</label>
                        <div class="col-sm-9">
                            <input required value="<?= (old('tgl_beli')) ? old('tgl_beli') : $barangMaster['tgl_pembelian']; ?>" type="text" class="form-control text-muted <?= ($validation->hasError('tgl_beli')) ? 'is-invalid' : ''; ?>" id="datepicker-autoclose" name="tgl_beli" placeholder="yyyy-mm-dd" />
                            <div class="invalid-feedback"><?= $validation->getError('tgl_beli'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kondisi" class="col-sm-3 text-end control-label col-form-label">Kondisi</label>
                        <div class="col-md-9">
                            <select class="select2 form-select shadow-none" name="kondisi" required="required">
                                <option>Select</option>
                                <option value="Baik" <?= (old('kondisi') == "Baik" or $barangMaster['kondisi'] == "Baik") ? "selected" : ""; ?>>Baik</option>
                                <option value="Rusak" <?= (old('kondisi') == "Rusak" or $barangMaster['kondisi'] == "Rusak") ? "selected" : ""; ?>>Rusak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ket" class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea required value="" type="text" class="form-control" id="ket" name="ket"></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('ket'); ?></div>
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