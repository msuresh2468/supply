<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>Dashboard</h3>
                </div>
                <div class="p-3 mb-5 bg-white">
                    <div class="">
                        <div class="row mb-5 text-center">
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-primary">
                                    <i class="bi bi-currency-rupee h2"></i>
                                    <h6 class="my-0">Total Amount</h6>
                                    <p class="h2"><?php foreach ($total as $row) : ?>
                                            <?php echo $row->Gross_Amount; ?>
                                        <?php endforeach; ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-success">
                                    <i class="bi bi-currency-rupee h2"></i>
                                    <h6 class="my-0">Received Amount</h6>
                                    <p class="h2"><?php foreach ($total as $row) : ?>
                                        <?php echo $row->Pay_60_Amt + $row->Pay_30_Amt + $row->Pay_10_Amt + $row->Pay_90_Amt; ?>
                                        <?php endforeach; ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-danger">
                                    <i class="bi bi-currency-rupee h2"></i>
                                    <h6 class="my-0">Total Outstanding</h6>
                                    <p class="h2">
                                        <?php foreach ($total as $row) : ?>
                                            <?php $pay = $row->Pay_60_Amt + $row->Pay_30_Amt + $row->Pay_10_Amt + $row->Pay_90_Amt;
                                        $deductions = $row->LDC_Amount1 + $row->LDC_Amount2 + $row->LDC_Amount3 + $row->Deductions_1 + $row->Deductions_2 + $row->Deductions_3; ?>
                                        <?php echo $row->Gross_Amount - ($pay + $deductions); ?>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-black">
                                    <i class="bi bi-currency-rupee h2"></i>
                                    <h6 class="my-0">Total Deductions</h6>
                                    <p class="h2">
                                        <?php foreach ($total as $row) : ?>
                                            <?php echo $row->LDC_Amount1 + $row->LDC_Amount2 + $row->LDC_Amount3 + $row->Deductions_1 + $row->Deductions_2 + $row->Deductions_3; ?>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countPO); ?></p>
                                    <h6 class="my-0">Purchase Orders</h6>                                    
                                    <a href="<?php echo base_url() ?>portal/purchase-orders" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-warning bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countSupplied); ?></p>
                                    <h6 class="my-0">Supplied Items</h6>
                                    <a href="<?php echo base_url() ?>portal/supplied-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-primary bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countNotSupplied); ?></p>
                                    <h6 class="my-0">Not Supplied Items</h6>
                                    <a href="<?php echo base_url() ?>portal/not-supplied-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-secondary bg-gradient">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countInstalled); ?></p>
                                    <h6 class="my-0">Installed Items</h6>
                                    <a href="<?php echo base_url() ?>portal/installed-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-danger bg-secondary">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countNotInstalled); ?></p>
                                    <h6 class="my-0">Not Installed Items</h6>
                                    <a href="<?php echo base_url() ?>portal/not-installed-items" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-warning bg-info">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countNotInstalled); ?></p>
                                    <h6 class="my-0">Installed Items <br>After Cutoff Date</h6>
                                    <a href="<?php echo base_url() ?>portal/installed-items-after-cutoff-date" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-3">
                                <div class="card py-5 counter border-0 shadow rounded text-bg-primary bg-dark">
                                    <i class="bi bi-shop h2"></i>
                                    <p class="h2"><?php echo count($countNotInstalled); ?></p>
                                    <h6 class="my-0">Installed Items <br>Before Cutoff Date</h6>
                                    <a href="<?php echo base_url() ?>portal/installed-items-before-cutoff-date" class="stretched-link"></a>
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