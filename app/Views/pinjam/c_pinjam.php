<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/mpinjam/s_pinjam'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" readonly name="kode_pinjam" value="<?= $maxIdPinjam; ?>">
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <div class="form-group row">
                        <label for="kpeg" class="col-sm-3 text-end control-label col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none" name="kpeg" required>
                                <option value="">Select</option>
                                <?php foreach ($pegawai as $peg) : ?>
                                    <option value="<?= $peg->kode_pegawai; ?>"><?= $peg->nama_pegawai; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 text-end control-label col-form-label">Nama Petugas</label>
                        <div class="col-sm-9">
                            <input readonly value="<?= session()->get('username'); ?>" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Nama Lokasi" />
                            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tkor" class="col-sm-3 text-end control-label col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-3">
                            <input readonly value="<?= (old('tgl_pinjam')) ? old('tgl_pinjam') : $dToday; ?>" type="text" class="form-control <?= ($validation->hasError('tgl_pinjam')) ? 'is-invalid' : ''; ?>" name="tgl_pinjam" placeholder="yyyy-mm-dd" />
                            <div class="invalid-feedback"><?= $validation->getError('tgl_pinjam'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tkor" class="col-sm-3 text-end control-label col-form-label">Tanggal Jatuh Tempo</label>
                        <div class="col-sm-3">
                            <input required value="<?= old('tglJT'); ?>" type="text" class="form-control text-muted <?= ($validation->hasError('tglJT')) ? 'is-invalid' : ''; ?>" id="datepicker-autoclose" name="tglJT" placeholder="yyyy-mm-dd" />
                            <div class="invalid-feedback"><?= $validation->getError('tglJT'); ?></div>
                        </div>
                    </div>

                    <div class="form-group row after-add-more">
                        <label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                        <div class="col-sm-3">
                            <select onchange="getJumlah(this, 1)" class="opt-barang select2 form-select shadow-none" id="pbar[]" name="nbar[]" required>
                                <option value="">Pilih Barang</option>
                                <?php foreach ($barang as $bar) : ?>
                                    <option value="<?= $bar['id_barang'] ?>"><?= $bar['nama_barang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="select2 form-select shadow-none" id="qbar_1" name="qbar[]" required>

                            </select>
                        </div>
                    </div>

                    <div class="row before-here">
                        <div class="col-sm-3"> </div><button class="btn btn-success add-more col-sm-1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
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

            <div class="copy invisible">
                <div class="form-group row">
                    <label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                    <div class="col-sm-3">
                        <select class="select2 form-select shadow-none" id="pbar[]" name="nbar[]" required>
                            <option value="">Pilih Barang</option>
                            <?php foreach ($barang as $bar) : ?>
                                <option value="<?= $bar['id_barang'] ?>"><?= $bar['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="select2 form-select shadow-none" id="qbar[]" name="qbar[]" required>

                        </select>
                    </div>
                    <button class="btn btn-danger remove col-sm-1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>