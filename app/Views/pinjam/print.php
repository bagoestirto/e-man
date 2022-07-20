<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>E-MAN SMKN 1 Kotaanyar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" <?= base_url('/assets/images/smk.png'); ?>" />
    <!-- Custom CSS -->
    <link href="<?= base_url('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url('dist/css/style.min.css'); ?>" rel="stylesheet" />

</head>

<body>

    <div class="row">
        <div class="col-md-8">
            <div class="card"> <img src="<?= $_SERVER["DOCUMENT_ROOT"]; ?>/assets/images/smk.png')" alt="homepage" class="light-logo" width="25" />
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
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF CodeIgniter 4 - qadrLabs</title>

</head>

<body>
    <h2>Data Mahasiswa </h2>
    <a href="<?php //echo base_url('PdfController/generate') 
                ?>">
        Download PDF
    </a>
    <img src="<? //echo base_url('assets/images/smk.png'); 
                ?>" alt="homepage" class="light-logo" width="25" />
    <table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr bgcolor=silver align=center>
                <td width="5%">No</td>
                <td width="25%">Nim</td>
                <td width="50%">Nama</td>
                <td width="20%">Nilai</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1930511041</td>
                <td>Resita</td>
                <td>85</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1930511044</td>
                <td>Tika</td>
                <td>85</td>
            </tr>
            <tr>
                <td>3</td>
                <td>1930511050</td>
                <td>Ramdan</td>
                <td>80</td>
            </tr>
            <tr>
                <td>4</td>
                <td>1930511051</td>
                <td>Nahla</td>
                <td>85</td>
            </tr>
            <tr>
                <td>5</td>
                <td>1930511052</td>
                <td>Reski</td>
                <td>95</td>
            </tr>
        </tbody>
    </table>
    <p>Jumlah data : 5</p>
</body>

</html> -->