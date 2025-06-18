<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('p'); ?>
<!-- Bootstrap Icons (jika ingin tambah icon nanti) -->
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

	.card-header {
		font-size: 1.5rem;
		font-weight: 600;
		color: #333;
		background: none;
		border: none;
	}
</style>

<div class="container py-5 min-vh-100">
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-6 col-md-9">
			<div class="card o-hidden border-0 shadow my-4">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center">
									<h2 class="card-header">Daftar Akun UMKM</h2>
									<p class="text-muted small mt-1">Silakan isi data berikut untuk mendaftar.</p>
								</div>

								<?= view('Myth\Auth\Views\_message_block') ?>

								<form action="<?= url_to('register') ?>" method="post" class="user">
									<?= csrf_field() ?>

									<div class="form-group mb-3">
										<input type="text"
											class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
											name="username" placeholder="Username" value="<?= old('username') ?>">
										<div class="invalid-feedback">
											<?= session('errors.username') ?>
										</div>
									</div>

									<div class="form-group mb-3">
										<input type="email"
											class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
											name="email" placeholder="Email aktif" value="<?= old('email') ?>">
										<div class="invalid-feedback">
											<?= session('errors.email') ?>
										</div>
									</div>

									<div class="form-group row mb-3">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password"
												class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
												name="password" placeholder="Kata Sandi" autocomplete="off">
											<div class="invalid-feedback">
												<?= session('errors.password') ?>
											</div>
										</div>
										<div class="col-sm-6">
											<input type="password"
												class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
												name="pass_confirm" placeholder="Ulangi Sandi" autocomplete="off">
											<div class="invalid-feedback">
												<?= session('errors.pass_confirm') ?>
											</div>
										</div>
									</div>

									<button type="submit" class="btn btn-danger btn-user btn-block">
										Daftar Sekarang
									</button>
								</form>

								<hr>

								<div class="text-center">
									<a class="small" href="<?= route_to('login'); ?>">
										Sudah punya akun? Masuk di sini
									</a>
								</div>
							</div>
						</div>
					</div> <!-- end row -->
				</div> <!-- end card-body -->
			</div> <!-- end card -->
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
