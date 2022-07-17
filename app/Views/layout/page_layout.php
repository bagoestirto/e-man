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
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?= $this->include('layout/navbar'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?= $this->include('layout/sidebar'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?= $tittle; ?></h4>
                        <div class="ms-auto text-end">
                            <!--<nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Library
                                    </li>
                                </ol>
                            </nav>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?= $this->renderSection('content'); ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by
                <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/extra-libs/sparkline/sparkline.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('dist/js/waves.js'); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('dist/js/sidebarmenu.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('dist/js/custom.min.js'); ?>"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url('/assets/extra-libs/DataTables/datatables.min.js'); ?>"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>
    <script src="<?= base_url('/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
    <script>
        jQuery("#datepicker-autoclose").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $(".add-more").click(function() {
            //     var html = $(".copy").html();
            //     $(".before-here").before(html);
            // });
            $(".add-more").click(function() {
                let count = document.getElementsByClassName("opt-barang").length + 1;
                var html = '';
                html += '<?php if (!empty($barang)) { ?>';
                html += '<div class="form-group row"><label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>';
                html += '<div class="col-sm-3">';
                html += '<select class="opt-barang select2 form-select shadow-none" id="pbar[]" name="nbar[]" required>';
                html += '<option value="">Pilih Barang</option><?php foreach ($barang as $bar) : ?>';
                html += '<option onclick="getJumlah(<?= $bar['id_barang'] ?>, ' + count + ')" value="<?= $bar['id_barang'] ?>"><?= $bar['nama_barang']; ?></option><?php endforeach; ?>';
                html += '</select>';
                html += '</div>';
                html += '<div class="col-sm-3">';
                html += '<select class="select2 form-select shadow-none" id="qbar_' + count + '" name="qbar[]" required></select>';
                html += '</div>';
                html += '<button class="btn btn-danger remove col-sm-1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>';
                html += '</div>';
                html += '<?php } ?>';
                // var html = $(".copy").html();
                $(".before-here").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".form-group").remove();
            });
        });
    </script>
    <script type=text/javascript>
        // when country dropdown changes
        function getJumlah(item, idx) {
            if (item) {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('getState') ?>",
                    data: {
                        id_barang: item
                    },
                    success: function(res) {
                        var data = JSON.parse(res);
                        if (res) {
                            $(`#qbar_${idx}`).empty();
                            $(`#qbar_${idx}`).append('<option>Jumlah Barang</option>');
                            for (let i = 1; i <= data.stok_barang; i++) {
                                // console.log(i);
                                $(`#qbar_${idx}`).append('<option value="' + i + '">' + i + '</option>');
                            }
                            // $.each(data, function(key, value) {
                            //     $(`#qbar_${idx}`).append('<option value="' + value.stok_barang + '">' + value.stok_barang +
                            //         '</option>');
                            // });
                        } else {
                            $(`#qbar_${idx}`).empty();
                        }
                    }
                });
            } else {
                $(`#qbar_${idx}`).empty();
            }
        }

        $('#pbar').change(function() {
            var idBarang = $(this).val();
            if (idBarang) {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('getState') ?>",
                    data: {
                        id_barang: idBarang
                    },
                    success: function(res) {
                        var data = JSON.parse(res);
                        if (res) {
                            $("#qbar").empty();
                            $("#qbar").append('<option>Jumlah Barang</option>');
                            $.each(data, function(key, value) {
                                $("#qbar").append('<option value="' + value.stok_barang + '">' + value.stok_barang +
                                    '</option>');
                            });
                        } else {
                            $("#qbar").empty();
                        }
                    }
                });
            } else {
                $("#qbar").empty();
            }
        });
    </script>

    <!--untuk halaman perawatan-->
    <script type="text/javascript">
        $(document).ready(function() {
            // $(".add-more").click(function() {
            //     var html = $(".copy").html();
            //     $(".before-here").before(html);
            // });
            $(".add-more-per").click(function() {
                let count = document.getElementsByClassName("opt-barang").length + 1;
                var html = '';
                html += '<?php if (!empty($barang)) { ?>';
                html += '<div class="form-group row"><label for="nbar" class="col-sm-3 text-end control-label col-form-label">Nama Barang</label>';
                html += '<div class="col-sm-3">';
                html += '<select class="opt-barang select2 form-select shadow-none" id="pbarper[]" name="nbarper[]" required>';
                html += '<option value="">Pilih Barang</option><?php foreach ($barang as $bar) : ?>';
                html += '<option onclick="getJumlahPer(<?= $bar['id_barang'] ?>, ' + count + ')" value="<?= $bar['id_barang'] ?>"><?= $bar['nama_barang']; ?></option><?php endforeach; ?>';
                html += '</select>';
                html += '</div>';
                html += '<div class="col-sm-3">';
                html += '<select class="select2 form-select shadow-none" id="qbarper_' + count + '" name="qbarper[]" required></select>';
                html += '</div>';
                html += '<button class="btn btn-danger remove col-sm-1" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>';
                html += '</div>';
                html += '<?php } ?>';
                // var html = $(".copy").html();
                $(".before-here-per").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".form-group").remove();
            });
        });
    </script>

    <script type=text/javascript>
        // when country dropdown changes
        function getJumlahPer(item, idx) {
            if (item) {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('getPerDrop') ?>",
                    data: {
                        id_barang: item
                    },
                    success: function(res) {
                        var data = JSON.parse(res);
                        if (res) {
                            $(`#qbarper_${idx}`).empty();
                            $(`#qbarper_${idx}`).append('<option>Jumlah Barang</option>');
                            for (let i = 1; i <= data.qty; i++) {
                                // console.log(i);
                                $(`#qbarper_${idx}`).append('<option value="' + i + '">' + i + '</option>');
                            }
                            // $.each(data, function(key, value) {
                            //     $(`#qbar_${idx}`).append('<option value="' + value.stok_barang + '">' + value.stok_barang +
                            //         '</option>');
                            // });
                        } else {
                            $(`#qbarper_${idx}`).empty();
                        }
                    }
                });
            } else {
                $(`#qbarper_${idx}`).empty();
            }
        }
    </script>

</body>

</html>