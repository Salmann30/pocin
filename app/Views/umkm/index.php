<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (session()->has('alert')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('alert') ?>
        </div>
    <?php endif; ?>
   

    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-9 mb-2">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #132123;">
                    <i class="fas fa-images" style="color: #ffff;"></i> <br>
                    <strong class="text-light">Foto Bersama UMKM</strong>
                </div>
                <div class="card-body text-dark text-center">
                    <img class="img-fluid" src="<?=base_url('')?>img/defolt2.jpg">
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-2 my-auto">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #132123;">
                    <i class="fas fa-luggage-cart" style="color: #ffff;"></i> <br>
                    <strong class="text-light">Produk</strong>
                </div>
                <div class="card-body text-dark text-center">
                    <b>
                        <p class="card-text mb-3">Jumlah: <br>
                            <?= $totalPro ?> </p>
                    </b>
                    <a href="<?= base_url('/umkm/produk/index'); ?>" class="btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>