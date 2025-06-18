<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('p') ?>

<!-- Bootstrap Icons (jika butuh ikon nantinya) -->
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
		<div class="col-xl-6 col-lg-7 col-md-10">
			<div class="card shadow border-0 my-5">
				<div class="card-body p-4">
					<div class="text-center mb-4">
						<h2 class="card-header-title mb-2">Reset Kata Sandi</h2>
						<p class="text-muted small">Masukkan token dan email Anda, lalu atur ulang kata sandi baru.</p>
					</div>

					<?= view('Myth\Auth\Views\_message_block') ?>

					<form action="<?= url_to('reset-password') ?>" method="post">
						<?= csrf_field() ?>

						<div class="mb-3">
							<label for="token">Token Verifikasi</label>
							<input type="text" name="token" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" placeholder="Token dari email" value="<?= old('token', $token ?? '') ?>">
							<small class="text-muted">*Token dikirim ke email Anda</small>
							<div class="invalid-feedback"><?= session('errors.token') ?></div>
						</div>

						<div class="mb-3">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Alamat email Anda" value="<?= old('email') ?>">
							<div class="invalid-feedback"><?= session('errors.email') ?></div>
						</div>

						<div class="row g-3">
							<div class="col-md-6">
								<label for="password">Kata Sandi Baru</label>
								<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Min. 6 karakter">
								<div class="invalid-feedback"><?= session('errors.password') ?></div>
							</div>

							<div class="col-md-6">
								<label for="pass_confirm">Ulangi Kata Sandi</label>
								<input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Ulangi sandi">
								<div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>
							</div>
						</div>

						<div class="d-flex justify-content-end mt-4">
							<button type="submit" class="btn btn-danger fw-semibold px-4">
								Atur Ulang Sandi
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
