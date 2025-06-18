<?= $this->extend('templates/index'); ?>

<?= $this->section('pc'); ?>
<!-- Begin Page Content -->
<style>
    @media(max-width:430px){
        .custom-hp {
            height:100px!important;
            width:100%;
        }
    }
</style>
<div class="container-fluid">


    <div class="row">

        <?php foreach ($users as $user) : ?>
            <div class="col-lg-8">
                <!-- Page Heading -->
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
                <form action="<?= base_url('/edit') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="card mb-4 shadow">
                        <div class="card-header">
                            Edit Profile
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?= base_url($user['user_img']) ?>" class="card-img-top " alt="user-avatar" class="d-block rounded" height="auto" width="100">
                                </div>
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>Nama Pemilik</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-dark" name="fullname" value="<?= $user['fullname'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>Nama Toko</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-dark" name="umkm" value="<?= $user['nama_umkm'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>Username</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control text-dark" name="username" value="<?= $user['username'] ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>Email</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-dark" name="email" value="<?= $user['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>IG</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-dark" name="ig" value="<?= $user['ig_user'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>No Telepon</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-dark" name="notlp" value="<?= $user['notlp'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label"><strong>Alamat</strong></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control custom-hp text-dark" name="alamat" id="alamat" minlength="50" maxlength="75" required><?= $user['alamat'] ?></textarea>
                                            <small id="alamatCount" class="form-text text-muted">0/75 characters</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 form-label"><strong>Foto</strong></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" name="user_img" value="<?= $user['user_img'] ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>



</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alamatInput = document.getElementById('alamat');
        const alamatCount = document.getElementById('alamatCount');

        alamatInput.addEventListener('input', function() {
            const currentLength = alamatInput.value.length;
            alamatCount.textContent = currentLength + '/75 characters';
        });
    });
</script>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>