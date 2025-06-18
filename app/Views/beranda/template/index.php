<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="description" content="Selamat datang di UMKM Pondok Cina, pusat inovasi lokal dengan kualitas terpercaya. Temukan berbagai produk UMKM dan kontribusi kami untuk pengembangan usaha lokal.">
<meta name="keywords" content="UMKM, Pondok Cina, produk lokal, inovasi, usaha kecil, pengembangan usaha">
<meta name="author" content="UMKM Pondok Cina">
<meta property="og:title" content="UMKM Pondok Cina">
<meta property="og:description" content="Temukan berbagai produk UMKM di Pondok Cina. Inovasi lokal dan kualitas terpercaya.">
<meta property="og:url" content="<?= current_url() ?>">
<meta property="og:type" content="website">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


     

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('img/KatalogLogo.png') ?>" type="image">
    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('beranda/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('beranda/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('beranda/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('beranda/css/style.css') ?>" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?= $this->include('beranda/template/navbar'); ?>


    <?= $this->renderSection('page-Content'); ?>
        

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-3 mt-3">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5);"></div>
        <div class="row g-5">
            
            <!-- Logo Section -->
<div class="col-lg-4 col-md-6">
    <div >
            <img src="<?= base_url('img/KatalogLogo.png') ?>" alt="Logo" style="max-height: 12rem;" class="mb-3 img-fluid card rounded shadow-sm bg-white p-3">
    </div>
</div>


            <!-- Main Menu Section -->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-light mb-3">Main Menu</h4>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('/'); ?>" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="<?= base_url('produk'); ?>" class="text-white text-decoration-none">Produk &amp; Jasa</a></li>
                    <li><a href="<?= base_url('umkms'); ?>" class="text-white text-decoration-none">UMKM</a></li>
                                <li><a href="<?= base_url('tentang'); ?>" class="text-white text-decoration-none">Tentang UMKM</a></li>
                        <li><a href="<?= base_url('kontak'); ?>" class="text-white text-decoration-none">Kontak UMKM</a></li>

                </ul>
            </div>

            <!-- Kontak Section -->
            <div class="col-lg-4 col-md-6 ">
                <h4 class="text-light mb-3">Kontak</h4>
                <p class="text-light">Jl. Raya Mekarsari, Mekarsari, Kec. Cimanggis, Kota Depok, Jawa Barat 16452</p>
                <p class="text-light">Email: mekariumkm@gmail.com</p>
                <p class="text-light">Telpon: (021) 78881112 Ext. 110</p>
                <div class="d-flex flex-row justify-content-start pt-3">
                    <a class="btn btn-outline-light me-2 rounded-circle" href="https://www.instagram.com/umkmmekari/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light me-2 rounded-circle" href="https://www.facebook.com/umkmmekari/"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->



    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light">Copyright oleh <a href="https://www.taxcenterug.com"><i class="fas fa-copyright text-light me-2"></i><img src="<?= base_url('img/logotc.png') ?>" alt="" class="img-fluid img-profile" style="height:37px;"></a>
                    </span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Dibuat Oleh <span class="border-bottom text-white">Tim IT Tax Center</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?= base_url('beranda/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('beranda/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('beranda/lib/lightbox/js/lightbox.min.js') ?>"></script>
    <script src="<?= base_url('beranda/lib/owlcarousel/owl.carousel.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('beranda/js/main.js') ?>"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66b19e3b32dca6db2cba6349/1i4it46s1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>