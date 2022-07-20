<!DOCTYPE html>
<html dir="ltr">

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
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/smk.png" />
  <!-- Custom CSS -->
  <link href="<?= base_url(); ?>/dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="main-wrapper" style="padding: 5% 25% 25%;">
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
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark">
      <div class="auth-box bg-dark border-top border-secondary" style="margin-bottom: 20px;">
        <div id="loginform">
          <div class="text-center pt-3 pb-3">
            <span class="db"><img src="<?= base_url(); ?>/assets/images/smk.png" width="15%" alt="logo" /></span>
          </div>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-warning" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>

          <!-- <div class="alert alert-success" role="alert">
            Mencoba
          </div> -->

          <!-- Form -->
          <form class="form-horizontal mt-3" id="loginform" method="POST" action="<?= base_url('/login/proses'); ?>">
            <div class="row pb-4">
              <div class="col-2"></div>
              <div class="col-8">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required name="username" id="username" />
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                  </div>
                  <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required name="password" id="password" />
                </div>
              </div>
            </div>
            <div class="row border-top border-secondary">
              <div class="col-10">
                <div class="form-group">
                  <div class="pt-3 pb-3">
                    <button class="btn btn-success float-end text-white" type="submit">
                      Login
                    </button>
                    <h6></h6>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="<?= base_url(); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="<?= base_url(); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $("#to-recover").on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
    $("#to-login").click(function() {
      $("#recoverform").hide();
      $("#loginform").fadeIn();
    });
  </script>
</body>

</html>