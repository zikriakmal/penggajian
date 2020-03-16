<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Penggajian</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 mt-3 col-0  bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?= ($head == "karyawan" ? 'active' : '' )?>" href="<?= base_url()?>karyawan">
                            <i class="fa fa-users"></i>
                            Karyawan <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?= ($head == "jabatan" ? 'active' : '' )?>" href="<?= base_url()?>jabatan">
                            <i class="fas fa-user"></i>
                            Jabatan
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?= ($head == "AturanGaji" ? 'active' : '' )?>" href="<?= base_url()?>aturangaji">
                    <i class="fa fa-clipboard"></i>
                            Aturan Gaji
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?= ($head == "gaji" ? 'active' : '' )?>" href="<?= base_url()?>gaji">
                    <i class="fa fa-money"></i>
                            Gaji
                        </a>
                    </li>
<!-- 
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6> -->
            </div>
        </nav>
        <div class="col-md-10 col-12  mt-2 ">
            <div class="card">
              <h5 class="card-header">
              <?= (isset($back) ? $back : '' )   ?>
              <?= $menu ?></h5>
                <div class="card-body">