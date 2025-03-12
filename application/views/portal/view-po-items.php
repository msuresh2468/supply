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
                    <h4 class="my-0">PO Items List</h4>
                    <a href="<?php echo base_url() ?>portal/purchase-orders" class="text-decoration-none bg-primary text-white px-3 py-1">Back</a>
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


                        <?php if (count($view_po_items) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>PO Number</th>
                                        <th>Item Name</th>
                                        <th>Item Model</th>
                                        <th>Hospital Name</th>
                                        <th>District</th>
                                        <th>Supply Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hospital_names as $row2) : ?>
                                        <?php echo $row2->po_hospital_name; ?>
                                        <?php echo $row2->id; ?>
                                   
                                    <?php foreach ($view_po_items as $row) : ?>

                                        <?php $string = $row->Hospital_Name;
                                        $str_arr = explode("_", $string);
                                        //print_r($str_arr);
                                        foreach ($str_arr as $row1) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->po_id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->Item_Name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->Item_Model; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row2->po_hospital_name; ?>
                                                    <?php
                                                    $row1 = str_replace(' ', '-', $row1);
                                                    $row1 = preg_replace('/[^A-Za-z0-9\-]/', '', $row1); ?>
                                                </td>

                                                <td>
                                                    <?php echo $row->District; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->Supply_Status; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('portal/edit-po-items/' . $row2->id); ?>" class="btn btn-warning">Edit</a>
                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    endforeach; ?>
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