<header class="navbar navbar-dark bg_nav_bar flex-md-nowrap p-0 shadow d-print-none">
    <!-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> Welcome <?php echo $this->session->auth_user['username'] ?></a> -->
    <div class="text-end">
        <img src="<?php echo base_url() ?>public/assets/images/sr-pic.jpg" alt="" class="god_pic">
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div><h2 class="text-white text-uppercase">Equipment Tracking Details</h2></div>
    <!-- <form action="<?php echo base_url(); ?>search" method="post" class="w-100 d-flex p-2">
        <input type="text" name="keyword" class="form-control form-control-dark" />
        <input type="submit" value="Search" />
    </form> -->
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
    <div class="text-end">
        <img src="<?php echo base_url() ?>public/assets/images/god-pic.jpg" alt="" class="god_pic">
    </div>
    <!-- <ul class="navbar-nav bg px-3 d-lg-block d-none">

        <li class="nav-item text-nowrap">
            <a class="nav-link text-warning fw-bold" href="<?php echo base_url() ?>logout">Logout <i class="fa fa-sign-out"></i></a>
        </li>
    </ul> -->
</header>