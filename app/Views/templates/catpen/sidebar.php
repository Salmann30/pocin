<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo text-center">
    <a href="<?= base_url()?>" class="app-brand-link">
        <img src="<?= base_url('/catpen/img/Logos.png') ?>" alt="logo" class="app-brand-logo demo">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>


  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase"><span class="text-white menu-header-text">Pengguna</span></li>
    <!-- Dashboards -->
    <?php if (in_groups('umkm')) : ?>
      <li class="menu-item">
        <a href="<?= base_url('catpen/user/dasbor'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Basic">Dasbor</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="<?= base_url('catpen/user/produk'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Data Produk</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="<?= base_url('user/penjualan'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-calculator"></i>
          <div data-i18n="Basic">Transaksi Penjualan</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="<?= base_url('user/rekapBulanan'); ?>" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Basic">Laporan Penjualan</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="<?= base_url('user/rekapBulanan'); ?>" class="menu-link">
              <div data-i18n="Basic">Bulanan</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="<?= base_url('user/rekapHarian'); ?>" class="menu-link">
              <div data-i18n="Basic">Harian</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="<?= base_url('user/rekapProduk'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
          <div data-i18n="Basic">Laporan Produk </div>
        </a>
      </li>
      



      <!-- Components -->
      <!-- Cards -->
      

      <li class="menu-item">
        <a href="<?= base_url('user/pengeluaran'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-store"></i>
          <div data-i18n="Basic">Pengeluaran</div>
        </a>
      </li>
    <?php endif; ?>

    <?php if (in_groups('admin')) : ?>

      <li class="menu-item">
        <a href="<?= base_url('admin'); ?>" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-circle"></i>
          <div data-i18n="Basic">Managemen Pengguna</div>
        </a>
      </li>

    <?php endif; ?>

    <!-- Forms & Tables -->

    <!-- Forms -->

    <!-- Form Validation -->

    <li class=""></li>
    <li class="menu-item">
      <a href="<?= base_url('user'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user "></i>
        <div data-i18n="Basic">Profile Saya</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="<?= base_url('umkm/produk/index'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="Basic">Menu Katalog</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="#" class="menu-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="menu-icon tf-icons bx bx-log-out-circle me-1"></i>
        <div data-i18n="Basic">Logout</div>
      </a>
    </li>
    <!-- Tables -->

    <!-- Data Tables -->

    <!-- Misc -->

  </ul>
</aside>