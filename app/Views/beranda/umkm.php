<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>


<style>
/* Modern UMKM Listing Section Styling */

.umkm-listing-section {
    background-color: #f8f9fa;
}

/* Header Styling (matches about section) */
.divider-custom {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 1.5rem 0;
}

.divider-line {
    width: 80px;
    height: 2px;
    background-color: rgba(var(--bs-primary-rgb), 0.3);
}

.divider-icon {
    color: var(--bs-primary);
    padding: 0 1rem;
    font-size: 1rem;
}

.badge.bg-primary-subtle {
    background-color: rgba(var(--bs-primary-rgb), 0.1);
    font-weight: 500;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    border-radius: 2rem;
}

/* Card styling */
.rounded-4 {
    border-radius: 1rem !important;
}

.umkm-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.umkm-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
}

/* Card badge */
.card-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 2;
}

/* Card image styling */
.card-img-wrapper {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.umkm-card:hover .card-img-wrapper img {
    transform: scale(1.05);
}

/* Image overlay */
.img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.umkm-card:hover .img-overlay {
    opacity: 1;
}

/* UMKM Info styling */
.umkm-info {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.info-item {
    display: flex;
    align-items: start;
    font-size: 0.9rem;
    color: #666;
}

.info-item i {
    width: 20px;
    margin-right: 10px;
    font-size: 0.85rem;
    margin-top: 3px;
}

/* Form styling */
.rounded-pill-start {
    border-top-left-radius: 50rem !important;
    border-bottom-left-radius: 50rem !important;
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

.rounded-pill-end {
    border-top-right-radius: 50rem !important;
    border-bottom-right-radius: 50rem !important;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}

    /* Pagination container */
.pagination {
    background-color: transparent;
    gap: 0.3rem;
}

/* Set default look of page links */
.page-item .page-link {
    background-color: #FFFFFF;
    color: var(--bs-primary);
    border: 1px solid #dee2e6;
    transition: all 0.2s ease-in-out;
}

/* Hover effect on individual page links */
.page-item .page-link:hover {
    background-color: var(--bs-primary);
    color: #FFFFFF;
    border-color: var(--bs-primary);
}

/* Active page styling */
.page-item.active .page-link {
    background-color: var(--bs-primary);
    color: #FFFFFF;
    border-color: var(--bs-primary);
}


/* Alert styling */
.alert {
    border: none;
    padding: 1rem 1.25rem;
}

.alert i {
    width: 20px;
    text-align: center;
}

/* Form controls */
.form-control, .form-select {
    padding: 0.6rem 1rem;
    border: 1px solid #e0e0e0;
}

.form-control:focus, .form-select:focus {
    box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
    border-color: rgba(var(--bs-primary-rgb), 0.5);
}

.btn-outline-primary {
    border-width: 1.5px;
}

/* Responsive adjustments */
@media (max-width: 767.98px) {
    .card-img-wrapper {
        height: 160px;
    }
    
    .info-item {
        font-size: 0.8rem;
    }
    
    .card-badge {
        top: 10px;
        left: 10px;
    }
    
    .pagination-wrapper .page-item .page-link {
        width: 35px;
        height: 35px;
    }
}
</style>

<!-- UMKMs-->
<section class="umkm-listing-section py-5 mt-5">
    <div class="container pt-5">
        <!-- Header with subtle decoration -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-4">Daftar UMKM</h2>
                <p class="lead text-muted">Temukan berbagai UMKM potensial yang tergabung dalam komunitas kami</p>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="row mb-4">
                <div class="col-lg-6 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php elseif(!empty($pesan)) :?>
            <div class="row mb-4">
                <div class="col-lg-6 mx-auto">
                    <div class="alert alert-warning alert-dismissible fade show rounded-4 shadow-sm" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <?= $pesan ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif ; ?>

        <!-- UMKM Cards Grid -->
        <div class="row g-4">
            <?php foreach ($users as $user) : ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card umkm-card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                        <div class="card-img-wrapper">
                            <img src="<?= base_url('') . $user['user_img'] ?>" class="card-img-top" alt="<?= htmlspecialchars($user['nama_umkm'] ?: 'UMKM Image') ?>">
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3"><?= ucwords($user['nama_umkm'] ?: 'INI NAMA UMKM'); ?></h5>
                            
                            <div class="umkm-info">
                                <div class="info-item">
                                    <i class="fas fa-user text-primary"></i>
                                    <span><?= ($user['fullname']); ?></span>
                                </div>
                                
                                <div class="info-item">
                                    <i class="fab fa-instagram text-primary"></i>
                                    <?php if (empty($user['ig_user'])) : ?>
                                        <span>Belum tersedia</span>
                                    <?php else : ?>
                                        <a href="https://instagram.com/<?= $user['ig_user']?>" class="text-decoration-none" target="_blank">
                                            @<?= substr($user['ig_user'], 0, 15) . (strlen($user['ig_user']) > 15 ? '..' : '') ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                    <span class="text-truncate">
                                        <?= (strlen($user['alamat']) > 40) ? substr($user['alamat'], 0, 40) . '...' : $user['alamat']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-white p-4">
                            <div class="d-grid">
                                <a href="<?= base_url('umkm/') . $user['username'] ?>" class="btn btn-outline-primary rounded-pill">
                                    Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="pagination d-flex justify-content-center">
                                <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>