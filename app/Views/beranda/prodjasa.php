<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<style>
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

	/* Pagination Styles - Fixed for Mobile */
	.pagination {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 2rem;
		flex-wrap: nowrap;
		overflow-x: auto;
		padding: 0.5rem 2rem;
		flex-direction: row !important;
	}

	.pagination .page-item {
		margin: 0 0.1rem;
		flex-shrink: 0;
	}

	.pagination .page-item .page-link {
		background-color: #ffffff;
		color: var(--bs-primary);
		border: 1px solid #dee2e6;
		transition: all 0.2s ease-in-out;
		padding: 0.5rem 0.875rem;
		font-size: 0.9rem;
		border-radius: 0.375rem;
		white-space: nowrap;
		min-width: 45px;
		text-align: center;
		display: inline-flex;
		align-items: center;
		justify-content: center;
	}

	/* Override Bootstrap pagination defaults */
	.pagination .page-item {
		display: inline-block;
		margin: 0 0.15rem;
		flex-shrink: 0;
	}

	.pagination .page-item .page-link:hover {
		background-color: var(--bs-primary);
		color: #ffffff;
		border-color: var(--bs-primary);
	}

	.pagination .page-item.active .page-link {
		background-color: var(--bs-primary);
		color: #ffffff;
		border-color: var(--bs-primary);
	}

	/* Special styling for Last pagination button */

	.pagination li a[aria-label="First"] {
		border-color: #dc3545 !important;
		color: var(--bs-primary);
		border-width: 2px;
		border-radius: 0.375rem;
	}

	.pagination li a[aria-label="First"]:hover {
		background-color: var(--bs-primary);
		color: #ffffff;
		border-color: var(--bs-primary);
	}

	.pagination li a[aria-label="Last"] {
		border-color: #dc3545 !important;
		color: var(--bs-primary);
		border-width: 2px;
		border-radius: 0.375rem;
	}

	.pagination li a[aria-label="Last"]:hover {
		background-color: var(--bs-primary);
		color: #ffffff;
		border-color: var(--bs-primary);
	}

	/* Pagination Container */
	.pagination-container {
		position: relative;
	}

	.pagination-container::before,
	.pagination-container::after {
		content: "";
		position: absolute;
		top: 0;
		bottom: 0;
		width: 20px;
		pointer-events: none;
		z-index: 1;
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

	/* Carousel Controls */
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

	/* Mobile Responsive Styles */
	@media (max-width: 767px) {
		.product-image-container {
			height: 180px;
		}

		.product-card .text-muted {
			font-size: 1rem;
			font-weight: 500;
		}

		/* Mobile Pagination Styles */
		.pagination {
			margin-top: 1.5rem;
			padding: 0.5rem 1rem;
			justify-content: flex-start;
			-webkit-overflow-scrolling: touch;
			flex-direction: row !important;
			flex-wrap: nowrap !important;
		}

		.pagination .page-item {
			margin: 0 0.05rem;
		}

		.pagination .page-item .page-link {
			padding: 0.375rem 0.65rem;
			font-size: 0.85rem;
			min-width: 40px;
			height: 40px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		/* Pagination scroll indicators */
		.pagination-container::before {
			left: 0;
			background: linear-gradient(to right, rgba(248, 249, 250, 1), rgba(248, 249, 250, 0));
		}

		.pagination-container::after {
			right: 0;
			background: linear-gradient(to left, rgba(248, 249, 250, 1), rgba(248, 249, 250, 0));
		}
	}

	/* Extra small screens */
	@media (max-width: 575px) {
		.pagination {
			flex-direction: row !important;
			flex-wrap: nowrap !important;
		}

		.pagination .page-item .page-link {
			padding: 0.3rem 0.5rem;
			font-size: 0.8rem;
			min-width: 35px;
			height: 35px;
		}
	}
</style>

<!-- Produk Dan Jasa-->
<div class="container-fluid fruite py-5 my-2" style="background-color: #f8f9fa">
	<div class="container py-5 my-4">
		<div class="text-center mb-5">
			<h2 class="fw-bold" style="color: #425d68; font-size: 2.5rem">Daftar Produk & Jasa</h2>

			<p class="text-muted" style="font-size: 1rem">
				Temukan berbagai produk dan jasa berkualitas yang tersedia disini
			</p>
		</div>

		<div class="row g-4">
			<!-- Sidebar Kategori Sticky -->
			<div class="col-lg-2 sticky-sidebar">
				<div style="margin-bottom: 1.5rem">
					<h4 style="font-weight: 600; margin-bottom: 1rem">Kategori</h4>
					<ul style="list-style: none; padding-left: 0; margin: 0">
						<?php foreach ($kategori as $kat) : ?>
						<li style="margin-bottom: 1rem; border-bottom: 1px solid #ddd; padding-bottom: 0.75rem">
							<div style="display: flex; justify-content: space-between; align-items: center">
								<a
									href="<?= base_url('produk?kategori=' . $kat['kategori']) ?>"
									style="text-decoration: none; color: #212529; font-weight: 600"
									onmouseover="this.style.color='#0d6efd';"
									onmouseout="this.style.color='#212529';">
									<?= $kat['kategori'] ?>
								</a>
								<button
									class="btn btn-sm"
									type="button"
									data-bs-toggle="collapse"
									data-bs-target="#collapse<?= $kat['id_kat'] ?>"
									aria-expanded="false"
									aria-controls="collapse<?= $kat['id_kat'] ?>"
									style="background: none; border: none">
									<i class="bi bi-chevron-down"></i>
								</button>
							</div>
							<div class="collapse" id="collapse<?= $kat['id_kat'] ?>" style="margin-top: 0.5rem">
								<ul style="list-style: none; padding-left: 1rem; margin: 0">
									<?php foreach ($subkul as $sub) : ?>
									<?php if ($sub['id_kat'] === $kat['id_kat']) : ?>
									<li style="margin-bottom: 0.25rem">
										<a
											href="<?= base_url('produk?subkategori=' . $sub['subkat']) ?>"
											style="text-decoration: none; color: #6c757d; font-size: 0.875rem"
											onmouseover="this.style.color='#0d6efd';"
											onmouseout="this.style.color='#6c757d';">
											<?= $sub['subkat'] ?>
										</a>
									</li>
									<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<!-- Konten Produk -->
			<div class="col-lg-10">
				<div class="container py-5">
					<div class="row">
						<?php if (!empty($pesan)) : ?>
						<div class="alert alert-warning col-md-8 mx-auto mb-4" role="alert">
							<?= $pesan ?>
						</div>
						<?php endif; ?>

						<?php if (empty($tab1)) : ?>
						<div class="alert alert-danger text-center">Tidak ada produk ditemukan.</div>
						<?php endif; ?>

						<div class="col-12">
							<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
								<?php foreach ($tab1 as $pr): ?>
								<div class="col">
									<div
										class="card h-100 border-0 shadow-sm product-card"
										role="button"
										data-bs-toggle="modal"
										data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
										<div
											class="ratio ratio-1x1 product-image-container rounded-top overflow-hidden">
											<img
												src="<?= $pr['img_produk'] ?: base_url('img/produk/default.jpg') ?>"
												class="img-fluid object-fit-cover w-100 h-100"
												alt="<?= esc($pr['nama_produk']) ?>"
												loading="lazy" />
										</div>
										<div
											class="card-body text-center d-flex flex-column justify-content-between p-3">
											<h6
												class="fw-semibold text-dark mb-1 text-truncate"
												title="<?= $pr['nama_produk'] ?>">
												<?= ucwords($pr['nama_produk']) ?>
											</h6>
											<small
												class="text-muted text-truncate"
												title="<?= $pr['nama_umkm'] ?? 'Nama UMKM' ?>">
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

							<!-- Pagination -->
							<div class="pagination-container mt-0">
								<div class="pagination d-flex justify-content-center"><?= $pager->links() ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Fruits Shop End-->

<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<?php foreach ($tab1 as $product) : ?>
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
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
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
										<?= $product['nama_umkm'] ?>
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
									<strong>Rp<?= number_format($product['harga_produk'], 0, ',', '.') ?></strong>
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

			<div class="modal-footer justify-content-end">
				<!-- Tombol WhatsApp -->
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

<!-- Modal Fullscreen Gambar -->
<div
	class="modal fade"
	id="fullscreenModal"
	tabindex="-1"
	aria-labelledby="fullscreenModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-fullscreen">
		<div class="modal-content">
			<div class="modal-body d-flex align-items-center">
				<div class="input-group w-75 mx-auto d-flex">
					<div class="fruite-img">
						<img id="fullscreenImage" src="" class="img-fluid w-100 rounded" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
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
