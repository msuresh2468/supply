<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <!-- <h4>Payment Details</h4> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="bg-primary p-2 text-white">
                                    Total Number of POs : <span class="float-end h5"><?php echo count($countPO); ?></span>
                                </p>
                                <p class="bg-warning p-2">
                                    Total Gross Amount:
                                    <span class="float-end h5"><?php foreach ($total as $row) : ?>
                                        <?php echo $row->Gross_Amount; ?>
                                    <?php endforeach; ?>
                                    </span>
                                </p>
                                <p class="bg-black p-2 text-white">
                                    Total Bills Submitted Amount:
                                    <span class="float-end h5"><?php foreach ($total as $row) : ?>
                                        <?php echo $row->Bills_60_Amount + $row->Bills_30_Amount + $row->Bills_90_Amount + $row->Bills_10_Amount; ?>
                                    <?php endforeach; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="bg-success p-2 text-white">
                                    Total Received Amount:
                                    <span class="float-end h5"> <?php foreach ($total as $row) : ?>
                                        <?php echo $row->Pay_60_Amt + $row->Pay_30_Amt + $row->Pay_10_Amt + $row->Pay_90_Amt; ?>
                                    <?php endforeach; ?>
                                    </span>
                                </p>
                                <p class="bg-secondary p-2 text-white">
                                    Total LDC Charges and Deductions:
                                    <span class="float-end h5"><?php foreach ($total as $row) : ?>
                                        <?php echo $row->LDC_Amount1 + $row->LDC_Amount2 + $row->LDC_Amount3 + $row->Deductions_1 + $row->Deductions_2 + $row->Deductions_3; ?>
                                    <?php endforeach; ?>
                                    </span>
                                </p>
                                <p class="bg-danger p-2 text-white">
                                    Total Pending Amount:
                                    <span class="float-end h5"><?php foreach ($total as $row) : ?>
                                        <?php $pay = $row->Pay_60_Amt + $row->Pay_30_Amt + $row->Pay_10_Amt + $row->Pay_90_Amt;
                                        $deductions = $row->LDC_Amount1 + $row->LDC_Amount2 + $row->LDC_Amount3 + $row->Deductions_1 + $row->Deductions_2 + $row->Deductions_3; ?>
                                        <?php echo $row->Gross_Amount - ($pay + $deductions); ?>
                                    <?php endforeach; ?>
                                    </span>
                                </p>
                            </div>
                        </div>
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
                                        <th>Bills <br> In(%)</th>
                                        <th>Submitted <br> Amt</th>
                                        <th>Received <br> Amount</th>
                                        <th>Received <br> Date</th>
                                        <th>Due <br> Amount</th>
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
                                                <?php echo $row->Bills_Percentage; ?>
                                                <table class="table table-bordered">
                                                    <?php if ($row->Bills_Percentage_60 != 'No' && $row->Bills_Percentage_60 == '60') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_Percentage_60; ?>%</td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Bills_Percentage_30 != 'No' && $row->Bills_Percentage_30 == '30') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_Percentage_30; ?>%</td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Bills_Percentage_90 != 'No' && $row->Bills_Percentage_90 == '90') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_Percentage_90; ?>%</td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Bills_Percentage_10 != 'No' && $row->Bills_Percentage_10 == '10') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_Percentage_10; ?>%</td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="table table-bordered">
                                                    <?php if ($row->Bills_60_Amount != '') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_60_Amount; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Bills_30_Amount != '') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_30_Amount; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Bills_90_Amount != '') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_90_Amount; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Bills_10_Amount != '') { ?>
                                                        <tr>
                                                            <td><?php echo $row->Bills_10_Amount; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </td>

                                            <td>
                                                <table class="table table-bordered">
                                                    <?php if ($row->Pay_60_Amt != '') { ?>
                                                        <tr>
                                                            <td id="pay_60"><?php echo $row->Pay_60_Amt; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Pay_30_Amt != '') { ?>
                                                        <tr>
                                                            <td id="pay_30"><?php echo $row->Pay_30_Amt; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Pay_90_Amt != '') { ?>
                                                        <tr>
                                                            <td id="pay_90"><?php echo $row->Pay_90_Amt; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Pay_10_Amt != '') { ?>
                                                        <tr>
                                                            <td id="pay_10"><?php echo $row->Pay_10_Amt; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="table table-bordered">
                                                    <?php if ($row->Pay_60_Date != '') { ?>
                                                        <tr>
                                                            <td><?php echo date('d-m-Y', strtotime($row->Pay_60_Date)); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Pay_30_Date != '') { ?>
                                                        <tr>
                                                            <td><?php echo date('d-m-Y', strtotime($row->Pay_30_Date)); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Pay_90_Date != '') { ?>
                                                        <tr>
                                                            <td><?php date('d-m-Y', strtotime($row->Pay_90_Date)); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row->Pay_10_Date != '') { ?>
                                                        <tr>
                                                            <td><?php echo date('d-m-Y', strtotime($row->Pay_10_Date)); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </td>
                                            <td class="bg-danger text-white text-center">
                                                <?php if ($row->Pay_90_Amt == '') {
                                                    if ($row->Pay_60_Amt == '') {
                                                        $pay_60 = '0';
                                                    } else {
                                                        $pay_60 = $row->Pay_60_Amt + $row->Deductions_1 + $row->LDC_Amount1;
                                                    }
                                                    if ($row->Pay_30_Amt == '') {
                                                        $pay_30 = '0';
                                                    } else {
                                                        $pay_30 = $row->Pay_30_Amt + $row->Deductions_2 + $row->LDC_Amount2;
                                                    }
                                                    if ($row->Pay_10_Amt == '') {
                                                        $pay_10 = '0';
                                                    } else {
                                                        $pay_10 = $row->Pay_10_Amt;
                                                    }
                                                    $pay =  $pay_60 + $pay_30 + $pay_10;
                                                } ?>
                                                <?php if ($row->Pay_90_Amt != '') {
                                                    if ($row->Pay_90_Amt == '') {
                                                        $pay_90 = '0';
                                                    } else {
                                                        $pay_90 = $row->Pay_90_Amt + $row->Deductions_3 + $row->LDC_Amount3;
                                                    }
                                                    if ($row->Pay_10_Amt == '') {
                                                        $pay_10 = '0';
                                                    } else {
                                                        $pay_10 = $row->Pay_10_Amt;
                                                    }
                                                    $pay = $pay_90 + $pay_10;
                                                } ?>

                                                <?php echo $row->Gross_Amount - $pay ?>
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