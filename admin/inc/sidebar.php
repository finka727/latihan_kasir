<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Manage Cashier</div> -->
                            <div class="sb-sidenav-menu-heading">Manage Cashier</div>
                            <a class="nav-link collapsed" href="#" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapseAdmin" 
                                aria-expanded="false" aria-controls="collapseAdmin">

                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Cashier
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="cashier.php">cashier</a>
                                    <a class="nav-link" href="tambah-transaksi.php">tambah-transaksi</a>
                                    <a class="nav-link" href="print.php">print</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Manage User</div>
                            <a class="nav-link collapsed" href="#" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapseAdmin" 
                                aria-expanded="false" aria-controls="collapseAdmin">

                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Admin/Staff
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tambah-admin.php">Add Admin</a>
                                    <a class="nav-link" href="admin.php">View Admin</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>