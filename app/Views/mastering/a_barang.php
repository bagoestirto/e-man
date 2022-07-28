<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/mbarang/u_stok/'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <div class="form-group row">
                        <label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <select onchange="getStok(this)" class="opt-barang select2 form-select shadow-none" id="" name="id_barang" required>
                                <option value="">Pilih Barang</option>
                                <?php foreach ($barangStok as $bar) : ?>
                                    <option value="<?= $bar['id_barang'] ?>"><?= $bar['nama_barang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kbar" class="col-sm-3 text-end control-label col-form-label">Kode Barang</label>
                        <div class="col-sm-9" id="kodeBar">
                            <label class="form-control"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 text-end control-label col-form-label">Stok Barang Saat Ini</label>
                        <div class="col-sm-9" id="stokBar">
                            <label class="form-control"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 text-end control-label col-form-label">Tambah Stok</label>
                        <div class="col-sm-9">
                            <input required value="" type="text" class="form-control <?= ($validation->hasError('plusStok')) ? 'is-invalid' : ''; ?>" id="plusStok" name="plusStok" placeholder="Tambah Stok" />
                            <div class="invalid-feedback"><?= $validation->getError('plusStok'); ?></div>
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