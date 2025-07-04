<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<style>
	.green-circle {
		position: absolute;
		inset: 0;
		background-color: #22c55e;
		border-radius: 9999px;
		transform: scale(0.9);
		z-index: 0;
	}

	.spicy-tag {
		position: absolute;
		top: 6rem;
		right: 80%;
		transform: translateX(50%);
		background-color: white;
		padding: 0.25rem 1rem;
		border-radius: 9999px;
		box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
		display: flex;
		align-items: center;
		white-space: nowrap;
	}

	.food-cards {
		position: absolute;
		bottom: 7rem;
		left: 50%;
		transform: translateX(-50%);
		display: flex;
		gap: 1rem;
	}

	.star {
		width: 10px;
		height: 10px;
		fill: gold;
		stroke: gold;
	}

	.category-card {
		position: relative;
		width: 100%;
		height: 180px;
		border-radius: 1rem;
		overflow: hidden;
		background-size: cover;
		background-position: center;
		color: #fff;
		display: flex;
		align-items: flex-end;
		transition: transform 0.2s;
	}

	.category-card:hover {
		transform: translateY(-5px);
	}

	.category-name {
		position: relative;
		z-index: 1;
		width: 100%;
		text-align: center;
		margin-bottom: 0.75rem;
		font-weight: 600;
		font-size: 1.3rem;
		color: black;
	}

	.category-img-wrapper {
		background-color: #d62828;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		margin: 0 auto 1rem auto;
		overflow: hidden;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.category-img-wrapper img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.umkm-card {
		height: 180px;
		border-radius: 1rem;
		background-size: cover;
		background-position: center;
		position: relative;
		color: white;
		overflow: hidden;
	}

	.umkm-card-overlay {
		transition: background-color 0.3s ease, color 0.3s ease;
		background: rgba(0, 0, 0, 0.5);
		color: #fff;
	}

	.umkm-card:hover .umkm-card-overlay {
		background: #fff !important;
		color: #000 !important;
	}

	.umkm-card:hover .umkm-card-overlay h5,
	.umkm-card:hover .umkm-card-overlay p {
		color: #000 !important;
	}

	.umkm-card-overlay h5,
	.umkm-card-overlay p {
		color: #fff;
	}

	.product-card {
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		will-change: transform;
	}

	.product-card:hover {
		transform: scale(1.03);
		box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
	}

	.product-image-container {
		border-top-left-radius: 0.5rem;
		border-top-right-radius: 0.5rem;
		overflow: hidden;
	}

	.product-image-container img {
		object-fit: cover;
		width: 100%;
		height: 100%;
	}

	.btn-href {
		display: inline-block;
		padding: 0.5rem 1.25rem;
		border: 2px solid var(--bs-danger);
		color: var(--bs-danger);
		border-radius: 999px;
		font-weight: 500;
		transition: all 0.3s ease;
		text-align: center;
		text-decoration: none;
	}

	.btn-href:hover {
		background-color: var(--bs-danger);
		color: #fff;
	}

	.btn-danger:hover {
		background-color: rgb(156, 40, 51) !important;
		border-color: #bd2130 !important;
	}

	.btn-outline-secondary:hover {
		background-color: #f8f9fa;
		color: #000;
		border-color: #ced4da;
		transition: background-color 0.2s ease, color 0.2s ease;
	}

	.btn-outline-secondary svg {
		transition: transform 0.2s ease;
	}

	.btn-outline-secondary:hover svg {
		transform: scale(1.1);
	}

	/* Carousel Controls */
	.carousel-control-prev,
	.carousel-control-next {
		width: 10%;
		top: 50%;
		transform: translateY(-50%);
		z-index: 10;
	}

	.carousel-control-prev {
		left: -3%;
	}

	.carousel-control-next {
		right: -3%;
	}

	.container,
	.container-fluid {
		overflow-x: hidden;
	}

	/* --- Carousel Modal Buttons --- */
	.modal .carousel-control-prev,
	.modal .carousel-control-next {
		width: 3rem;
		height: 3rem;
		top: 50%;
		transform: translateY(-50%);
		background-color: rgba(0, 0, 0, 0.5);
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		opacity: 0.8;
		transition: background-color 0.2s ease;
	}

	.modal .carousel-control-prev:hover,
	.modal .carousel-control-next:hover {
		background-color: rgba(0, 0, 0, 0.7);
	}

	.modal .carousel-control-prev-icon,
	.modal .carousel-control-next-icon {
		width: 1.25rem;
		height: 1.25rem;
		background-size: 100% 100%;
	}

	/* Gambar dalam carousel */
	.modal .carousel-inner img {
		border-radius: 0.5rem;
		object-fit: cover;
		width: 100%;
		height: auto;
		max-height: 300px;
	}

	/* Tombol beli WhatsApp */
	.btn-whatsapp {
		background-color: #25d366;
		color: white;
		font-weight: 600;
	}

	.btn-whatsapp:hover {
		background-color: #1ebd5c;
		color: white;
	}

	@media (max-width: 768px) {
		#hero {
			padding-top: 5rem;
		}

		.spicy-tag {
			top: 4rem;
		}

		.food-cards {
			bottom: 5rem;
		}

		#produkCarouselMobile {
			margin-top: 2rem;
		}

		.btn-href {
		font-size: 0.875rem; 
		padding: 0.4rem 1rem; 
	}
	}
</style>

<!-- Hero Start -->
<div class="container py-5 min-vh-100 mt-2">
	<!-- Hero Section -->
	<div class="row align-items-center mb-5 pt-5" id="hero">
		<div class="col-md-6">
			<h1 class="display-5 fw-bold">
				Dukung UMKM Lokal. Temukan Produk Terbaik di
				<span class="text-danger">UBERMAN</span> Sekarang!
			</h1>
			<p class="text-muted mb-4">
				Setiap Pesanan adalah Langkah Nyata untuk Mengangkat Cita Rasa, Karya, dan Inovasi UMKM
				Indonesia.
			</p>

			<?php if (!empty($pesan)) : ?>
			<div class="alert alert-warning col-md-10 mb-4" role="alert">
				<?= $pesan ?>
			</div>
			<?php endif; ?>

			<div class="d-flex flex-wrap gap-3">
				<a
					href="<?= base_url('produk') ?>"
					class="btn btn-danger btn-lg rounded-pill shadow fw-semibold">
					Pesan Sekarang
				</a>
				<a
					href="#"
					class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm d-inline-flex align-items-center justify-content-center gap-2 fw-semibold text-nowrap"
					style="white-space: nowrap">
					<span>Tonton Video</span>
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="20"
						height="20"
						fill="none"
						stroke="currentColor"
						stroke-width="2"
						stroke-linecap="round"
						stroke-linejoin="round">
						<polygon points="5 3 19 12 5 21 5 3" />
					</svg>
				</a>
			</div>
		</div>

		<div class="col-md-6">
			<div id="heroCarousel" class="carousel slide rounded mt-5 mt-md-0" data-bs-ride="carousel">
				<div class="carousel-inner rounded">
					<?php foreach ($banners as $index =>
					$banner): ?>
					<div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
						<img
							src="<?= base_url('uploads/' . $banner['image']) ?>"
							class="d-block w-75 mx-auto"
							alt="Banner <?= esc($banner['title']) ?>"
							loading="lazy" />
					</div>
					<?php endforeach; ?>
				</div>
				<button
					class="carousel-control-prev"
					type="button"
					data-bs-target="#heroCarousel"
					data-bs-slide="prev">
					<span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
					<span class="visually-hidden">Sebelumnya</span>
				</button>
				<button
					class="carousel-control-next"
					type="button"
					data-bs-target="#heroCarousel"
					data-bs-slide="next">
					<span class="carousel-control-next-icon bg-dark rounded-circle"></span>
					<span class="visually-hidden">Berikutnya</span>
				</button>
			</div>
		</div>
	</div>

	<div class="container-fluid mt-4">
		<div class="d-flex align-items-center justify-content-center flex-wrap gap-3 mb-4">
			<div class="text-center">
				<h2 class="fw-bold display-6 mt-2 mb-0">Rekomendasi Produk</h2>
			</div>
		</div>
		<?php
	shuffle($tab1);
	$tab1 = array_slice($tab1, 0, 10);
	$desktopSlides = array_chunk($tab1, 5); // 5 produk per slide
	$mobileSlides = array_chunk($tab1, 1);  // 1 produk per slide
	?>

		<div
			id="produkCarouselDesktop"
			class="carousel slide d-none d-md-block"
			data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ($desktopSlides as $i =>
				$produkChunk): ?>
				<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
					<div class="row row-cols-md-5 g-3">
						<?php foreach ($produkChunk as $pr): ?>
						<div class="col">
							<div
								class="card h-100 border-0 shadow-sm product-card"
								role="button"
								data-bs-toggle="modal"
								data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
								<div class="ratio ratio-1x1 product-image-container rounded-top overflow-hidden">
									<img
										src="<?= $pr['img_produk'] ?: base_url('img/produk/default.jpg') ?>"
										class="img-fluid object-fit-cover w-100 h-100"
										alt="<?= esc($pr['nama_produk']) ?>"
										loading="lazy" />
								</div>
								<div class="card-body text-center d-flex flex-column justify-content-between p-3">
									<h6
										class="fw-semibold text-dark mb-1 text-truncate"
										title="<?= $pr['nama_produk'] ?>">
										<?= ucwords($pr['nama_produk']) ?>
									</h6>
									<small class="text-muted text-truncate" title="<?= $pr['umkm'] ?? 'Nama UMKM' ?>">
										<?= $pr['umkm'] ?? 'Nama UMKM' ?>
									</small>
									<div class="mt-2">
										<span class="fw-bold text-primary fs-6">
											Rp<?= number_format($pr['harga_produk'], 0, ',', '.') ?>
										</span>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<button
				class="carousel-control-prev"
				type="button"
				data-bs-target="#produkCarouselDesktop"
				data-bs-slide="prev">
				<span class="carousel-control-prev-icon"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button
				class="carousel-control-next"
				type="button"
				data-bs-target="#produkCarouselDesktop"
				data-bs-slide="next">
				<span class="carousel-control-next-icon"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<div id="produkCarouselMobile" class="carousel slide d-block d-md-none" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ($mobileSlides as $i =>
				$produkChunk): ?>
				<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
					<div class="row g-3">
						<?php foreach ($produkChunk as $pr): ?>
						<div class="col-12">
							<div
								class="card h-100 border-0 shadow-sm product-card"
								role="button"
								data-bs-toggle="modal"
								data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
								<div class="ratio ratio-1x1 product-image-container rounded-top overflow-hidden">
									<img
										src="<?= $pr['img_produk'] ?: base_url('img/produk/default.jpg') ?>"
										class="img-fluid object-fit-cover w-100 h-100"
										alt="<?= esc($pr['nama_produk']) ?>"
										loading="lazy" />
								</div>
								<div class="card-body text-center d-flex flex-column justify-content-between p-3">
									<h6
										class="fw-semibold text-dark mb-1 text-truncate"
										title="<?= $pr['nama_produk'] ?>">
										<?= ucwords($pr['nama_produk']) ?>
									</h6>
									<small class="text-muted text-truncate" title="<?= $pr['umkm'] ?? 'Nama UMKM' ?>">
										<?= $pr['umkm'] ?? 'Nama UMKM' ?>
									</small>
									<div class="mt-2">
										<span class="fw-bold text-primary fs-6">
											Rp<?= number_format($pr['harga_produk'], 0, ',', '.') ?>
										</span>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<button
				class="carousel-control-prev"
				type="button"
				data-bs-target="#produkCarouselMobile"
				data-bs-slide="prev">
				<span class="carousel-control-prev-icon"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button
				class="carousel-control-next"
				type="button"
				data-bs-target="#produkCarouselMobile"
				data-bs-slide="next">
				<span class="carousel-control-next-icon"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
</div>

<!-- Hero End -->
<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<?php foreach ($tab1 as $product) : ?>
	<div class="modal fade" id="detailProdukModal<?= $product['id_produk'] ?>" tabindex="-1" aria-labelledby="editProdukModalLabel<?= $product['id_produk'] ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProdukModalLabel<?= $product['id_produk'] ?>">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row">
          <!-- Carousel Image -->
          <div class="col-md-5 text-center">
            <div id="carouselExample<?= $product['id_produk'] ?>" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?= base_url() . $product['img_produk'] ?>" class="d-block w-100" alt="Produk">
                </div>
                <?php if ($product['img_produk2']): ?>
                <div class="carousel-item">
                  <img src="<?= base_url() . $product['img_produk2'] ?>" class="d-block w-100" alt="Produk 2">
                </div>
                <?php endif; ?>
                <?php if ($product['img_produk3']): ?>
                <div class="carousel-item">
                  <img src="<?= base_url() . $product['img_produk3'] ?>" class="d-block w-100" alt="Produk 3">
                </div>
                <?php endif; ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?= $product['id_produk'] ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?= $product['id_produk'] ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>

            <h6 class="mt-3"><?= ucwords($product['nama_produk']) ?></h6>
          </div>

          <!-- Detail Produk -->
          <div class="col-md-7">
            <table class="table table-sm table-borderless">
              <tr>
                <td>UMKM</td>
                <td>:</td>
                <td>
                  <?php if (!empty($product['umkm']) && !empty($product['username'])): ?>
                    <a href="<?= base_url('umkm/') . $product['username'] ?>">
                      <?= $product['umkm'] ?>
                    </a>
                  <?php else: ?>
                    <span class="text-muted">Nama UMKM</span>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><?= $product['subkat'] ?> (<?= $product['kategori'] ?>)</td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>:</td>
                <td><strong>Rp<?= number_format($product['harga_produk'], 0, ',', '.') ?></strong></td>
              </tr>
              <tr>
                <td>Stok</td>
                <td>:</td>
                <td><?= number_format($product['stok_produk'], 0, ',', '.') ?></td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><?= ucfirst($product['ket_produk']) ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="modal-footer justify-content-end">
        <!-- Tombol WhatsApp -->
        <?php
        if (!empty($product['notlp'])) {
          $notlp = $product['notlp'];
          if (substr($notlp, 0, 1) === '0') {
            $notlp = '62' . substr($notlp, 1);
          }
        ?>
          <a href="https://api.whatsapp.com/send/?phone=<?= $notlp ?>&text=Halo,%20saya%20tertarik%20dengan%20produk%20<?= urlencode($product['nama_produk']) ?>.%20Apakah%20masih%20tersedia?" target="_blank" class="btn btn-whatsapp">
            <i class="fab fa-whatsapp me-2"></i> Beli via WhatsApp
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>


<?php endforeach; ?>

<div class="container-fluid banner pb-5">
	<div class="container pb-5 position-relative">
		<!-- Section Heading -->
		<div class="d-flex align-items-center justify-content-center flex-wrap gap-3 mb-4">
			<div class="text-center">
				<h2 class="fw-bold display-6 mt-2 mb-0">Kenali Lebih Dekat<br />UMKM Kita</h2>
			</div>
		</div>

		<!-- Desktop Carousel (3 UMKM per slide) -->
		<div
			id="umkmCarouselDesktop"
			class="carousel slide d-none d-md-block position-relative"
			data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach (array_chunk($q_kul, 3) as $i =>
				$umkmGroup): ?>
				<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
					<div class="row justify-content-center">
						<?php foreach ($umkmGroup as $k): ?>
						<div class="col-md-4 mb-3">
							<a
								href="<?= base_url('umkm/' . urlencode($k['username'])) ?>"
								class="text-decoration-none">
								<div
									class="umkm-card position-relative rounded overflow-hidden"
									style="
										width: 100%;
										padding-top: 100%;
										background-image: url('<?= base_url($k['user_img'] ?: 'default.png') ?>');
										background-size: cover;
										background-position: center;
										box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
									">
									<div class="umkm-card-overlay position-absolute bottom-0 start-0 end-0 p-3">
										<h5 class="mb-1 fw-bold" style="font-size: 1rem">
											<?= htmlentities($k['nama_umkm'] ?? 'Brand UMKM') ?>
										</h5>
										<p class="mb-0" style="font-size: 0.9rem">
											<?= htmlentities(explode(' ', trim($k['fullname'] ?? 'Pemilik'))[0]) ?>
										</p>
									</div>
								</div>
							</a>
						</div>
						<?php endforeach ?>
					</div>
				</div>
				<?php endforeach ?>
			</div>

			<!-- Carousel Controls for Desktop -->
			<button
				class="btn btn-dark rounded-circle prev-btn position-absolute top-50 start-0 translate-middle-y"
				type="button"
				data-bs-target="#umkmCarouselDesktop"
				data-bs-slide="prev"
				style="width: 50px; height: 50px; font-size: 20px">
				<i class="bi bi-chevron-left" style="color: black"></i>
			</button>
			<button
				class="btn btn-dark rounded-circle next-btn position-absolute top-50 end-0 translate-middle-y"
				type="button"
				data-bs-target="#umkmCarouselDesktop"
				data-bs-slide="next"
				style="width: 50px; height: 50px; font-size: 20px">
				<i class="bi bi-chevron-right" style="color: black"></i>
			</button>
		</div>

		<!-- Mobile Carousel (1 UMKM per slide) -->
		<div
			id="umkmCarouselMobile"
			class="carousel slide d-md-none position-relative"
			data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach (array_chunk($q_kul, 1) as $i =>
				$umkmGroup): ?>
				<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
					<div class="row justify-content-center">
						<?php foreach ($umkmGroup as $k): ?>
						<div class="col-12 mb-3">
							<a
								href="<?= base_url('umkm/' . urlencode($k['username'])) ?>"
								class="text-decoration-none">
								<div
									class="umkm-card position-relative rounded overflow-hidden"
									style="
										width: 100%;
										padding-top: 100%;
										background-image: url('<?= base_url($k['user_img'] ?: 'default.png') ?>');
										background-size: cover;
										background-position: center;
										box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
									">
									<div class="umkm-card-overlay position-absolute bottom-0 start-0 end-0 p-3">
										<h5 class="mb-1 fw-bold" style="font-size: 1rem">
											<?= htmlentities($k['umkm'] ?? 'Brand UMKM') ?>
										</h5>
										<p class="mb-0" style="font-size: 0.9rem">
											<?= htmlentities(explode(' ', trim($k['fullname'] ?? 'Pemilik'))[0]) ?>
										</p>
									</div>
								</div>
							</a>
						</div>
						<?php endforeach ?>
					</div>
				</div>
				<?php endforeach ?>
			</div>

			<!-- Carousel Controls for Mobile -->
			<button
				class="btn btn-dark rounded-circle prev-btn position-absolute top-50 start-0 translate-middle-y"
				type="button"
				data-bs-target="#umkmCarouselMobile"
				data-bs-slide="prev"
				style="width: 50px; height: 50px; font-size: 20px">
				<i class="bi bi-chevron-left" style="color: black"></i>
			</button>
			<button
				class="btn btn-dark rounded-circle next-btn position-absolute top-50 end-0 translate-middle-y"
				type="button"
				data-bs-target="#umkmCarouselMobile"
				data-bs-slide="next"
				style="width: 50px; height: 50px; font-size: 20px">
				<i class="bi bi-chevron-right" style="color: black"></i>
			</button>
		</div>

		<!-- CTA Button -->
		<div class="tab-class text-center pt-2 mt-1">
			<div class="row g-4 justify-content-end">
				<div class="col-md-6 col-lg-4 mb-4 col-xl-3 col-6 text-end">
					<div class="d-flex justify-content-center flex-lg-wrap">
					<a href="<?= base_url('/umkms'); ?>" class="btn-href ">
    Lihat Selengkapnya
</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Testimonial Section -->
<div class="bg-primary py-5 text-white">
	<div class="container">
		<!-- Heading -->
		<div class="text-center mb-5">
			<h2 class="display-6 fw-bold mb-0 text-white">Kata Mereka Tentang Kami</h2>
		</div>

		<!-- Desktop Carousel (3 per slide) -->
		<div
			id="testimonialCarouselDesktop"
			class="carousel slide d-none d-md-block"
			data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach (array_chunk($allTestimoni, 3) as $i =>
				$chunk): ?>
				<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
					<div class="row g-4">
						<?php foreach ($chunk as $testi): ?>
						<div class="col-md-4">
							<div class="card border-0 text-dark h-100">
								<div class="card-body">
									<!-- Bintang -->
									<div class="mb-2 text-warning">
										<?php
												$stars = round($testi['bintang']);
												for ($s = 1; $s <= 5; $s++) {
													echo $s <= $stars ? '★' : '☆';
												}
												?>
									</div>
									<p class="mb-4 fs-5">"<?= esc($testi['ket_testi']) ?>"</p>
									<div class="d-flex align-items-center">
										<div>
											<h5 class="mb-0 fw-semibold"><?= esc($testi['nama_cus']) ?></h5>
											<small class="text-dark"
												><?= date('d M Y', strtotime($testi['tanggal_testi'])) ?></small
											>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
				<?php endforeach ?>
			</div>

			<!-- Carousel Controls -->
			<div class="d-flex flex-row justify-content-center mt-4">
				<button
					class="btn btn-light me-2"
					data-bs-target="#testimonialCarouselDesktop"
					data-bs-slide="prev">
					‹
				</button>
				<button
					class="btn btn-light ms-2"
					data-bs-target="#testimonialCarouselDesktop"
					data-bs-slide="next">
					›
				</button>
			</div>
		</div>

		<!-- Mobile Carousel (1 per slide) -->
		<div id="testimonialCarouselMobile" class="carousel slide d-md-none" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ($allTestimoni as $i =>
				$testi): ?>
				<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
					<div class="d-flex flex-column align-items-center">
						<div class="card border-0 text-dark w-75">
							<div class="card-body">
								<!-- Bintang -->
								<div class="mb-2 text-warning text-center">
									<?php
										$stars = round($testi['bintang']);
										for ($s = 1; $s <= 5; $s++) {
											echo $s <= $stars ? '★' : '☆';
										}
										?>
								</div>
								<p class="mb-4 fs-5 text-center">"<?= esc($testi['ket_testi']) ?>"</p>
								<div class="d-flex align-items-center justify-content-center text-center">
									
									<div>
										<h5 class="mb-0 fw-semibold"><?= esc($testi['nama_cus']) ?></h5>
										<small class="text-dark"
											><?= date('d M Y', strtotime($testi['tanggal_testi'])) ?></small
										>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>

			<!-- Carousel Controls -->
			<div class="d-flex flex-row justify-content-center mt-4">
				<button
					class="btn btn-light me-2"
					data-bs-target="#testimonialCarouselMobile"
					data-bs-slide="prev">
					‹
				</button>
				<button
					class="btn btn-light ms-2"
					data-bs-target="#testimonialCarouselMobile"
					data-bs-slide="next">
					›
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Services Section -->
<div class="container py-5">
	<div class="row g-4 align-items-stretch">
		<!-- Description -->
		<div class="col-md-6 d-flex flex-column justify-content-between">
			<div>
				<div class="mb-4">
					<p class="text-danger text-uppercase fw-medium">LAYANAN KAMI</p>
					<h2 class="fw-bold display-6">Produk UMKM &<br />Kemudahan Pemesanan</h2>
				</div>
				<p>
					Website ini menghadirkan berbagai produk unggulan dari pelaku UMKM lokal. Pembelian dapat
					dilakukan dengan mudah melalui WhatsApp, memberikan kenyamanan dalam bertransaksi secara
					langsung dengan penjual.
				</p>
			</div>
		</div>

		<!-- Service Cards -->
		<div class="col-md-6">
			<div class="row g-3">
				<!-- Card 1 -->
				<div class="col-12 col-md-6">
					<div class="card h-100 shadow-sm border">
						<div class="card-body">
							<div
								class="bg-danger bg-opacity-10 p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
								style="width: 48px; height: 48px">
								<img
									src="https://api.iconify.design/mdi:silverware-fork-knife.svg?color=%23ffffff"
									alt="Food"
									width="24"
									height="24" />
							</div>
							<h5 class="fw-bold text-success">LAYANAN PESAN ANTAR</h5>
							<p class="text-muted small">Cepat dan terjamin kualitasnya</p>
						</div>
					</div>
				</div>

				<!-- Card 2 -->
				<div class="col-12 col-md-6">
					<div class="card h-100 shadow-sm border">
						<div class="card-body">
							<div
								class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
								style="width: 48px; height: 48px">
								<img
									src="https://api.iconify.design/mdi:clock-outline.svg?color=%23ffffff"
									alt="Time"
									width="24"
									height="24" />
							</div>
							<h5 class="fw-bold text-success">KIRIM CEPAT</h5>
							<p class="text-muted small">Pesanan tiba dalam waktu singkat</p>
						</div>
					</div>
				</div>

				<!-- Card 3 -->
				<div class="col-12 col-md-6">
					<div class="card h-100 shadow-sm border">
						<div class="card-body">
							<div
								class="bg-danger bg-opacity-10 p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
								style="width: 48px; height: 48px">
								<img
									src="https://api.iconify.design/mdi:cart-outline.svg?color=%23ffffff"
									alt="Cart"
									width="24"
									height="24" />
							</div>
							<h5 class="fw-bold text-success">PEMESANAN MUDAH</h5>
							<p class="text-muted small">Langsung hubungi via WhatsApp</p>
						</div>
					</div>
				</div>

				<!-- Card 4 -->
				<div class="col-12 col-md-6">
					<div class="card h-100 shadow-sm border">
						<div class="card-body">
							<div
								class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
								style="width: 48px; height: 48px">
								<img
									src="https://api.iconify.design/mdi:gift-outline.svg?color=%23ffffff"
									alt="Gift"
									width="24"
									height="24" />
							</div>
							<h5 class="fw-bold text-success">VARIASI PRODUK</h5>
							<p class="text-muted small">Tersedia beragam pilihan produk</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Tujuan Start -->
<!-- <div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-3">
            <div class="col-md-12 text-center mb-5" >
                <h1 >Misi UMKM Mekarsari</h1>
            </div>
            <div class="col-md-6 col-lg-4 col-6">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-network-wired fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-dark fw-bold text-center">
                        <p class="mb-0">Mencetak 4.000 wirausaha di Kelurahan Mekarsari
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-6">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-handshake fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-dark fw-bold text-center">
                        <p class="mb-0">Menjadi wadah sinergitas antar para pelaku usaha di Kelurahan Mekarsari</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-6">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-bullhorn fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-dark fw-bold text-center">
                        <p class="mb-0">Memperluas pemasaran bagi para pelaku usaha di Kelurahan Mekarsari
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-6">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-chart-line fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-dark fw-bold text-center">
                        <p class="mb-0">Meningkatkan kesejahteraan dan kemandirian pelaku usaha di Kelurahan
                            Mekarsari
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-6">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-chalkboard-teacher fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-dark fw-bold text-center">
                        <p class="mb-0">Mengadakan pembinaan bagi calon pengusaha baru di lingkungan kecamatan
                            Mekarsari
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-6">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-users fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-dark fw-bold text-center">
                        <p class="mb-0">Menjadi fasilitator pelatihan dan memberikan informasi dalam dunia usaha 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Tujuan End -->

<?= $this->endSection(); ?>
