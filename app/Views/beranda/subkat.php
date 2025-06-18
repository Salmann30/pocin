<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <?php foreach ($tab1 as $pr) : ?>
        <h1 class="text-center text-white display-6">Sub Kategori <br> "<?=$pr['subkat']?>"</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('produk')?>">Produk&Jasa</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('kategori')?>">Kategori</a></li>
            <li class="breadcrumb-item active text-white">SubKategori</li>
        </ol>
    <?php endforeach; ?>
</div>
<!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">SubKategori</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Urutkan Berdasar:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Default</option>
                                    <option value="saab">Popularitas</option>
                                    <option value="opel">Harga</option>
                                    <option value="audi">Paling Laku</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                <?php foreach ($tab1 as $pr): ?>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="<?= base_url('beranda/');?>img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4 class="text-center"><?= $pr['nama_produk']; ?></h4>
                                            <center><?=$pr['ket_produk'];?></center>
                                            <div class="d-flex justify-content-center flex-lg-wrap my-3">
                                                <p class="text-dark fs-5 fw-bold mb-0">Rp. <?= $harga_format = number_format($pr['harga_produk'], 0, ',', '.'); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-end flex-lg-wrap">
                                                <a href="<?=base_url('detailprod')?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="<?= base_url('beranda/');?>img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4 class="text-center"><?= $pr['nama_produk']; ?></h4>
                                            <center><?=$pr['ket_produk'];?></center>
                                            <div class="d-flex justify-content-center flex-lg-wrap my-3">
                                                <p class="text-dark fs-5 fw-bold mb-0">Rp. <?= $harga_format = number_format($pr['harga_produk'], 0, ',', '.'); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-end flex-lg-wrap">
                                                <a href="<?=base_url('detailprod')?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="<?= base_url('beranda/');?>img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4 class="text-center"><?= $pr['nama_produk']; ?></h4>
                                            <center><?=$pr['ket_produk'];?></center>
                                            <div class="d-flex justify-content-center flex-lg-wrap my-3">
                                                <p class="text-dark fs-5 fw-bold mb-0">Rp. <?= $harga_format = number_format($pr['harga_produk'], 0, ',', '.'); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-end flex-lg-wrap">
                                                <a href="<?=base_url('detailprod')?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                    Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

<?= $this->endSection(); ?>