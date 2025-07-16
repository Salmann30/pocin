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
		box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
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
		width: 100%;
		aspect-ratio: 1 / 1;
		overflow: hidden;
		position: relative;
	}

	.card-img-wrapper img {
		width: 100%;
		height: 100%;
		object-fit: contain;
		display: block;
		transition: transform 0.3s ease;
	}

	.card-footer .d-grid .btn:hover {
		color: #fff;
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
		background: rgba(0, 0, 0, 0.2);
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
		align-items: center;
		font-size: 0.9rem;
		color: #666;
	}

	.info-item-link {
		text-decoration: none;
		color: inherit;
		display: block; /* agar klik bisa menyeluruh */
	}

	.info-item i {
		width: 20px;
		margin-right: 10px;
		font-size: 0.85rem;
		margin-top: 3px;
	}

	.info-item-link:hover .info-item {
		background-color: #f0f0f0;
		color: var(--bs-primary);
	}

	.info-item-link:hover .info-item i {
		color: var(--bs-primary);
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

	/* Pagination Styles - Fixed for Mobile */
	.pagination {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 1rem;
		flex-wrap: nowrap;
		overflow-x: auto;
		padding: 0.5rem 0;
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
	/* Set default look of page links */
	.page-item .page-link {
		background-color: #ffffff;
		color: var(--bs-primary);
		border: 1px solid #dee2e6;
		transition: all 0.2s ease-in-out;
	}

	/* Hover effect on individual page links */
	.page-item .page-link:hover {
		background-color: var(--bs-primary);
		color: #ffffff;
		border-color: var(--bs-primary);
	}

	/* Active page styling */
	.page-item.active .page-link {
		background-color: var(--bs-primary);
		color: #ffffff;
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
	.form-control,
	.form-select {
		padding: 0.6rem 1rem;
		border: 1px solid #e0e0e0;
	}

	.form-control:focus,
	.form-select:focus {
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

<!-- UMKMs-->
<section class="umkm-listing-section py-5 mt-5">
	<div class="container pt-5">
		<!-- Header with subtle decoration -->
		<div class="row mb-5">
			<div class="col-lg-8 mx-auto text-center">
				<h2 class="display-5 fw-bold mb-4">Daftar UMKM</h2>
				<p class="lead text-muted">
					Temukan berbagai UMKM potensial yang tergabung dalam komunitas kami
				</p>
			</div>
		</div>

		<!-- Flash Messages -->
		<?php if (session()->getFlashdata('error')): ?>
		<div class="row mb-4">
			<div class="col-lg-6 mx-auto">
				<div
					class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm"
					role="alert">
					<i class="fas fa-exclamation-circle me-2"></i>
					<?= session()->getFlashdata('error'); ?>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="alert"
						aria-label="Close"></button>
				</div>
			</div>
		</div>
		<?php elseif(!empty($pesan)) :?>
		<div class="row mb-4">
			<div class="col-lg-6 mx-auto">
				<div
					class="alert alert-warning alert-dismissible fade show rounded-4 shadow-sm"
					role="alert">
					<i class="fas fa-exclamation-triangle me-2"></i>
					<?= $pesan ?>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="alert"
						aria-label="Close"></button>
				</div>
			</div>
		</div>
		<?php endif ; ?>

		<!-- UMKM Cards Grid -->
		<div class="row g-4">
			<?php foreach ($users as $user) : ?>
			<div class="col-md-6 col-lg-4 col-xl-3">
				<div class="card umkm-card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
					<a href="<?= base_url('umkm/') . $user['username'] ?>">
						<div class="card-img-wrapper">
							<img
								src="<?= base_url('') . $user['user_img'] ?>"
								class="card-img-top"
								alt="<?= htmlspecialchars($user['nama_umkm'] ?: 'UMKM Image') ?>" />
						</div>
					</a>

					<div class="card-body p-4">
						<h5 class="card-title fw-bold mb-3">
							<?= ucwords($user['nama_umkm'] ?: 'INI NAMA UMKM'); ?>
						</h5>

						<div class="umkm-info">
							<a href="<?= base_url('umkm/') . $user['username'] ?>" class="info-item-link">
								<div class="info-item">
									<i class="fas fa-user text-primary"></i>
									<span><?= htmlspecialchars($user['fullname']); ?></span>
								</div>
							</a>

							<?php if (!empty($user['ig_user'])) : ?>
							<a
								href="https://instagram.com/<?= $user['ig_user'] ?>"
								class="info-item-link"
								target="_blank">
								<div class="info-item text-primary">
									<i class="fab fa-instagram text-primary"></i>
									<span
										>@<?= substr($user['ig_user'], 0, 15) . (strlen($user['ig_user']) >
										15 ? '..' : '') ?></span
									>
								</div>
							</a>
							<?php else : ?>
							<div class="info-item">
								<i class="fab fa-instagram text-primary"></i>
								<span>Belum tersedia</span>
							</div>
							<?php endif; ?>

							<div class="info-item">
								<i class="fas fa-map-marker-alt text-primary"></i>
								<span class="text-truncate">
									<?= (strlen($user['alamat']) >
									40) ? substr($user['alamat'], 0, 40) . '...' : $user['alamat']; ?>
								</span>
							</div>
						</div>
					</div>
					<div class="card-footer border-0 bg-white p-4">
						<div class="d-grid">
							<a
								href="<?= base_url('umkm/') . $user['username'] ?>"
								class="btn btn-outline-primary rounded-pill">
								Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<!-- Pagination -->
		<!-- Pagination -->
		<div class="pagination-container mt-0">
			<div class="pagination d-flex justify-content-center"><?= $pager->links() ?></div>
		</div>
	</div>
</section>

<?= $this->endSection(); ?>
