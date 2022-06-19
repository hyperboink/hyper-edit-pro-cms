<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark p-0">
    <a class="navbar-brand font-weight-bold text-info" href="<?=base_url()?>admin/dashboard"><img src="<?=base_url('assets/admin/images/logo-icon-blue.png')?>" width="30" height="30"> HyperEdit<span class="text-white">Pro</span></a>
 
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars" aria-hidden="true"></i></button>

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url()?>settings/general">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=base_url()?>admin/dashboard/logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>
