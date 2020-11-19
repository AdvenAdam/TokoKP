<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/zz/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="/zz/src/assets/vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/zz/src/assets/css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="/zz/src/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="/zz/src/assets/images/favicon.ico" />
</head>

<body>
    <div class="authentication-theme auth-style_1">
        <div class="row">
            <div class="col-12 logo-section">
                <center>
                    <h2>Form Login</h2>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="grid-header">
                                <h2 class="mt-5 mb-5"> <a href="" class="logo">
                                        <img src="/zz/src/assets/images/logo.svg" alt="logo" />
                                    </a> </h2>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                                <form action="/Auth/cek_login" method="POST" enctype="multipart/form-data">
                                    <div class="form-group input-rounded">
                                        <input type="text" class="form-control  <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Username">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input type="password" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="password" placeholder="Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth_footer">
            <p class="text-muted text-center">© Label Inc 2020</p>
        </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="/zz/src/assets/vendors/js/core.js"></script>
    <script src="/zz/src/assets/vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="/zz/src/assets/js/template.js"></script>
    <!-- endbuild -->
</body>

</html>