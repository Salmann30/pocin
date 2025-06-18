<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<!-- Single Page Header start -->

<!-- Single Page Header End -->

<style>
    /* Modern About Section Styling */

.about-section {
    background-color: #f8f9fa;
}

/* Custom divider */
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

/* Card styling */
.rounded-4 {
    border-radius: 1rem !important;
}

/* Badge styling */
.badge.bg-primary-subtle {
    background-color: rgba(var(--bs-primary-rgb), 0.1);
    font-weight: 500;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    border-radius: 2rem;
}

.badge.bg-light {
    font-weight: 500;
    font-size: 0.85rem;
}

/* Icon circles */
.icon-circle {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    font-size: 1.5rem;
}

/* Mission styling */
.mission-number {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--bs-primary);
    opacity: 0.8;
    min-width: 40px;
}

.mission-item {
    padding: 0.5rem 0;
}

.about-image {
    position: relative;
}

.about-image::before {
    content: "";
    position: absolute;
    bottom: -15px;
    right: -15px;
    width: 100%;
    height: 100%;
    border-radius: 1rem;
    z-index: -1;
}

/* Responsive fixes */
@media (max-width: 991px) {
    .about-image::before {
        bottom: -10px;
        right: -10px;
    }
    
    .icon-circle {
        width: 60px;
        height: 60px;
        font-size: 1.25rem;
    }
    
    .mission-number {
        font-size: 1rem;
        min-width: 30px;
    }
}

/* Animation for hover effects */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

/* Improve legibility */
.lead {
    font-weight: 400;
    line-height: 1.6;
}

p {
    color: #555;
    line-height: 1.7;
}
</style>

<!-- Contact Start -->
<section class="about-section py-5 mt-5">
    <div class="container pt-5">
        <!-- Header with subtle decoration -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-primary-subtle text-primary mb-2 fs-4">Tentang Kami</span>
                <h2 class="display-5 fw-bold mb-4">UMKM Pondok Cina</h2>
            
            </div>
        </div>

        <!-- Main content in cards -->
        <div class="row g-4">
            <!-- About card -->
            <div class="col-lg-12 mb-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row align-items-center">
                            <div class="col-lg-5 mb-4 mb-lg-0">
                                <div class="about-image rounded-4 overflow-hidden">
                                    <img src="<?= base_url('img/KatalogLogo.png') ?>" class="img-fluid" alt="UMKM Pocin">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <h3 class="fw-bold mb-4">Mendukung Pelaku Usaha Lokal</h3>
                                <p class="lead mb-4">UMKM Mekarsari berdedikasi untuk memberdayakan pelaku usaha kecil dengan menyediakan produk lokal berkualitas tinggi yang mencerminkan kekayaan budaya dan kreativitas Indonesia.</p>
                                <p>Kami berkomitmen untuk mendukung pertumbuhan ekonomi masyarakat melalui inovasi dan kerja sama, sambil menjaga nilai-nilai tradisional yang menjadi identitas kami.</p>
                                
                                <div class="d-flex flex-wrap gap-2 mt-4">
                                    <span class="badge rounded-pill bg-light text-dark py-2 px-3">
                                        <i class="fas fa-handshake me-2"></i>Kolaborasi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark py-2 px-3">
                                        <i class="fas fa-lightbulb me-2"></i>Inovasi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark py-2 px-3">
                                        <i class="fas fa-heart me-2"></i>Pemberdayaan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission cards -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="vision-icon mb-4">
                            <span class="icon-circle bg-primary-subtle text-primary">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <h3 class="fw-bold mb-4">Visi Kami</h3>
                        <p>Menjadi UMKM yang mampu menciptakan inovasi yang berkelanjutan, mandiri secara finansial dan operasional, serta memiliki daya saing tinggi baik di pasar lokal maupun nasional.</p>
                        <p>Dengan fokus pada pengembangan produk berkualitas, pelayanan yang prima, dan adaptasi terhadap perkembangan teknologi, UMKM Mekarsari berkomitmen untuk memberdayakan masyarakat sekitar, menciptakan lapangan kerja, serta berkontribusi positif terhadap perekonomian daerah.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="mission-icon mb-4">
                            <span class="icon-circle bg-primary-subtle text-primary">
                                <i class="fas fa-bullseye"></i>
                            </span>
                        </div>
                        <h3 class="fw-bold mb-4">Misi Kami</h3>
                        <div class="mission-list">
                            <div class="mission-item d-flex mb-3">
                                <div class="mission-number me-3">01</div>
                                <p class="mb-0">Menjadi wadah saling belajar, berbagi dan mendukung bagi UMKM Mekarsari yang berkomitmen untuk naik kelas.</p>
                            </div>
                            <div class="mission-item d-flex mb-3">
                                <div class="mission-number me-3">02</div>
                                <p class="mb-0">Mengembangkan program pelatihan dan pendampingan yang efektif untuk meningkatkan keterampilan dan pengetahuan para pelaku UMKM.</p>
                            </div>
                            <div class="mission-item d-flex">
                                <div class="mission-number me-3">03</div>
                                <p class="mb-0">Mendorong kolaborasi antar UMKM dan pemangku kepentingan lainnya, termasuk pemerintah, lembaga keuangan, dan komunitas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact End -->

<?= $this->endSection(); ?>