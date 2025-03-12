<?php
$this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow d-print-none">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> Welcome <?php echo $this->session->auth_user['username'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav bg px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link text-warning fw-bold" href="<?php echo base_url() ?>logout">Logout <i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>Dashboard</h3>
                    <!-- <div class="col-md-3 text-end">
                        <?php echo $calendar; ?>
                    </div> -->
                </div>
                <div class="p-3 mb-5 bg-white">
                    <div class="">
                        <div class="row mb-5 text-center">
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-primary">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Total Amount</h6>
                                    <p class="h2"><?php foreach ($total as $row) : ?>
                                            <?php echo $row->Gross_Amount; ?>
                                        <?php endforeach; ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-success">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Received Amount</h6>
                                    <p class="h2"><?php foreach ($total as $row) : ?>
                                            <?php echo $row->Payment_Received; ?>
                                        <?php endforeach; ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-warning">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Total Outstanding</h6>
                                    <p class="h2"><?php foreach ($total as $row) : ?>
                                            <?php if($row->Gross_Amount - $row->Payment_Received == 0){echo '';}else{ echo $row->Item_Amount - $row->Payment_Received;}  ?>
                                        <?php endforeach; ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Purchase Orders</h6>
                                    <a href="<?php echo base_url() ?>portal/purchase-orders" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-warning bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Supplied Items</h6>
                                    <a href="<?php echo base_url() ?>portal/supplied-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-primary bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Not Supplied Items</h6>
                                    <a href="<?php echo base_url() ?>portal/not-supplied-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-secondary bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Installed Items</h6>
                                    <a href="<?php echo base_url() ?>portal/installed-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-secondary">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Not Installed Items</h6>
                                    <a href="<?php echo base_url() ?>portal/not-installed-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-warning bg-info">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Installed Items <br>After Cutoff Date</h6>
                                    <a href="<?php echo base_url() ?>portal/installed-items-after-cutoff-date" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-primary bg-dark">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Installed Items <br>Before Cutoff Date</h6>
                                    <a href="<?php echo base_url() ?>portal/installed-items-before-cutoff-date" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-secondary bg-success">
                                    <i class="bi bi-shop h2"></i>
                                    <h6 class="my-0">Supply Status</h6>
                                    <a href="<?php echo base_url() ?>portal/supply-status" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>



<?php $this->load->view('portal/layout/footer'); ?>