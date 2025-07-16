<?= $this->extend('beranda/template/index'); ?>
<?= $this->section('page-Content'); ?>

<style>
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
									<div
										class="rounded-circle overflow-hidden mx-auto mb-3"
										style="width: 150px; height: 150px">
										<img
											src="<?= base_url('') . $pr['user_img'] ?>"
											class="img-fluid"
											alt="<?= $pr['nama_umkm'] ?>"
											onerror="this.src='<?= base_url('assets/img/default-profile.jpg') ?>'" />
									</div>
									<h4 class="fw-bold text-primary mb-1"><?= $pr['nama_umkm'] ?></h4>
									<p class="text-muted">
										<i class="fas fa-user me-2"></i
										><?= ucwords($pr['fullname']) ?>
									</p>
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
											<span class="fw-medium"
												><?= !empty($pr['notlp']) ? $pr['notlp'] : 'Belum tersedia' ?></span
											>
										</div>
									</div>

									<div class="d-flex align-items-center mb-3">
										<div class="bg-light rounded-circle p-2 me-3">
											<i class="fab fa-instagram text-primary"></i>
										</div>
										<div>
											<small class="text-muted d-block">Instagram</small>
											<?php if (!empty($pr['ig_user'])) : ?>
											<a
												href="https://instagram.com/<?= $pr['ig_user'] ?>"
												target="_blank"
												class="text-decoration-none">
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
											<span class="fw-medium"
												><?= !empty($pr['alamat']) ? $pr['alamat'] : 'Belum tersedia' ?></span
											>
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
									<a
										href="https://wa.me/<?= $ntlp ?>"
										target="_blank"
										class="btn btn-success d-flex align-items-center justify-content-center gap-2 px-4 py-2">
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
					<h2 class="fw-bold position-relative d-inline-block">Daftar Produk</h2>
					<p class="text-muted mt-3">
						Produk unggulan dari
						<?= $pr['nama_umkm'] ?>
					</p>
				</div>
				<?php endforeach; ?>

				<div class="row g-4">
					<?php foreach ($produk as $pr) : ?>
					<div class="col-6 col-md-4 col-lg-3">
						<div
							class="card h-100 border-0 shadow-sm product-card"
							role="button"
							data-bs-toggle="modal"
							data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
							<div class="ratio ratio-1x1 product-image-container rounded-top overflow-hidden">
								<img
								src="<?= base_url() . $pr['img_produk'] ?>"
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
									<?= $pr['nama_umkm'] ?? 'Nama UMKM' ?>
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

				<?php if (empty($produk)) : ?>
				<div class="text-center py-5">
					<div class="mb-4">
						<i class="fas fa-box-open text-muted" style="font-size: 4rem"></i>
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
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
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

	<?php foreach ($produk as $product) : ?>
	<div
		class="modal fade"
		id="detailProdukModal<?= $product['id_produk'] ?>"
		tabindex="-1"
		aria-labelledby="editProdukModalLabel<?= $product['id_produk'] ?>"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProdukModalLabel<?= $product['id_produk'] ?>">
						Detail Produk
					</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<!-- Tab Navigasi -->
					<ul class="nav nav-tabs" id="produkTab<?= $product['id_produk'] ?>" role="tablist">
						<li class="nav-item" role="presentation">
							<button
								class="nav-link active"
								id="detail-tab-<?= $product['id_produk'] ?>"
								data-bs-toggle="tab"
								data-bs-target="#detail-<?= $product['id_produk'] ?>"
								type="button"
								role="tab"
								aria-controls="detail-<?= $product['id_produk'] ?>"
								aria-selected="true">
								Detail
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button
								class="nav-link"
								id="testimoni-tab-<?= $product['id_produk'] ?>"
								data-bs-toggle="tab"
								data-bs-target="#testimoni-<?= $product['id_produk'] ?>"
								type="button"
								role="tab"
								aria-controls="testimoni-<?= $product['id_produk'] ?>"
								aria-selected="false">
								Komentar
							</button>
						</li>
					</ul>

					<div class="tab-content pt-3">
						<!-- Tab Detail Produk -->
						<div
							class="tab-pane fade show active"
							id="detail-<?= $product['id_produk'] ?>"
							role="tabpanel"
							aria-labelledby="detail-tab-<?= $product['id_produk'] ?>">
							<div class="row">
								<!-- Carousel Image -->
								<div class="col-md-5 text-center">
									<div
										id="carouselExample<?= $product['id_produk'] ?>"
										class="carousel slide"
										data-bs-ride="carousel">
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img
													src="<?= base_url() . $product['img_produk'] ?>"
													class="d-block w-100"
													alt="Produk" />
											</div>
											<?php if ($product['img_produk2']): ?>
											<div class="carousel-item">
												<img
													src="<?= base_url() . $product['img_produk2'] ?>"
													class="d-block w-100"
													alt="Produk 2" />
											</div>
											<?php endif; ?>
											<?php if ($product['img_produk3']): ?>
											<div class="carousel-item">
												<img
													src="<?= base_url() . $product['img_produk3'] ?>"
													class="d-block w-100"
													alt="Produk 3" />
											</div>
											<?php endif; ?>
										</div>
										<button
											class="carousel-control-prev"
											type="button"
											data-bs-target="#carouselExample<?= $product['id_produk'] ?>"
											data-bs-slide="prev">
											<span class="carousel-control-prev-icon"></span>
										</button>
										<button
											class="carousel-control-next"
											type="button"
											data-bs-target="#carouselExample<?= $product['id_produk'] ?>"
											data-bs-slide="next">
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
											<td>
												<?= $product['subkat'] ?>
												(<?= $product['kategori'] ?>)
											</td>
										</tr>
										<tr>
											<td>Harga</td>
											<td>:</td>
											<td>
												<strong
													>Rp<?= number_format($product['harga_produk'], 0, ',', '.') ?></strong
												>
											</td>
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

						<!-- Tab Testimoni -->
						<div class="tab-pane fade" id="testimoni-<?= $product['id_produk'] ?>" role="tabpanel" aria-labelledby="testimoni-tab-<?= $product['id_produk'] ?>">
  <div class="row">
    <div class="col-12">
      <h4 class="mb-3">Testimoni Pelanggan</h4>
      <ul class="list-group">
        <?php if (!empty($product['testimoni'])): ?>
          <?php foreach ($product['testimoni'] as $testi): ?>
            <li class="list-group-item">
              <!-- Rating -->
              <div class="rating mb-1 text-warning">
                <?php
                  $bintang = floatval($testi['bintang']);
                  $penuh = floor($bintang);
                  $setengah = ($bintang - $penuh) >= 0.5 ? 1 : 0;
                  $kosong = 5 - ($penuh + $setengah);

                  echo str_repeat('<i class="fas fa-star"></i>', $penuh);
                  if ($setengah) echo '<i class="fas fa-star-half-alt"></i>';
                  echo str_repeat('<i class="far fa-star"></i>', $kosong);
                ?>
              </div>
              <!-- Nama dan Komentar -->
              <strong><?= esc($testi['nama_cus']) ?></strong>
              <p class="mb-0"><?= esc($testi['ket_testi']) ?></p>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li class="list-group-item">Belum ada testimoni untuk produk ini.</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>

					</div>
				</div>

				<div class="modal-footer justify-content-end">
					<?php
        if (!empty($product['notlp'])) {
          $notlp = $product['notlp'];
          if (substr($notlp, 0, 1) === '0') {
            $notlp = '62' . substr($notlp, 1);
          }
        ?>
					<a
						href="https://api.whatsapp.com/send/?phone=<?= $notlp ?>&text=Halo,%20saya%20tertarik%20dengan%20produk%20<?= urlencode($product['nama_produk']) ?>.%20Apakah%20masih%20tersedia?"
						target="_blank"
						class="btn btn-whatsapp">
						<i class="fab fa-whatsapp me-2"></i> Beli via WhatsApp
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		var fullscreenModal = document.getElementById("fullscreenModal");
		var fullscreenImage = document.getElementById("fullscreenImage");

		document
			.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#fullscreenModal"]')
			.forEach(function (element) {
				element.addEventListener("click", function () {
					fullscreenImage.src = this.getAttribute("data-src");
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
		color: #ffd700;
		font-size: 1rem;
	}

	.rating i {
		margin-right: 2px;
	}
</style>
<?= $this->endSection(); ?>
