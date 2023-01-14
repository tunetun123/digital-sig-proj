<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEURL; ?>/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-wrench"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DigSig</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Kunci
    </div>

    <!-- Nav Item - Buat Kunci -->
    <li class="nav-item <?php if ($data['page'] == BASEURL . '/admin') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= BASEURL; ?>/admin">
            <i class="fas fa-key"></i>
            <span>Buat Kunci</span></a>
    </li>

    <!-- Nav Item - List Kunci -->
    <li class="nav-item <?php if ($data['page'] == BASEURL . '/admin/listkunci') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= BASEURL; ?>/admin/listkunci">
            <i class="fas fa-list"></i>
            <span>List Kunci</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Akun
    </div>

    <!-- Nav Item - Buat Akun -->
    <li class="nav-item <?php if ($data['page'] == BASEURL . '/admin/akuncreate') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= BASEURL; ?>/admin/akuncreate">
            <i class="fas fa-user-plus"></i>
            <span>Buat Akun</span></a>
    </li>

    <!-- Nav Item - List Akun -->
    <li class="nav-item <?php if ($data['page'] == BASEURL . '/admin/listakun') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?= BASEURL; ?>/admin/listakun">
            <i class="fas fa-list"></i>
            <span>List Akun</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/">
            <i class="fas fa-home"></i>
            <span>Back Home</span></a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/auth/logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->