<style>
    .form-control{
        width:16rem;
    }
/* Force override dropdown background */
.custom-dropdown .dropdown-menu {
	background-color: #f8f9fa !important;
	border: 1px solid #dee2e6 !important;
	border-radius: 0.5rem !important;
	box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
	padding: 0.5rem 0 !important;
	overflow: hidden;
	min-width: 220px !important;
	animation: fadeInDown 0.2s ease-in-out;
}

/* Clean and force item style */
.custom-dropdown .dropdown-menu .dropdown-item {
	padding: 0.75rem 1.25rem !important;
	font-weight: 500 !important;
	color: #212529 !important;
	background-color: transparent !important;
	transition: all 0.2s ease !important;
}

/* Hover effect */
.custom-dropdown .dropdown-menu .dropdown-item:hover {
	background-color: #ff6868 !important;
	color: #fff !important;
}

/* Optional animation */
@keyframes fadeInDown {
	from {
		opacity: 0;
		transform: translateY(-8px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}


    @media (max-width: 768px) {
    .d-flex {
        flex-direction: column;
        gap: 1rem;
    }
    .mb-3 {
        margin-bottom: 1rem;
    }
    .mt-3 {
        margin-top: 1rem;
    }

    
}
</style>
<div class="container-fluid fixed-top ">
    <div class="container ">
        
    
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            
                <img src="<?= base_url('img/KatalogLogo.png') ?>" alt="" class="img-fluid img-logo p-2"></h1>
            
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white rounded fw-bold" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="<?= base_url('/'); ?>" class="nav-item nav-link">Beranda</a>
                    <a href="<?= base_url('produk'); ?>" class="nav-item nav-link">Produk &amp; Jasa</a>
                    <a href="<?= base_url('umkms'); ?>" class="nav-item nav-link">UMKM</a>
                    <!-- <a href="<?= base_url('tentang'); ?>" class="nav-item nav-link">Tentang UMKM</a>
                    <a href="<?= base_url('kontak'); ?>" class="nav-item nav-link">Kontak UMKM</a> -->
                    <div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang</a>
	<div
		class="dropdown-menu"
		style="background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 0.5rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08); padding: 0.5rem 0; min-width: 220px;">
		
		<a
			href="<?= base_url('tentang'); ?>"
			class="dropdown-item"
			style="padding: 0.75rem 1.25rem; font-weight: 500; color: #212529; background-color: transparent; transition: all 0.2s ease;"
            onmouseover="this.style.backgroundColor='#ff6868'; this.style.color='#fff';"
	onmouseout="this.style.backgroundColor='transparent'; this.style.color='#212529';">
			Tentang UMKM
		</a>

		<a
			href="<?= base_url('kontak'); ?>"
			class="dropdown-item"
			style="padding: 0.75rem 1.25rem; font-weight: 500; color: #212529; background-color: transparent; transition: all 0.2s ease;"
            onmouseover="this.style.backgroundColor='#ff6868'; this.style.color='#fff';"
	onmouseout="this.style.backgroundColor='transparent'; this.style.color='#212529';">
			Kontak UMKM
		</a>

		<a
			href="<?= base_url('galeri'); ?>"
			class="dropdown-item"
			style="padding: 0.75rem 1.25rem; font-weight: 500; color: #212529; background-color: transparent; transition: all 0.2s ease;"
            onmouseover="this.style.backgroundColor='#ff6868'; this.style.color='#fff';"
	onmouseout="this.style.backgroundColor='transparent'; this.style.color='#212529';">
			Galeri UMKM
		</a>
	</div>
</div>

                </div>
                <div class="d-flex m-3 justify-content-between rounded">
                    <div class="position-relative me-1">
                        <form action="<?= base_url('produk') ?>" method="GET">
                            <input type="search" name="keyword" class="form-control border-2 border-secondary rounded-pill" placeholder="Cari Produk & UMKM" aria-describedby="search-icon-1">
                            <button type="submit" class="btn btn-primary border border-secondary py-3 px-4 position-absolute rounded-pill text-white d-flex align-items-center justify-content-start" style="bottom: 0; right: 0; height: 100%;"><i class="fa fa-search" type="submit"></i></button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center gap-2">
  <a href="<?= base_url('/login') ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
    Login
  </a>
</div>

                </div>
            </div>
        </nav>
        </div>
</div>
<script>
    // Ambil URL saat ini
    var currentUrl = window.location.href;

    // Loop melalui setiap item navigasi
    var navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(function(item) {
        // Ambil URL dari item navigasi
        var itemUrl = item.getAttribute('href');

        // Jika URL saat ini adalah sama dengan URL item navigasi atau URL item navigasi adalah sub-path yang tepat
        if (currentUrl === itemUrl || currentUrl.startsWith(itemUrl + "/")) {
            // Tambahkan kelas 'active' jika terdapat kemiripan
            item.classList.add('active');
        }
    });
</script>