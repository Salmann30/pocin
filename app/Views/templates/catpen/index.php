<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="description" content="Laporan penjualan adalah kumpulan informasi penjualan yang disusun dan diinformasikan sebagai bahan pencatatan dan analisis.">
  <meta name="keywords" content ="kasir pintar,kasir pintar pro,kasir pintar free,aplikasi kasir pintar,aplikasi pos,aplikasi kasir,kelola penjualan,catat penjualan bisnis,ppob,perangkat kasir,laporan keuangan, laporan pencatatan, laporan penjualan, keuangan UMKM, pencatatan keuangan, penjualan harian, laporan bulanan, laporan tahunan, manajemen keuangan">

  <meta name="author" content="Universitas Gunadarma (Huzaifah Khanif Algibban & M. Salman Faras)">

  <title><?= $title; ?></title>

  <!--Favicon -->
  <link rel="shortcut icon" type="image/png" href="<?= base_url('/catpen/img/favicon/fav.png') ?>" />
  <!-- -->
  <!-- Custom fonts for this template-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url(); ?>catpen/vendor/fonts/boxicons.css" />
  <!--Crop gambar-->
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- Data Table CSS -->
  <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

  <!-- Custom styles for this template-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>catpen/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url(); ?>catpen/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url(); ?>catpen/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>catpen/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?= base_url(); ?>catpen/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url(); ?>catpen/js/demo/config.js"></script>

</head>

<body>

  <!-- Page Wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Sidebar -->
      <?= $this->include('templates/catpen/sidebar'); ?>
      <!-- End of Sidebar -->


      <!-- Content Wrapper -->
      <div class="layout-page">
        <!-- Main Content -->

        <!-- Topbar -->
        <?= $this->include('templates/catpen/topbar') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?= $this->renderSection('page-Content'); ?>
        <!-- /.container-fluid -->

        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="content-footer my-auto footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , copyright by
              <a href="https://tcugapps.com" target="_blank" class="footer-link fw-medium">Laporan Penjualan Tax Center</a>
            </div>

          </div>
        </footer>
        <!-- End of Footer -->
        <div class="content-backdrop fade"></div>

      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Ingin Logout?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="divider">
          <div class="divider-text"></div>
        </div>
        <div class="modal-body">
          <div class="row">
            <h5>anda akan keluar dari akun anda</h5>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Tutup
            </button>
            <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->

    <script>
      // Ambil URL saat ini
      var currentUrl = window.location.href;

      // Loop melalui setiap item navigasi
      var navItems = document.querySelectorAll('.menu-item');
      navItems.forEach(function(item) {
        // Ambil URL dari item navigasi
        var itemUrl = item.querySelector('a').href;

        // Bandingkan URL saat ini dengan URL item navigasi
        if (currentUrl === itemUrl) {
          // Tambahkan kelas 'active' jika URL-nya cocok
          item.classList.add('active');
        }
      });
    </script>
    <script>
        <?php if (session()->getFlashdata('show_modal')) : ?>
      $(document).ready(function() {
          $('#newDataModal').modal('show');
      });
        <?php endif; ?>
    </script>

    <script src="<?= base_url(); ?>catpen/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url(); ?>catpen/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url(); ?>vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url(); ?>catpen/js/demo/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
      // Inisialisasi dropdown
      $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#data-table').DataTable({
          //disable sorting on last column
          "columnDefs": [{
            "orderable": false,
            "targets": 6
          }],
          language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
              'previous': 'Kembali',
              'next': 'Lanjut'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="text-dark form-control" style="font-size:9pt;">' +
              '<option value="10">10</option>' +
              '<option value="20">20</option>' +
              '<option value="30">30</option>' +
              '<option value="40">40</option>' +
              '<option value="50">50</option>' +
              '<option value="-1">All</option>' +
              '</select> results'
          }
        })
      });
      
      $(document).ready(function() {
    $('#data-hari').DataTable({
        // Disable sorting on the last column
        "columnDefs": [{
            "orderable": false,
            "targets": 4
        }],
        // Prevent DataTables from processing rows with 'colspan'
        "rowCallback": function(row, data, index) {
            if ($('td', row).attr('colspan')) {
                // Remove this row from DataTables processing
                $(row).addClass('no-sort');
            }
        },
        "order": [], // Disable initial sorting
        language: {
            'paginate': {
                'previous': 'Kembali',
                'next': 'Lanjut'
            },
            "lengthMenu": 'Display <select class="text-dark form-control" style="font-size:9pt;">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    });
});

$(document).ready(function() {
    $('#data-modal').DataTable({
        // Disable sorting on the last column
        "columnDefs": [{
            "orderable": false,
            "targets": 5
        }],
        // Prevent DataTables from processing rows with 'colspan'
        "rowCallback": function(row, data, index) {
            if ($('td', row).attr('colspan')) {
                // Remove this row from DataTables processing
                $(row).addClass('no-sort');
            }
        },
        "order": [], // Disable initial sorting
        language: {
            'paginate': {
                'previous': 'Kembali',
                'next': 'Lanjut'
            },
            "lengthMenu": 'Display <select class="text-dark form-control" style="font-size:9pt;">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select> results'
        }
    });
});
    </script>
    <script>
      $(document).ready(function() {
        $('#data-laporan').DataTable({
          //disable sorting on last column
          "columnDefs": [{
            "orderable": false,
            "targets": 4
          }],
          language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
              'previous': 'Kembali',
              'next': 'Lanjut'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="text-dark form-control" style="font-size:9pt;">' +
              '<option value="10">10</option>' +
              '<option value="20">20</option>' +
              '<option value="30">30</option>' +
              '<option value="40">40</option>' +
              '<option value="50">50</option>' +
              '<option value="-1">All</option>' +
              '</select> results'
          }
        })
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#data-manage').DataTable({
          //disable sorting on last column
          "columnDefs": [{
            "orderable": false,
            "targets": 3
          }],
          paging: false,
          language: {
            //customize pagination prev and next buttons: use arrows instead of words
            'paginate': {
              'previous': 'Kembali',
              'next': 'Lanjut'
            },
            //customize number of elements to be displayed
            "lengthMenu": 'Display <select class="text-dark form-control" style="font-size:9pt;">' +
              '<option value="10">10</option>' +
              '<option value="20">20</option>' +
              '<option value="30">30</option>' +
              '<option value="40">40</option>' +
              '<option value="50">50</option>' +
              '<option value="-1">All</option>' +
              '</select> results'
          }
        })
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

</body>

</html>