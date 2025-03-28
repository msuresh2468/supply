<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4>Details of Equipment Under Warranty</h4>
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
                        <?php if (count($warranty) > 0) { ?>
                            <?php $this->load->view('portal/layout/filter-search'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>PO Year</th>
                                        <th>PO Number</th>
                                        <th>PO Date</th>
                                        <th>File Number</th>
                                        <th>Item Name</th>
                                        <th>Hospital Name</th>
                                        <th>Warranty Date</th>
                                    </tr>
                                </thead>
                                <tbody id="filter_search">
                                    <?php foreach ($warranty as $row) : ?>
                                        <tr>
                                        <?php if ($row->Warranty_Date != '') { ?>
                                            <td>
                                                <?php echo $row->PO_Year; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('portal/view-po-items/' . $row->id); ?>"> <?php echo $row->PO_Number; ?></a>
                                            </td>
                                            <td>
                                                <?php echo date('d-m-Y', strtotime($row->PO_Date)); ?>
                                            </td>
                                            <td>
                                                <?php echo $row->File_Number; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Item_Name; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->po_hospital_name ?>
                                            </td>
                                            <td>                                                
                                                <?php if($row->Warranty_Date != ' '){
                                                    echo date('d-m-Y', strtotime($row->Warranty_Date));
                                                } ?>
                                            </td>
                                            <?php } ?>
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