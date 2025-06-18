<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>

<div class="container py-5">
    <div class="text-center mb-5">
      <h1 class="fw-bold">Selamat Datang</h1>
      <p class="lead mt-3">Aplikasi ini merupakan penggabungan antara <strong>katalog produk</strong> dengan <strong>catatan penjualan</strong>, yang dirancang untuk mempermudah pengelolaan produk dan transaksi Anda dalam satu platform.</p>
    </div>

    <div class="row text-center">
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <i class="fas fa-box fa-3x mb-3 text-primary"></i>
            <h5 class="card-title">Katalog Produk</h5>
            <p class="card-text">Lihat dan kelola daftar produk Anda dengan mudah.</p>
            <a href="/umkm/produk/index" class="btn btn-primary">Masuk Katalog</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <i class="fas fa-receipt fa-3x mb-3 text-success"></i>
            <h5 class="card-title">Catatan Penjualan</h5>
            <p class="card-text">Pantau dan kelola riwayat transaksi penjualan Anda.</p>
            <a href="<?= base_url('/catpen/user/dasbor') ?>" class="btn btn-success">Masuk Catatan Penjualan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection(); ?>