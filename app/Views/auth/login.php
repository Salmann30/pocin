<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('p'); ?>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
	body {
		background: linear-gradient(135deg, #f8d7da, #f0f9ff);
	}

	.login-card {
		background: rgba(255, 255, 255, 0.85);
		backdrop-filter: blur(6px);
		border-radius: 1rem;
		box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
	}

	.login-title {
		font-weight: 600;
		color: #333;
	}

	.login-subtext {
		color: #6c757d;
		font-size: 0.9rem;
		cursor: default;
	}
</style>

<div class="container py-5 min-vh-100 d-flex align-items-center justify-content-center">
	<div class="col-md-6 col-lg-5">
		<div class="login-card p-4 p-md-5">

			<div class="text-center mb-4">
				<h2 class="login-title mb-2">Login</h2>
				<p class="login-subtext">Login ini hanya untuk <span class="fw-semibold text-danger">pelaku UMKM</span></p>
			</div>

			<?= view('Myth\Auth\Views\_message_block') ?>

			<form action="<?= url_to('login') ?>" method="post">
				<?= csrf_field() ?>

				<div class="mb-3">
					<label class="form-label">Email atau Username</label>
					<input type="text" name="login"
						class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
						placeholder="Masukkan email atau username">
					<div class="invalid-feedback">
						<?= session('errors.login') ?>
					</div>
				</div>

				<div class="mb-3">
					<label class="form-label">Kata Sandi</label>
					<div class="input-group">
						<input type="password" name="password" id="password"
							class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
							placeholder="Masukkan kata sandi">
						<button type="button" class="btn btn-outline-secondary" onclick="togglePassword()" tabindex="-1">
							<i id="togglePasswordIcon" class="bi bi-eye"></i>
						</button>
					</div>
					<div class="invalid-feedback">
						<?= session('errors.password') ?>
					</div>
				</div>

				<?php if ($config->allowRemembering) : ?>
					<div class="form-check mb-3">
						<input class="form-check-input" type="checkbox" id="remember-me" name="rememberings"
							<?php if (old('remember')) : ?> checked <?php endif ?>>
						<label class="form-check-label" for="remember-me">Ingat saya</label>
					</div>
				<?php endif; ?>

				<div class="d-flex justify-content-end mt-4">
					<button type="submit" class="btn btn-danger fw-semibold px-4">
						Masuk
					</button>
				</div>
			</form>

			<?php if ($config->allowRegistration || $config->activeResetter): ?>
				<hr class="my-4">
				<?php if ($config->allowRegistration) : ?>
					<div class="text-center">
						<a class="small text-decoration-none" href="<?= url_to('register') ?>">
							Belum punya akun? Daftar di sini
						</a>
					</div>
				<?php endif; ?>
				<?php if ($config->activeResetter) : ?>
					<div class="text-center mt-2">
						<a class="small text-decoration-none" href="<?= url_to('forgot') ?>">
							Lupa kata sandi?
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	function togglePassword() {
		const input = document.getElementById('password');
		const icon = document.getElementById('togglePasswordIcon');
		const isHidden = input.type === 'password';
		input.type = isHidden ? 'text' : 'password';
		icon.classList.toggle('bi-eye', !isHidden);
		icon.classList.toggle('bi-eye-slash', isHidden);
	}
</script>
<?= $this->endSection(); ?>
