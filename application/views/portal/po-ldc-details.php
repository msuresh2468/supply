<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4>Detals of Late Delivery Charges</h4>
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
                        <?php if (count($payment_details) > 0) { ?>
                            <?php $this->load->view('portal/layout/filter-search'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>PO <br> Year</th>
                                        <th>PO <br> No</th>
                                        <th>PO <br> Date</th>
                                        <th>File <br> Number</th>
                                        <th>Gross <br> Amount</th>
                                        <th>Submitted <br> Amt</th>
                                        <th>Received <br> Amount</th>
                                        <th>LD <br> Charges</th>
                                    </tr>
                                </thead>
                                <tbody id="filter_search">
                                    <?php foreach ($payment_details as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->PO_Year; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('portal/view-po/' . $row->id); ?>"> <?php echo $row->PO_Number; ?></a>
                                            </td>
                                            <td>
                                                <?php echo date('d-m-Y', strtotime($row->PO_Date)); ?>
                                            </td>
                                            <td>
                                                <?php echo $row->File_Number; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Gross_Amount; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->Bills_60_Amount == '') {
                                                    $bill1 = '0';
                                                } else {
                                                    $bill1 = $row->Bills_60_Amount;
                                                }
                                                if ($row->Bills_30_Amount == '') {
                                                    $bill2 = '0';
                                                } else {
                                                    $bill2 = $row->Bills_30_Amount;
                                                }
                                                if ($row->Bills_90_Amount == '') {
                                                    $bill3 = '0';
                                                } else {
                                                    $bill3 = $row->Bills_90_Amount;
                                                }
                                                if ($row->Bills_10_Amount == '') {
                                                    $bill4 = '0';
                                                } else {
                                                    $bill4 = $row->Bills_10_Amount;
                                                }
                                                echo $bill1 + $bill2 + $bill3 + $bill4
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($row->Pay_60_Amt == '') {
                                                    $pay1 = '0';
                                                } else {
                                                    $pay1 = $row->Pay_60_Amt;
                                                }
                                                if ($row->Pay_30_Amt == '') {
                                                    $pay2 = '0';
                                                } else {
                                                    $pay2 = $row->Pay_30_Amt;
                                                }
                                                if ($row->Pay_90_Amt == '') {
                                                    $pay3 = '0';
                                                } else {
                                                    $pay3 = $row->Pay_90_Amt;
                                                }
                                                if ($row->Pay_10_Amt == '') {
                                                    $pay4 = '0';
                                                } else {
                                                    $pay4 = $row->Pay_10_Amt;
                                                }
                                                echo $pay1 + $pay2 + $pay3 + $pay4
                                                ?>
                                            </td>
                                            <td class="bg-danger text-white text-center">
                                                <?php
                                                if ($row->LDC_Amount1 == '') {
                                                    $lcd1 = '0';
                                                } else {
                                                    $lcd1 = $row->LDC_Amount1;
                                                }
                                                if ($row->LDC_Amount2 == '') {
                                                    $lcd2 = '0';
                                                } else {
                                                    $lcd2 = $row->LDC_Amount2;
                                                }
                                                if ($row->LDC_Amount3 == '') {
                                                    $lcd3 = '0';
                                                } else {
                                                    $lcd3 = $row->LDC_Amount3;
                                                }
                                                $pay =  $lcd1 + $lcd2 + $lcd3;
                                                ?>
                                                <?php echo $pay ?>
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