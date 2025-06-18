<?= $this->extend('beranda/template/index'); ?>

<?= $this->section('page-Content'); ?>

<style>
	.product-card {
		transition: transform 0.2s, box-shadow 0.2s;
		cursor: pointer;
		border-radius: 10px;
		overflow: hidden;
		height: 300px; /* Fixed height for all cards */
	}

	.product-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
	}

	.product-image-container {
		height: 200px; /* Fixed height for all image containers */
		position: relative;
		overflow: hidden;
	}

	.product-card .card-img-top {
		width: 100%;
		height: 100%;
		object-fit: cover; /* This ensures the image covers the area without distortion */
	}

	.card-body {
		height: 100px; /* Fixed height for all card bodies */
		padding: 1rem;
	}

	.badge {
		font-size: 0.7rem;
		padding: 0.35em 0.65em;
		border-radius: 6px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		z-index: 1;
	}

	.card-title {
		font-size: 1rem;
		line-height: 1.3;
		margin-bottom: 0;
		height: 2.6rem; /* Fixed height for product names */
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
	}

	.price {
		font-size: 1.1rem;
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




	@media (max-width: 991.98px) {
		.sticky-sidebar {
			position: static !important; /* non-sticky untuk layar kecil */
		}
	}

	@media (min-width: 992px) {
		.sticky-sidebar {
			position: sticky;
			top: 160px;
			z-index: 1000;
			height: fit-content;
		}
	}

	/* Responsive adjustments */
	@media (max-width: 767px) {
		.product-card {
			height: 280px;
		}

		.product-image-container {
			height: 180px;
		}
	}
</style>

<!-- Produk Dan Jasa-->
<div class="container-fluid fruite py-5 my-2" style="background-color:  #f8f9fa">
	<div class="container py-5 my-4 " >
		<div class="text-center mb-5">
		<h2 class="fw-bold" style="color: #425D68; font-size: 2.5rem;">Daftar Produk & Jasa</h2>

		<p class="text-muted" style="font-size: 1rem;">
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

						<div class="col-12">
							<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
								<?php foreach ($tab1 as $pr) : ?>
								<div class="col">
									<div
										class="card h-100 border-0 shadow-sm product-card hover-shadow transition"
										role="button"
										data-bs-toggle="modal"
										data-bs-target="#detailProdukModal<?= $pr['id_produk'] ?>">
										<!-- Image -->
										<div
											class="ratio ratio-4x3 product-image-container rounded-top overflow-hidden">
											<img
												src="<?= $pr['img_produk'] ? $pr['img_produk'] : base_url('img/produk/default.jpg') ?>"
												class="img-fluid object-fit-cover w-100 h-100"
												alt="<?= esc($pr['nama_produk']) ?>" />
										</div>

										<!-- Content -->
										<div
											class="card-body text-center d-flex flex-column justify-content-between p-3">
											<!-- Nama Produk -->
											<h6
												class="fw-semibold text-dark mb-1 text-truncate"
												title="<?= $pr['nama_produk'] ?>">
												<?= ucwords($pr['nama_produk']) ?>
											</h6>

											<!-- UMKM -->
											<small
												class="text-muted d-block text-truncate"
												title="<?= $pr['nama_umkm'] ?>">
												<?= $pr['nama_umkm'] ?? 'Nama UMKM' ?>
											</small>

											<!-- Harga -->
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
        <div class="row mt-5">
            <div class="col-12">
                <div class="pagination d-flex justify-content-center ">
                                <?= $pager->links() ?>
                </div>
            </div>
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
													<a href="<?= base_url('umkm/') . $product['username'] ?>"
														><?= $product['nama_umkm']?></a
													>
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
