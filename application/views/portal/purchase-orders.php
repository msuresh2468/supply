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
                    <h4 class="my-0">All Purchase Orders</h4>
                    <a href="<?php echo base_url() ?>portal/add-purchase-order" class="text-decoration-none bg-primary text-white px-3 py-1">Add New PO</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if ($this->session->flashdata('status')) : ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('status'); ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        echo $this->input->get('msg');
                        ?>
                        <?php if (count($purchase_orders) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>PO Year</th>
                                        <th>PO Number</th>
                                        <th>PO Date</th>
                                        <th>File Number</th>
                                        <th>Gross Amount</th>
                                        <th>Supply Due Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($purchase_orders as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->PO_Year; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->PO_Number; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d-m-Y',strtotime($row->PO_Date)); ?>
                                            </td>
                                            <td>
                                                <?php echo $row->File_Number; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Gross_Amount; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Supply_DueDate; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('portal/view-po/' . $row->PO_Number); ?>" class="btn btn-info">PO Details</a>
                                                <a href="<?php echo base_url('portal/view-po-items/' . $row->PO_Number); ?>" class="btn btn-info">Item Details</a>
                                                <!-- <a href="<?php echo base_url('portal/edit-purchase-order/' . $row->id); ?>" class="btn btn-warning">Edit</a> -->
                                                <!-- <button type="submit" id="<?php echo $row->id ?>" class="btn btn-danger remove-po"> Delete</button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "<h4 class='text-center text-danger'>Currently No POs Found</h4>";
                        } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>



<?php $this->load->view('portal/layout/footer'); ?>