<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/zz/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <link rel="stylesheet" href="/zz/src/assets/vendors/css/vendor.addons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/zz/src/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="/zz/src/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="/zz/src/asssets/images/favicon.ico" />

    <!-- DataTables -->
    <link rel="stylesheet" href="/zz/src/assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/zz/src/assets/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- css utk Gambar -->
    <link rel="stylesheet" href="/zz/src/assets/css/gambar.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body class="header-fixed">


    <!-- include -->
    <?= $this->include('layout/v_nav.php'); ?>
    <?= $this->include('layout/v_sidebar.php'); ?>
    <?= $this->renderSection('content'); ?>

    <footer class="footer">
        <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
                <ul class="text-gray">
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co" target="_blank">UXCANDY</a>. All rights reserved</small>
                <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
            </div>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="/zz/src/assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="/zz/src/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/zz/src/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="/zz/src/assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="/zz/src/assets/js/template.js"></script>
    <script src="/zz/src/assets/js/dashboard.js"></script>
    <!-- jQuery -->
    <script src="/zz/src/assets/jquery/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="/zz/src/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="/zz/src/assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/zz/src/assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/zz/src/assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <!-- page script -->
    <script>
        // data table
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true,
                "oLanguage": {
                    "sSearch": "",
                    "sSearchPlaceholder": "cari",
                    "sLengthMenu": "Tampil _MENU_ data",
                    "sInfo": "Menampilkan data _START_ sampai _END_ dari _TOTAL_ data",
                    "sZeroRecords": "Data tidak Ditemukan",
                    "sInfoFiltered": " - disaring dari _MAX_ data",
                }


            });

        });
    </script>
    <!-- IMG PREVIEW -->
    <script>
        function previewImg() {

            const sampul = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');


            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <?php

    ?>


</body>

</html>