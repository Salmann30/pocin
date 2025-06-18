<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>
<style>
    @media (max-width: 390px){
        .page-header {
        position: sticky;
        top: 0;
        z-index: 5000!important;
        height: 6px;
        }
        #header h1 {
        font-size: 16px; /* Perkecil ukuran font judul */
        line-height: 0.5; /* Kurangi jarak antar baris */
        margin-bottom: 5px; /* Kurangi jarak di bawah judul */
        top: 1!important;
        }
    
        #header .breadcrumb {
            font-size: 12px; /* Sesuaikan ukuran font breadcrumb */
        }
    
        #header .breadcrumb-item a {
            font-size: 12px; /* Sesuaikan ukuran link breadcrumb */
        }
    }
    .page-header {
    position: sticky;
    top: 0;
    z-index: 5000; /* Supaya tetap di atas elemen lain */
}
</style>
<div id="header" class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Profile Tim IT</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item"><a class="active text-white" href="<?= base_url('/profiletimit')?>">Profile Tim IT</a></li>
    </ol>
</div>

<!--IMAGE-->
<div class="container-fluid vesitable py-5">
            <div class="container py-5">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4 justify-content-center">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="<?=base_url('')?>img/timit.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4 class="text-center">Muhammad Salman</h4>
                                                    <p>Instagram : @kairyyy30</p>
                                                    <div class="d-flex justify-content-end flex-lg-wrap">
                                                        <a href="https://www.instagram.com/kairyyy30" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            Kunjungi</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="<?=base_url('')?>img/potomonyet.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4 class="text-center">Huzaifah Khanif</h4>
                                                    <p> </p>
                                                    <p>Instagram : @nfzkha1_</p>
                                                    <div class="d-flex justify-content-end flex-lg-wrap">
                                                        <a href="https://www.instagram.com/nfzkha1_" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            Kunjungi</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
</div>
<!-- End-->
<script>
    window.onscroll = function () {
        var header = document.getElementById("header");
        var scrollPosition = window.scrollY; // Posisi scroll saat ini
        var halfPageHeight = window.innerHeight / 0.5; // Setengah dari tinggi layar

        // Jika posisi scroll lebih kecil dari setengah halaman, buat sticky
        if (scrollPosition < halfPageHeight) {
            header.style.position = "sticky";
            header.style.top = "0";
        } else {
            // Hentikan sticky setelah setengah halaman
            header.style.position = "static";
        }
    };
</script>


<?= $this->endSection(); ?>