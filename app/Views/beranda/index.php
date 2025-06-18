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
		height: 180px; /* sebelumnya 140px */
		border-radius: 1rem;
		overflow: hidden;
		background-size: cover;
		background-position: center;
		color: #fff;
		display: flex;
		align-items: flex-end;
		transition: transform 0.2s;
	}

	.category-card::before {
		content: "";
		position: absolute;
		inset: 0;
	}

	.category-name {
		position: relative;
		z-index: 1;
		width: 100%;
		text-align: center;
		margin-bottom: 0.75rem; /* sedikit lebih rendah */
		font-weight: 600;
		font-size: 1.3rem; /* lebih besar dari sebelumnya */
		color: black;
	}

	.category-card:hover {
		transform: translateY(-5px);
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
		border-radius: 0;
	}

	.category-count {
		font-size: 0.9rem;
		color: #666;
	}

	.prev-btn,
	.next-btn {
		background-color: #efefef;
	}

	.prev-btn:hover,
	.next-btn:hover {
		background-color: #9a0606;
		color: white;
		border-color: #9a0606;
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

	.umkm-card-overlay h5,
	.umkm-card-overlay p {
		color: #fff; /* Tetap putih */
	}

	.umkm-card:hover .umkm-card-overlay {
		background: #fff !important;
		color: #000 !important;
	}

	.umkm-card:hover .umkm-card-overlay h5,
	.umkm-card:hover .umkm-card-overlay p {
		color: #000 !important; /* Teks berubah jadi hitam saat hover */
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
		background-color: rgb(156, 40, 51) !important; /* Lebih gelap dari merah aslinya */
		border-color: #bd2130 !important;
	}

	.btn-outline-secondary:hover {
		background-color: #f8f9fa; /* Warna abu soft saat hover */
		color: #000; /* Teks jadi lebih tegas */
		border-color: #ced4da;
		transition: background-color 0.2s ease, color 0.2s ease;
	}

	.btn-outline-secondary svg {
		transition: transform 0.2s ease;
	}

	.btn-outline-secondary:hover svg {
		transform: scale(1.1); /* Ikon membesar sedikit saat hover */
	}

	.carousel-control-prev,
.carousel-control-next {
	width: 5%;
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
	}
</style>

<!-- Hero Start -->
<div class="container py-5 min-vh-100 mt-2">
	<!-- Hero Section -->
	<div class="row align-items-center mb-5 pt-5" id="hero">
		<!-- Left: Text and Buttons -->
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
					class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm d-flex align-items-center gap-2 fw-semibold">
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

		<!-- Right: Hero Image Carousel -->
		<div class="col-md-6">
			<div id="heroCarousel" class="carousel slide  rounded" data-bs-ride="carousel">
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

	<!-- Desktop Carousel -->
	<div id="produkCarouselDesktop" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php foreach ($desktopSlides as $i => $produkChunk): ?>
			<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
				<div class="row row-cols-md-5 g-3">
					<?php foreach ($produkChunk as $pr): ?>
					<div class="col">
						<div class="card h-100 border-0 shadow-sm product-card hover-shadow transition"
							role="button"
							data-bs-toggle="modal"
							data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
							<div class="ratio ratio-4x3 product-image-container rounded-top overflow-hidden">
								<img src="<?= $pr['img_produk'] ?: base_url('img/produk/default.jpg') ?>"
									class="img-fluid object-fit-cover w-100 h-100"
									alt="<?= esc($pr['nama_produk']) ?>"
									loading="lazy" />
							</div>
							<div class="card-body text-center d-flex flex-column justify-content-between p-3">
								<h6 class="fw-semibold text-dark mb-1 text-truncate" title="<?= $pr['nama_produk'] ?>">
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

		<button class="carousel-control-prev" type="button" data-bs-target="#produkCarouselDesktop" data-bs-slide="prev">
			<span class="carousel-control-prev-icon"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#produkCarouselDesktop" data-bs-slide="next">
			<span class="carousel-control-next-icon"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<!-- Mobile Carousel -->
	<div id="produkCarouselMobile" class="carousel slide d-block d-md-none" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php foreach ($mobileSlides as $i => $produkChunk): ?>
			<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
				<div class="row g-3">
					<?php foreach ($produkChunk as $pr): ?>
					<div class="col-12">
						<div class="card h-100 border-0 shadow-sm product-card hover-shadow transition"
							role="button"
							data-bs-toggle="modal"
							data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
							<div class="ratio ratio-4x3 product-image-container rounded-top overflow-hidden">
								<img src="<?= $pr['img_produk'] ?: base_url('img/produk/default.jpg') ?>"
									class="img-fluid object-fit-cover w-100 h-100"
									alt="<?= esc($pr['nama_produk']) ?>"
									loading="lazy" />
							</div>
							<div class="card-body text-center d-flex flex-column justify-content-between p-3">
								<h6 class="fw-semibold text-dark mb-1 text-truncate" title="<?= $pr['nama_produk'] ?>">
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

<!-- Desktop Carousel Controls -->
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
</div>


</div>

<!-- Hero End -->
 <!-- Modal Detail Produk (Improved) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<?php foreach ($tab1 as $product) : ?>
<div
	class="modal fade"
	id="detailProdukModal<?= $product['id_produk'] ?>"
	tabindex="-1"
	aria-labelledby="editProdukModalLabel<?= $product['id_produk'] ?>"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editProdukModalLabel<?= $product['id_produk'] ?>">
					Detail Produk
				</h5>
				<button
					type="button"
					class="btn btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs mb-3" id="tabContent">
					<li class="nav-item">
						<a
							class="nav-link active"
							id="detail-tab"
							data-bs-toggle="tab"
							href="#detail-<?= $product['id_produk'] ?>"
							role="tab"
							>Detail</a
						>
					</li>
					<li class="nav-item">
						<a
							class="nav-link"
							id="testimoni-tab"
							data-bs-toggle="tab"
							href="#testimoni-<?= $product['id_produk'] ?>"
							role="tab"
							>Testimoni</a
						>
					</li>
				</ul>
				<div class="tab-content">
					<!-- Detail Produk -->
					<div
						class="tab-pane fade show active"
						id="detail-<?= $product['id_produk'] ?>"
						role="tabpanel">
						<div class="row justify-content-center mb-2">
							<div class="col-lg-4 col-6">
								<!-- Carousel -->
								<div
									id="carouselExample<?= $product['id_produk'] ?>"
									class="carousel slide"
									data-bs-ride="carousel"
									data-bs-interval="2000">
									<div class="carousel-inner">
										<div class="carousel-item active fruite-img">
											<img
												src="<?= base_url() . $product['img_produk'] ?>"
												class="img-fluid blur-img"
												alt=""
												data-bs-toggle="modal"
												data-bs-target="#fullscreenModal"
												data-src="<?= base_url() . $product['img_produk'] ?>" />
										</div>
										<?php if ($product['img_produk2']) :?>
										<div class="carousel-item fruite-img">
											<img
												src="<?= base_url() . $product['img_produk2'] ?>"
												class="img-fluid blur-img"
												alt=""
												data-bs-toggle="modal"
												data-bs-target="#fullscreenModal"
												data-src="<?= base_url() . $product['img_produk2'] ?>" />
										</div>
										<?php endif;?>
										<?php if ($product['img_produk3']) :?>
										<div class="carousel-item fruite-img">
											<img
												src="<?= base_url() . $product['img_produk3'] ?>"
												class="img-fluid blur-img"
												alt=""
												data-bs-toggle="modal"
												data-bs-target="#fullscreenModal"
												data-src="<?= base_url() . $product['img_produk3'] ?>" />
										</div>
										<?php endif;?>
									</div>
									<button
										class="carousel-control-prev transparent-control"
										type="button"
										data-bs-target="#carouselExample<?= $product['id_produk'] ?>"
										data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button
										class="carousel-control-next transparent-control"
										type="button"
										data-bs-target="#carouselExample<?= $product['id_produk'] ?>"
										data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>

								<div class="col-12 text-center mt-1 text-dark" style="font-size: 10pt">
									<strong
										><p><?= ucwords($product['nama_produk']) ?></p></strong
									>
								</div>
							</div>

							<div class="col-lg-8 row">
								<div class="col-12">
									<table class="table table-borderless mb-4" style="font-size: 9pt">
										<tbody>
											<tr>
												<td class="m-0 p-0">UMKM</td>
												<td class="m-0 p-0">&nbsp;&nbsp;</td>
												<td class="m-0 p-0 text-dark">
												<?php if (!empty($product['nama_umkm']) && !empty($product['username'])): ?>
    <a href="<?= base_url('umkm/') . $product['username'] ?>">
        <?= $product['nama_umkm'] ?>
    </a>
<?php else: ?>
    <span class="text-muted">Nama UMKM</span>
<?php endif; ?>

												</td>
											</tr>
											<tr>
												<td class="m-0 p-0">Kategori</td>
												<td class="m-0 p-0">&nbsp;&nbsp;</td>
												<td class="m-0 p-0 text-dark">
													<?= $product['subkat'] ?>
													(<?= $product['kategori'] ?>)
												</td>
											</tr>
											<tr>
												<td class="m-0 p-0">Harga</td>
												<td class="m-0 p-0">&nbsp;</td>
												<td class="m-0 p-0 text-dark">
													Rp<?= number_format($product['harga_produk'], 0, ',', '.'); ?>
												</td>
											</tr>
											<tr>
												<td class="m-0 p-0">Stok</td>
												<td class="m-0 p-0">&nbsp;&nbsp;</td>
												<td class="m-0 p-0 text-dark">
													<?= number_format($product['stok_produk'], 0, ',', '.'); ?>
												</td>
											</tr>
											<tr>
												<td class="m-0 p-0">Deskripsi</td>
												<td class="m-0 p-0">&nbsp;&nbsp;</td>
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
                                                    $bintangSetengah = ($testi['bintang'] - $bintangPenuh) >=
											0.5 ? 1 : 0; echo str_repeat('<i class="fas fa-star"></i>', $bintangPenuh); if
											($bintangSetengah) { echo '<i class="fas fa-star-half-alt"></i>'; } if
											($testi['bintang'] < 5 && $testi['bintang'] != 4.5) { $bintangKosong = 5 -
											($bintangPenuh + $bintangSetengah); echo str_repeat('<i
												class="far fa-star"></i
											>', $bintangKosong); } ?>
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
				<a
					type="button"
					href="https://api.whatsapp.com/send/?phone=<?= $notlp ?>&text=Apakah%20produk%20<?= $product['nama_produk'] ?>%20masih%20ada%3F&type=phone_number&app_absent=0"
					class="btn btn-success fw-semibold px-4"
					>Beli <i class="fab fa-whatsapp fa-lg"></i
				></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>


<!-- Kategori -->
<div class="container-fluid fruite pt-4">
	<div class="container py-0 rounded-3">
		<div class="tab-class text-center">
			<div class="row">
			<div class="d-flex align-items-center justify-content-center flex-wrap gap-3 mb-4">
			<div class="text-center">
				<h2 class="fw-bold display-6 mt-2 mb-0">Kategori UMKM
			</div>
		</div>
			</div>
			<div class="tab-content mb-5 pb-4">
				<div id="tab-1" class="tab-pane fade show p-0 active">
					<div class="row g-4">
						<div class="col-lg-12">
							<div class="row g-4 justify-content-center">
								<!-- <div class="tab-content mb-5">
                                    <div id="tab-1" class="tab-pane fade show p-0 active">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="row g-4 justify-content-center">
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <div class="col-md-2 col-lg-2 mb-2 col-xl-2 col-6">
                                                            <div class="rounded position-relative border border-secondary fruite-item justify-content-center">
                                                                <a href="<?= base_url('produk?kategori=') . urlencode($k['kategori']) ?>">
                                                                    <div class="fruite-img">
                                                                        <img src="<?= base_url($k['img_kategori']) ?>" class="img-fluid w-100 rounded-top" alt="">
                                                                    </div>
                                                                    <div class="p-4 border-top-0 rounded-bottom">
                                                                        <h4><?= $k['kategori'] ?></h4>
                                                                        <div class="d-flex justify-content-center flex-lg-wrap">
                                                                            <a href="<?= base_url('produk?kategori=') . urlencode($k['kategori']) ?>" class="btn border border-secondary rounded-pill px-3 text-primary">Lihat</a>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
								<?php foreach ($kategori as $k) : ?>
								<div class="col-md-4 col-lg-3 col-xl-3 col-6 mb-4">
									<a
										href="<?= base_url('produk?kategori=') . urlencode($k['kategori']) ?>"
										style="text-decoration: none">
										<div
											class="category-card"
											style="background-image: url('<?= base_url($k['img_kategori']) ?>')">
											<div class="category-name bg-white"><?= $k['kategori'] ?></div>
										</div>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Kategori -->

<!-- UMKM Banner Section -->
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
										background-image: url('<?= base_url($k['user_img']) ?>');
										background-size: cover;
										background-position: center;
										box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
									">
									<div class="umkm-card-overlay position-absolute bottom-0 start-0 end-0 p-3">
										<h5 class="mb-1 fw-bold" style="font-size: 1rem">
											<?= htmlentities($k['nama_umkm'] ?? 'Brand UMKM') ?>
										</h5>
										<p class="mb-0" style="font-size: 0.9rem">
											<?= htmlentities(explode(' ', trim($k['fullname'] ?? 'Nama Pemilik'))[0]) ?>
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
										background-image: url('<?= base_url($k['user_img']) ?>');
										background-size: cover;
										background-position: center;
										box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
									">
									<div class="umkm-card-overlay position-absolute bottom-0 start-0 end-0 p-3">
										<h5 class="mb-1 fw-bold" style="font-size: 1rem">
											<?= htmlentities($k['nama_umkm'] ?? 'Brand UMKM') ?>
										</h5>
										<p class="mb-0" style="font-size: 0.9rem">
											<?= htmlentities(explode(' ', trim($k['fullname'] ?? 'Nama Pemilik'))[0]) ?>
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
						<a href="<?= base_url('/umkms'); ?>" class="btn-href">Lihat Selengkapnya</a>
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
								<div class="d-flex align-items-center justify-content-center">
									<img
										src="https://randomuser.me/api/portraits/<?= rand(0, 1) ? 'men' : 'women' ?>/<?= rand(10, 70) ?>.jpg"
										alt="User"
										class="rounded-circle me-3"
										width="40"
										height="40" />
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
          Website ini menghadirkan berbagai produk unggulan dari pelaku UMKM lokal. 
          Pembelian dapat dilakukan dengan mudah melalui WhatsApp, memberikan kenyamanan 
          dalam bertransaksi secara langsung dengan penjual.
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
