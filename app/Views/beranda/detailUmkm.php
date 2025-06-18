<?= $this->extend('beranda/template/index'); ?>
<?= $this->section('page-Content'); ?>
<div class="container-fluid py-4 mt-5">
	<!-- UMKM Profile Redesign -->
<div class="container py-5">
    <div class="row justify-content-center mt-5">
        <?php foreach ($umkm as $pr) : ?>
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Profile Image Section -->
                        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-4">
                            <div class="text-center">
                                <div class="rounded-circle overflow-hidden mx-auto mb-3" style="width: 150px; height: 150px;">
                                    <img src="<?= base_url('') . $pr['user_img'] ?>" class="img-fluid" alt="<?= $pr['nama_umkm'] ?>" 
                                         onerror="this.src='<?= base_url('assets/img/default-profile.jpg') ?>'">
                                </div>
                                <h4 class="fw-bold text-primary mb-1"><?= $pr['nama_umkm'] ?></h4>
                                <p class="text-muted"><i class="fas fa-user me-2"></i><?= ucwords($pr['fullname']) ?></p>
                            </div>
                        </div>
                        
                        <!-- Profile Details Section -->
                        <div class="col-md-8 p-4">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-phone-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Nomor Telepon</small>
                                        <span class="fw-medium"><?= !empty($pr['notlp']) ? $pr['notlp'] : 'Belum tersedia' ?></span>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fab fa-instagram text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Instagram</small>
                                        <?php if (!empty($pr['ig_user'])) : ?>
                                            <a href="https://instagram.com/<?= $pr['ig_user'] ?>" target="_blank" class="text-decoration-none">
                                                @<?= $pr['ig_user'] ?>
                                            </a>
                                        <?php else : ?>
                                            <span>Belum tersedia</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Alamat</small>
                                        <span class="fw-medium"><?= !empty($pr['alamat']) ? $pr['alamat'] : 'Belum tersedia' ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            // Format WhatsApp number
                            if (empty($pr['notlp'])) {
                                $ntlp = '';
                            } elseif (substr($pr['notlp'], 0, 1) == '0') {
                                $ntlp = '62' . substr($pr['notlp'], 1);
                            } elseif (substr($pr['notlp'], 0, 2) == '62') {
                                $ntlp = $pr['notlp'];
                            } else {
                                $ntlp = '62' . $pr['notlp'];
                            }
                            ?>
                            
                            <!-- Action Buttons -->
                            <div class="d-flex flex-column flex-sm-row gap-2">
                                <?php if (!empty($ntlp)) : ?>
                                <a href="https://wa.me/<?= $ntlp ?>" target="_blank" class="btn btn-success d-flex align-items-center justify-content-center gap-2 px-4 py-2">
                                    <i class="fab fa-whatsapp fs-5"></i>
                                    <span>Hubungi via WhatsApp</span>
                                </a>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Modern Product Listing Section -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?php foreach ($umkm as $pr) : ?>
            <div class="text-center mb-4">
                <h2 class="fw-bold position-relative d-inline-block">
                    Daftar Produk
                    <div class="position-absolute w-100" style="height: 4px; bottom: -8px; left: 0; background: linear-gradient(to right, transparent, #0d6efd, transparent);"></div>
                </h2>
                <p class="text-muted mt-3">Produk unggulan dari <?= $pr['nama_umkm'] ?></p>
            </div>
            <?php endforeach; ?>
            
            <div class="row g-4">
                <?php foreach ($produk as $pr) : ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-card shadow-sm rounded-3 overflow-hidden h-100 transition-all" 
                         data-bs-toggle="modal" 
                         data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>" 
                         style="cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        
                        <!-- Product Image with Overlay -->
                        <div class="position-relative product-img-container" style="aspect-ratio: 1/1;">
                            <img src="<?= base_url() . $pr['img_produk'] ?>" 
                                 class="img-fluid w-100 h-100 object-fit-cover" 
                                 alt="<?= $pr['nama_produk'] ?>"
                                 onerror="this.src='<?= base_url('assets/img/default-product.jpg') ?>'">
                                 
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                 style="background-color: rgba(0,0,0,0.2); opacity: 0; transition: opacity 0.3s ease;">
                                <span class="badge bg-primary py-2 px-3 rounded-pill">Lihat Detail</span>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-3 bg-white">
                            <h5 class="product-title fw-semibold mb-1 text-truncate" title="<?= $pr['nama_produk'] ?>">
                                <?= $pr['nama_produk'] ?>
                            </h5>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">
                                    Rp <?= number_format($pr['harga_produk'], 0, ',', '.'); ?>
                                </span>
                                
                                <?php if (!empty($pr['stok_produk'])) : ?>
                                <span class="badge bg-light text-dark border">
                                    Stok: <?= $pr['stok_produk'] ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?php if (empty($produk)) : ?>
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-box-open text-muted" style="font-size: 4rem;"></i>
                </div>
                <h4 class="text-muted">Belum ada produk</h4>
                <p class="text-muted">UMKM ini belum menambahkan produk.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.product-card:hover .overlay {
    opacity: 1;
}

@media (max-width: 767.98px) {
    .product-title {
        font-size: 0.9rem;
    }
}
</style>

<!-- Product Detail Modal -->
<?php foreach ($produk as $pr) : ?>
<div class="modal fade" id="detailProdukModal<?= $pr['id_produk'] ?>" tabindex="-1" aria-labelledby="detailProdukLabel<?= $pr['id_produk'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold" id="detailProdukLabel<?= $pr['id_produk'] ?>">Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="position-relative" style="height: 100%;">
                            <img src="<?= base_url() . $pr['img_produk'] ?>" 
                                 class="img-fluid w-100 h-100 object-fit-cover" 
                                 alt="<?= $pr['nama_produk'] ?>"
                                 onerror="this.src='<?= base_url('assets/img/default-product.jpg') ?>'">
                        </div>
                    </div>
                    <div class="col-md-7 p-4">
                        <h4 class="fw-bold mb-2"><?= $pr['nama_produk'] ?></h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="fs-4 fw-bold text-primary">Rp <?= number_format($pr['harga_produk'], 0, ',', '.'); ?></span>
                            <?php if (!empty($pr['stok_produk'])) : ?>
                            <span class="badge bg-success ms-3">Stok: <?= $pr['stok_produk'] ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold mb-2">Deskripsi:</h6>
                            <p class="text-muted">
                                <?= !empty($pr['ket_produk']) ? $pr['ket_produk'] : 'Tidak ada deskripsi untuk produk ini.' ?>
                            </p>
                        </div>
                        
                        <?php
                            $notlp = '';
                            if (!empty($pr['notlp'])) {
                                if (substr($pr['notlp'], 0, 1) === '0') {
                                    $notlp = '62' . substr($pr['notlp'], 1);
                                } elseif (substr($pr['notlp'], 0, 2) === '62') {
                                    $notlp = $pr['notlp'];
                                } else {
                                    $notlp = '62' . $pr['notlp'];
                                }
                            }
                        ?>
                        
                        <?php if (!empty($notlp)) : ?>
                        <a href="https://wa.me/<?= $notlp ?>?text=Halo, saya tertarik dengan produk <?= urlencode($pr['nama_produk']) ?> yang Anda tawarkan." 
                           class="btn btn-success d-flex align-items-center justify-content-center gap-2 px-4 py-2" 
                           target="_blank">
                            <i class="fab fa-whatsapp fs-5"></i>
                            <span>Pesan via WhatsApp</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
		</div>
	</div>
	<!--Modal-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php foreach ($produk as $product) : ?>
<div class="modal fade" id="detailProdukModal<?= $product['id_produk'] ?>" tabindex="-1" aria-labelledby="editProdukModalLabel<?= $product['id_produk'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProdukModalLabel<?= $product['id_produk'] ?>">Detail Produk</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3" id="tabContent">
                    <li class="nav-item">
                        <a class="nav-link active" id="detail-tab" data-bs-toggle="tab" href="#detail-<?= $product['id_produk'] ?>" role="tab">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="testimoni-tab" data-bs-toggle="tab" href="#testimoni-<?= $product['id_produk'] ?>" role="tab">Testimoni</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Detail Produk -->
                    <div class="tab-pane fade show active" id="detail-<?= $product['id_produk'] ?>" role="tabpanel">
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-4 col-6">
                                <!-- Carousel -->
                                <div id="carouselExample<?= $product['id_produk'] ?>" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active fruite-img">
                                            <img src="<?= base_url() . $product['img_produk'] ?>" class="img-fluid blur-img" alt="" data-bs-toggle="modal" data-bs-target="#fullscreenModal" data-src="<?= base_url() . $product['img_produk'] ?>">
                                        </div>
                                        <?php if ($product['img_produk2']) :?>
                                            <div class="carousel-item fruite-img">
                                                <img src="<?= base_url() . $product['img_produk2'] ?>" class="img-fluid blur-img" alt="" data-bs-toggle="modal" data-bs-target="#fullscreenModal" data-src="<?= base_url() . $product['img_produk2'] ?>">
                                            </div>
                                        <?php endif;?>
                                        <?php if ($product['img_produk3']) :?>
                                            <div class="carousel-item fruite-img">
                                                <img src="<?= base_url() . $product['img_produk3'] ?>" class="img-fluid blur-img" alt="" data-bs-toggle="modal" data-bs-target="#fullscreenModal" data-src="<?= base_url() . $product['img_produk3'] ?>">
                                            </div>
                                        <?php endif;?>
                                    </div>
                                    <button class="carousel-control-prev transparent-control" type="button" data-bs-target="#carouselExample<?= $product['id_produk'] ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next transparent-control" type="button" data-bs-target="#carouselExample<?= $product['id_produk'] ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <div class="col-12 text-center mt-1 text-dark" style="font-size:10pt;">
                                    <strong><p><?= ucwords($product['nama_produk']) ?></p></strong>
                                </div>
                            </div>

                            <div class="col-lg-8 row">
                                <div class="col-12">
                                    <table class="table table-borderless mb-4" style="font-size:9pt;">
                                        <tbody>
                                            <tr>
                                                <td class="m-0 p-0">Kategori</td>
                                                <td class="m-0 p-0">&nbsp;&nbsp; </td>
                                                <td class="m-0 p-0 text-dark"> <?= $product['subkat'] ?> (<?= $product['kategori'] ?>)</td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 p-0">Harga</td>
                                                <td class="m-0 p-0">&nbsp;</td>
                                                <td class="m-0 p-0 text-dark">Rp<?= number_format($product['harga_produk'], 0, ',', '.'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 p-0">Stok</td>
                                                <td class="m-0 p-0">&nbsp;&nbsp; </td>
                                                <td class="m-0 p-0 text-dark"><?= number_format($product['stok_produk'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 p-0">Deskripsi</td>
                                                <td class="m-0 p-0">&nbsp;&nbsp; </td>
                                                <td class="m-0 p-0 text-dark"><?= ucfirst($product['ket_produk']) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimoni -->
                    <div class="tab-pane fade" id="testimoni-<?= $product['id_produk'] ?>" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <h4>Testimoni Pelanggan</h4>
                                <ul class="list-group">
                                    <!-- Contoh testimoni -->
                                    <?php if (!empty($product['testimoni'])): ?>
                                        <?php foreach ($product['testimoni'] as $testi): ?>
                                            <li class="list-group-item pt-0">
                                                <div class="rating">
                                                    <?php
                                                    $bintangPenuh = floor($testi['bintang']);
                                                    $bintangSetengah = ($testi['bintang'] - $bintangPenuh) >= 0.5 ? 1 : 0;
            
                                                    echo str_repeat('<i class="fas fa-star"></i>', $bintangPenuh);
            
                                                    if ($bintangSetengah) {
                                                        echo '<i class="fas fa-star-half-alt"></i>';
                                                    }
            
                                                    if ($testi['bintang'] < 5 && $testi['bintang'] != 4.5) {
                                                        $bintangKosong = 5 - ($bintangPenuh + $bintangSetengah);
                                                        echo str_repeat('<i class="far fa-star"></i>', $bintangKosong);
                                                    }
                                                    ?>
                                                </div>
                                                <strong><?= $testi['nama_cus'] ?></strong>
                                                <p><?= $testi['ket_testi'] ?></p>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li class="list-group-item pb-1">Belum ada testimoni untuk produk ini.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                if ($product['notlp']) {
                    if (substr($product['notlp'], 0, 1) === '0') {
                        $notlp = substr($product['notlp'], 1);
                        $notlp = '62' . $notlp;
                    } ?>
                    <a type="button" href="https://api.whatsapp.com/send/?phone=<?= $notlp ?>&text=Apakah%20produk%20<?= $product['nama_produk'] ?>%20masih%20ada%3F&type=phone_number&app_absent=0" class="btn btn-primary">Beli <i class="fab fa-whatsapp fa-lg"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var fullscreenModal = document.getElementById('fullscreenModal');
    var fullscreenImage = document.getElementById('fullscreenImage');
    
    document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#fullscreenModal"]').forEach(function (element) {
        element.addEventListener('click', function () {
            fullscreenImage.src = this.getAttribute('data-src');
        });
    });
});
</script>

<style>


    .transparent-control .carousel-control-prev-icon,
    .transparent-control .carousel-control-next-icon {
        filter: opacity(50%);
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
    }

    .blur-img {
        filter: blur(5px);
        transition: filter 0.5s ease;
    }

    .carousel-item.active .blur-img {
        filter: none;
    }

    .rating {
        color: #FFD700;
        font-size: 1rem;
    }

    .rating i {
        margin-right: 2px;
    }
</style>
<?= $this->endSection(); ?>