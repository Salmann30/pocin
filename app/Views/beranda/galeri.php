<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<div class="container-fluid contact py-5 my-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded ">
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Galeri UMKM Pondok Cina</h1>
                    </div>
                </div>
                <?php foreach($gambar as $kat) : ?>
                    <div class="col-md-6 col-lg-6 col-xl-4 mb-4">
  <div class="card shadow-sm border-0 overflow-hidden h-100">
    <div class="ratio ratio-4x3">
      <img src="<?= base_url('beranda/img/') . $kat['nama_gambar'] ?>" class="img-fluid object-fit-cover rounded-top" alt="<?= $kat['nama_keg'] ?>">
    </div>
    <div class="card-body d-flex flex-column">
      <h5 class="card-title text-center text-dark fw-semibold mb-2" style="font-size: 1.1rem;">
        <?= $kat['nama_keg'] ?>
      </h5>
      <p class="card-text text-muted small mb-1"><?= $kat['ket_gambar'] ?></p>
      <p class="card-text text-muted small mb-3"><?= date('d M Y', strtotime($kat['tanggal_gambar'])) ?></p>
      <div class="mt-auto d-flex justify-content-center">
        <button class="btn btn-outline-primary rounded-pill px-4 py-1" data-bs-toggle="modal" data-bs-target="#searchModal<?= $kat['id'] ?>">
          <i class="fas fa-eye me-2"></i>Lihat
        </button>
      </div>
    </div>
  </div>
</div>


                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php foreach($gambar as $kat) : ?>
<div class="modal fade" id="searchModal<?= $kat['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg"> <!-- Mengganti ukuran modal -->
        <div class="modal-content rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $kat['nama_keg'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-0 m-3">
                <div class="ratio ratio-16x9">
                    <img src="<?= base_url('beranda/img/') . $kat['nama_gambar'] ?>" class="img-fluid rounded" alt="">
                </div>   
            </div>
        </div>
    </div>
</div>



<?php endforeach; ?>


<?= $this->endSection(); ?>