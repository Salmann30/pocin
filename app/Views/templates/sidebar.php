
    <style>
/* Default: Mobile - column layout (logo besar) */
.logo-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 0.5rem;
}

/* Normal desktop sidebar (non-toggled): horizontal layout */
@media (min-width: 576px) {
  .sidebar:not(.toggled) .logo-container {
    flex-direction: row;
  }
}

/* Optional: atur ukuran logo */
.logo-img {
  width: 100px;
  height: auto;
}

/* Di desktop, kecilkan ukuran logonya */
@media (min-width: 576px) {
  .logo-img {
    width: 80px;
  }
}

    </style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex justify-content-center align-items-center bg-orange py-4 px-3 mb-4 mt-3" href="#">
  <div class="logo-container bg-white rounded p-3">
    <img 
      src="<?= base_url('img/KatalogLogo.png') ?>" 
      alt="Logo 1" 
      class="img-fluid logo-img"
    >
    <img 
      src="<?= base_url('img/logotc_color.png') ?>" 
      alt="Logo 2" 
      class="img-fluid logo-img"
    >
  </div>
</a>



    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            UMKM Management
        </div>

        <!-- Nav Item - Dasbor -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dasbor</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/pencatatan') ?>">
                <i class="fas fa-fw fa-pen"></i>
                <span>Catat Penjualan</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Katalog Management
        </div>

        <!-- Nav Item - Dasbor -->
        <!-- Nav Item - UMKM LIST -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/manage') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>UMKM List</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/katalog/index') ?>">
                <i class="fas fa-luggage-cart"></i>
                <span>Kategori List</span></a>
        </li>

        <!-- Nav Item - UMKM LIST -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/katalog/sub') ?>">
                <i class="fas fa-fw fa-suitcase"></i>
                <span>Sub Kategori List</span></a>
        </li>
        <!-- Nav Item - UMKM LIST -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/katalog/produk') ?>">
                <i class="fas fa-box"></i>
                <span>Produk List</span></a>
        </li>
        <!-- Nav Item - Banners LIST    -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/admin/banner') ?>">
            <i class="fas fa-image"></i>
            <span>Banner List</span></a>
        </li>

    <?php endif; ?>
    <?php if (in_groups('umkm')) : ?>
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Dasbor
        </div>

        <!-- Nav Item - Profile Saya -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/umkm/beranda') ?>">
            <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/umkm/produk/index') ?>">
                <i class="fas fa-fw fa-box"></i>
                <span>Produk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/umkm/catpen') ?>">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
                <span>Catatan Penjualan</span></a>
        </li>


    <?php endif; ?>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Profile
    </div>

    <!-- Nav Item - Profile Saya -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile Saya</span></a>
    </li>

    <!-- Nav Item - Profile Edit -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/profile/edit') ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>