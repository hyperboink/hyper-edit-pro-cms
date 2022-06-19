<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Site</div>

                <a class="nav-link" href="<?=base_url()?>admin/dashboard">
                    <div class="sb-nav-link-icon"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="<?=base_url()?>settings/general">
                    <div class="sb-nav-link-icon"><i class="fa fa-cog"></i></div>
                    Settings
                </a>

                <div class="sb-sidenav-menu-heading">Main</div>

                <a href="<?=base_url()?>template/list" class="nav-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-file-o" aria-hidden="true"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-grip-lines-vertical"></i></div>
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-th-large" aria-hidden="true"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </a>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?=base_url()?>template/header"><i class="fa fa-window-minimize" aria-hidden="true"></i> Header</a>
                        <a class="nav-link" href="<?=base_url()?>template/footer"><i class="fa fa-window-minimize" aria-hidden="true"></i> Footer</a>
                    </nav>
                </div>

                <a href="<?=base_url()?>menu/settings" class="nav-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-th-list" aria-hidden="true"></i></div>
                    Menus
                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> -->
                </a>

                <a href="<?=base_url()?>social/settings" class="nav-link social-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></div>
                    Socials
                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> -->
                </a>

                <a href="<?=base_url()?>form/list" class="nav-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-columns" aria-hidden="true"></i></div>
                    Forms
                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> -->
                </a>

                <a href="<?=base_url()?>contact/settings" class="nav-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-address-book-o" aria-hidden="true"></i></div>
                    Contact Info
                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div> -->
                </a>

               

                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div> -->

                <!-- <div class="sb-sidenav-menu-heading">Others</div>

                <a href="<?=base_url()?>" class="nav-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>
                    View Site
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                </a> -->

                <!-- <a href="<?=base_url()?>" class="nav-link" aria-expanded="false">
                    <div class="sb-nav-link-icon"><i class="fa fa-eye"></i></div>
                    Clear Cache
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                </a> -->



                <!-- <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>

                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> -->

            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span><?=$user?></span>
        </div>

    </nav>
</div>