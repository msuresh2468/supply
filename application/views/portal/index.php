<?php
$this->load->view('portal/layout/header');
if ($this->session->flashdata('status')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('status'); ?>
    </div>
<?php endif; ?>
test
<div class="portal_section">
    <!-- <div class="row mx-0">
        <div class="col-lg-2 bg-dark text-light vh-100 py-5">
            Welcome <?php echo $this->session->auth_user['username'] ?>
            <a class="nav-link" href="<?php echo base_url() ?>logout">Logout</a>
        </div>
        <div class="col-lg-10">

        </div>
    </div> -->
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow d-print-none">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> Welcome <?php echo $this->session->auth_user['username'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav bg px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link text-warning fw-bold" href="">Logout <i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse d-print-none shadow-lg">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking">
                                New Booking
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="new_inspection">
                                Inspection Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="vehicle">
                                Post Vehicle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users">
                                New Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>Dashboard</h3>
                </div>
                <div class="p-3 mb-5 bg-white">
                    <div class="container">
                        <div class="row mb-5 text-center">
                            <div class="col-6 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-4 counter border-0 shadow rounded text-bg-danger bg-gradient">
                                    <!-- <div class="display-between align-items-center px-3 small">
                                        <span><i class='bx bxs-hourglass bx-sm'></i></span>
                                        <span class="small">Todays</span>
                                    </div> -->
                                    <span class="counter-value h3 mb-3">100</span>
                                    <h6 class="mb-3">Pending Inspection</h6>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-4 counter border-0 shadow rounded text-bg-warning bg-gradient">
                                    <span class="counter-value h4 mb-3">500</span>
                                    <h6 class="mb-3">New Inspection</h6>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-4 counter border-0 shadow rounded text-bg-primary bg-gradient">
                                    <span class="counter-value h4 mb-3">600</span>
                                    <h6 class="mb-3">Total Clients</h6>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-4 counter border-0 shadow rounded text-bg-secondary bg-gradient">
                                    <span class="counter-value h4 mb-3">1500</span>
                                    <h6 class="mb-3">Total Vendors</h6>
                                    <a href="#" class="stretched-link"></a>
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