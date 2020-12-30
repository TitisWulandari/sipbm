<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"> -->
    <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
    <!-- <i class="fas fa-home"></i> -->
    <!-- </div> -->
    <!-- <div class="sidebar-brand-text mx-3">Museum</div> -->
    <!-- </a> -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading tess">
        DATA MASTER
    </div>

    <!-- Nav Item - admin area Tables -->
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('users/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span>
        </a>
    </li>

    <li class="nav-item admin">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Koleksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('koleksi/koleksi') ?>">Data Koleksi</a>
                <a class="collapse-item jenis_koleksi" href="<?= base_url('koleksi/jenis_koleksi') ?>">Jenis Koleksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('observasi/observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Observasi</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('petugas/petugas') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Petugas</span>
        </a>
    </li>
    <!-- Nav Item - end admin area Tables -->

    <!-- Nav Item -  pihak pusat area Tables -->
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/koleksi') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Koleksi</span>
        </a>
    </li>
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Observasi</span>
        </a>
    </li>
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/petugas') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Petugas</span>
        </a>
    </li>
    <!-- Nav Item -  end pihak pusat area Tables -->

    <!-- Nav Item -  pihak pengelola Tables -->
    <li class="nav-item pengelola">
        <a class="nav-link pb-0" href="<?= base_url('pengelola/koleksi') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Koleksi</span>
        </a>
    </li>
    <li class="nav-item pengelola">
        <a class="nav-link pb-0" href="<?= base_url('pengelola/observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Observasi</span>
        </a>
    </li>
    <li class="nav-item pengelola">
        <a class="nav-link pb-0" href="<?= base_url('pengelola/petugas') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Petugas</span>
        </a>
    </li>
    <!-- Nav Item -  end pengelola area Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3 tess">

    <!-- Heading -->
    <div class="sidebar-heading">
        KEGIATAN
    </div>
    <!-- start area admin -->
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>
    <!-- end area admin -->

    <!-- area petugas perawatan -->
    <li class="nav-item petugas">
        <a class="nav-link pb-0" href="<?= base_url('petugas/petugas_perawatan/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>
    <li class="nav-item petugas">
        <a class="nav-link pb-0" href="<?= base_url('petugas/pemeriksaan/pemeriksaan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Pemeriksaan</span>
        </a>
    </li>
    <!-- end petugas perawatan -->

    <!-- start area pihak pusat -->
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>
    <!-- end area pihak pusat -->

    <!-- start area pengelola -->
    <li class="nav-item pengelola">
        <a class="nav-link pb-0" href="<?= base_url('pengelola/perawatan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Perawatan</span>
        </a>
    </li>
    <!-- end area pengelola -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3 tess">

    <!-- Heading -->
    <div class="sidebar-heading tess">
        LAPORAN
    </div>
    <!-- start area admin -->
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/history') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Histori Perawatan</span>
        </a>
    </li>
    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_observasi') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Observasi</span>
        </a>
    </li>

    <li class="nav-item admin">
        <a class="nav-link pb-0" href="<?= base_url('admin/laporan_perawatan') ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Perawatan</span>
        </a>
    </li>

    <!-- end area admin -->

    <!-- start area pihak pusat -->
    <li class="nav-item pusat">
        <a class="nav-link pb-0" href="<?= base_url('pusat/history') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Histori Perawatan</span>
        </a>
    </li>
    <!-- end area pihak pusat -->
    <!-- start area pengelola -->
    <li class="nav-item pengelola">
        <a class="nav-link pb-0" href="<?= base_url('pengelola/history') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Histori Perawatan</span>
        </a>
    </li>
    <!-- end area pengelola -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->