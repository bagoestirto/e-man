<?= $this->extend('layout/page_layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('/mperawatan/s_perawatan'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" readonly name="kode_perawatan" value="<?= $maxIdPerawatan; ?>">
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <div class="form-group row">
                        <label for="nlok" class="col-sm-3 text-end control-label col-form-label">Tanggal Perawatan</label>
                        <div class="col-sm-9">
                            <input required value="<?= old('tglPer'); ?>" type="text" class="form-control text-muted <?= ($validation->hasError('tglPer')) ? 'is-invalid' : ''; ?>" id="datepicker-autoclose" name="tglPer" placeholder="yyyy-mm-dd" />
                            <div class="invalid-feedback"><?= $validation->getError('tglPer'); ?></div>
                        </div>
                    </div>

                    <div class="form-group row after-add-more">
                        <label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>
                        <div class="col-sm-3">
                            <select class="opt-barang select2 form-select shadow-none" id="pbarper[]" name="nbarper[]" required>
                                <option value="">Pilih Barang</option>
                                <?php foreach ($barang as $bar) : ?>
                                    <option onclick="getJumlahPer(<?= $bar['id_barang'] ?>, 1)" value="<?= $bar['id_barang'] ?>"><?= $bar['nama_barang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="select2 form-select shadow-none" id="qbarper_1" name="qbarper[]" required>

                            </select>
                        </div>
                    </div>

                    <div class="row before-here-per">
                        <div class="col-sm-3"> </div><button class="btn btn-success add-more-per col-sm-1" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
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