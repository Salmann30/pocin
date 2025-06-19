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
    font-size: 1.3rem;
}

p {
    color: #555;
    line-height: 1.7;
    font-size: 1.1rem;
}

h3 {
    font-size: 1.8rem;
}

.mission-item p {
    font-size: 1.05rem;
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
                                <p class="lead mb-4">UMKM Pondok Cina berdedikasi untuk memberdayakan pelaku usaha kecil dengan menyediakan produk lokal berkualitas tinggi yang mencerminkan kekayaan budaya dan kreativitas Indonesia.</p>
                                <p>Kami berkomitmen untuk mendukung pertumbuhan ekonomi masyarakat melalui inovasi dan kerja sama, sambil menjaga nilai-nilai tradisional yang menjadi identitas kami.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission combined card -->
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row">
                            <!-- Vision Section -->
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <div class="vision-section text-center h-100 d-flex flex-column justify-content-center">
                                    <h3 class="fw-bold mb-4 text-primary">Visi Kami</h3>
                                    <div class="vision-quote position-relative p-4 bg-light rounded-3">
                                        <i class="fas fa-quote-left text-primary mb-3" style="font-size: 2rem; opacity: 0.3; float: left;"></i>
                                        <p class="mb-0 fw-semibold text-dark pt-5" style="font-size: 1.2rem; line-height: 1.6;">
                                            Menjadi partner strategis dalam menumbuh kembangkan UMKM Pondokcina yang berdaya saing.
                                        </p>
                                        <i class="fas fa-quote-right text-primary mt-3" style="font-size: 2rem; opacity: 0.3; float: right;"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Divider -->
                            <div class="col-lg-1 d-none d-lg-flex align-items-center justify-content-center">
                                <div class="vr h-75 opacity-25"></div>
                            </div>
                            
                            <!-- Mission Section -->
                            <div class="col-lg-7">
                                <h3 class="fw-bold mb-4 text-primary">Misi Kami</h3>
                                <div class="mission-list">
                                    <div class="mission-item d-flex mb-3 p-3 bg-light rounded-3">
                                        <div class="mission-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; font-size: 0.9rem; font-weight: bold;">01</div>
                                        <p class="mb-0">Menjadi wadah sosialisasi, komunikasi, dan berbagi ilmu antara para pelaku UMKM Kelurahan Pondokcina.</p>
                                    </div>
                                    <div class="mission-item d-flex mb-3 p-3 bg-light rounded-3">
                                        <div class="mission-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; font-size: 0.9rem; font-weight: bold;">02</div>
                                        <p class="mb-0">Menjembatani pelaku UMKM Pondokcina dengan pihak pemerintah dan swasta.</p>
                                    </div>
                                    <div class="mission-item d-flex mb-3 p-3 bg-light rounded-3">
                                        <div class="mission-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; font-size: 0.9rem; font-weight: bold;">03</div>
                                        <p class="mb-0">Membawa UMKM Pondokcina ke pasar digital dan melek teknologi.</p>
                                    </div>
                                    <div class="mission-item d-flex mb-3 p-3 bg-light rounded-3">
                                        <div class="mission-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; font-size: 0.9rem; font-weight: bold;">04</div>
                                        <p class="mb-0">Membuka dan memperluas jaringan para pelaku UMKM.</p>
                                    </div>
                                    <div class="mission-item d-flex mb-3 p-3 bg-light rounded-3">
                                        <div class="mission-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; font-size: 0.9rem; font-weight: bold;">05</div>
                                        <p class="mb-0">Menumbuh kembangkan pelaku usaha baru yang berdaya saing.</p>
                                    </div>
                                    <div class="mission-item d-flex p-3 bg-light rounded-3">
                                        <div class="mission-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; font-size: 0.9rem; font-weight: bold;">06</div>
                                        <p class="mb-0">Meningkatkan kualitas pelaku UMKM melalui program pelatihan, pembinaan, dan pendampingan.</p>
                                    </div>
                                </div>
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