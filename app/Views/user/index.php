<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <?php if (session()->has('alert')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session('alert') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <?php foreach ($users as $user) : ?>
            <div class="col-lg-8">
                <div class="card mb-4 shadow">
                    <div class="card-header">
                        <?php if (in_groups('umkm')) : ?>
                        Detail UMKM
                        <?php else: ?>
                        Detail Profile
                        <?php endif;?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?= base_url($user['user_img']) ?>" class="card-img-top " alt="user-avatar" class="d-block rounded" height="auto" width="100">

                            </div>
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>Nama Pemilik</strong> </label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark" value=" : <?= $user['fullname'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>Nama Toko</strong> </label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark" value=" : <?= $user['nama_umkm'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>Username</strong> </label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark" value=" : <?= $user['username'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>Email</strong> </label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark" value=" : <?= $user['email'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>IG</strong> </label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark" value=" : <?php 
                                        if (empty($user['ig_user'])) {
                                            echo "belum tersedia";
                                        } else {
                                            echo $user['ig_user'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>No Telepon</strong> </label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext text-dark" value=" : <?= $user['notlp'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label"><strong>Alamat</strong> </label>
                                    <div class="col-sm-8">
                                        <textarea readonly class="form-control-plaintext text-dark" rows="3"><?= $user['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>