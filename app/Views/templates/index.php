<!DOCTYPE html>
<html lang="in">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" href="<?= base_url('img/KatalogLogo.png') ?>" type="image">
    
    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

</head>

<body>
    <!-- Your content here -->
</body>

</html>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('templates/topbar'); ?>


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('pc'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Katalog By TC <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url("/vendor/jquery/jquery.min.js"); ?>"></script>
    <script src="<?= base_url("/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url("/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(""); ?>/js/sb-admin-2.min.js"></script>
    <script>
        // Ambil URL saat ini
        var currentUrl = window.location.href;

        // Loop melalui setiap item navigasi
        var navItems = document.querySelectorAll('.nav-item');
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
    <!--Script untuk crop foto-->
    

</body>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>