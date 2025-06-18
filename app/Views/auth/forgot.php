<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('p') ?>

<!-- Bootstrap Icons (opsional jika pakai icon) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
	body {
		background: linear-gradient(135deg, #f8d7da, #f0f9ff);
	}

	.card {
		background: rgba(255, 255, 255, 0.9);
		backdrop-filter: blur(6px);
		border-radius: 1rem;
		box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
	}

	.card-header-title {
		font-weight: 600;
		font-size: 1.5rem;
		color: #333;
	}

	label {
		font-weight: 500;
	}
</style>

<div class="container py-5 min-vh-100">
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-6 col-md-9">
			<div class="card shadow border-0 my-5">
				<div class="card-body p-4">
					<div class="text-center mb-4">
						<h2 class="card-header-title mb-2">Lupa Kata Sandi</h2>
						<p class="text-muted small">Masukkan email yang terdaftar. Kami akan mengirimkan instruksi untuk mengatur ulang kata sandi Anda.</p>
					</div>

					<?= view('Myth\Auth\Views\_message_block') ?>

					<form action="<?= url_to('forgot') ?>" method="post">
						<?= csrf_field() ?>

						<div class="mb-3">
							<label for="email">Email Terdaftar</label>
							<input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="contoh@email.com">
							<div class="invalid-feedback">
								<?= session('errors.email') ?>
							</div>
							<small class="text-muted">*Gunakan email yang Anda gunakan saat mendaftar</small>
						</div>

						<div class="d-flex justify-content-end mt-4">
							<button type="submit" class="btn btn-danger fw-semibold px-4">
								Kirim 
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
