<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="my-0">PO Details</h4>
                    <a href="<?php echo base_url() ?>portal/purchase-orders" class="text-decoration-none bg-primary text-white px-3 py-1">Back</a>
                </div>
                <?php
                if ($this->session->flashdata('status')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?php echo base_url('portal/updatePO/' . $PO->id); ?>" enctype="multipart/form-data" id="form">
                    <div class="row purchase_order_form">
                        <div>
                            <p class="fw-bold mb-0">PO Details</p>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="PONo" class="form-label flex-1">PO No</label>

                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->PO_Number; ?>" id="po_number" name="po_number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="FileNo" class="form-label flex-1">File No</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->File_Number; ?>" id="file_number" name="file_number">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="PODate" class="form-label flex-1">PO Date</label>
                                <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO->PO_Date; ?>" id="po_date datepicker" name="po_date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="year" class="form-label flex-1">PO Year</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->PO_Year; ?>" id="year" name="year">
                            </div>
                        </div>
                        <div>
                            <p class="fw-bold mb-0">Firm Details</p>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="firm_name" class="form-label flex-1">Gross Amount</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Gross_Amount; ?>" id="gross_amt" name="gross_amt">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="firm_name" class="form-label flex-1">Firm Name</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Firm_Name; ?>" id="firm_name" name="firm_name">
                            </div>
                        </div>
                        <div>
                            <p class="fw-bold mb-0">Delivery & Scheme Details</p>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="delivery_period" class="form-label flex-1">Delivery Period</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Delivery_Period; ?>" id="delivery_period" name="delivery_period">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="scheme" class="form-label flex-1">Scheme</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Scheme; ?>" id="scheme" name="scheme">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="supply_dueDate" class="form-label flex-1">Supply Due Date</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Supply_DueDate; ?>" id="supply_dueDate" name="supply_dueDate">
                            </div>
                        </div>
                        <div class="">
                            <p class="fw-bold mb-0">DD & Agreement Details</p>
                        </div>
                        <div class="col-md-12 my-3">
                            <div class="mt-2 d-flex align-items-end dd_field">
                                <label for="is_dd" class="form-label flex-1">Is DD/BG?</label>
                                <label><input type="radio" name="is_dd" id="is_dd_yes" class="is_dd_yes flex-1 input_style" value="Yes" <?php if ($PO->Is_DD == 'Yes') { ?> checked <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="is_dd" id="is_dd_no" class="flex-1 input_style" value="No" <?php if ($PO->Is_DD == 'No') { ?> checked <?php } else {
                                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                                } ?>> No</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dd_number" class="form-label flex-1">DD/BG Number</label>
                                <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->DD_Number; ?>" id="dd_number" name="dd_number" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dd_date" class="form-label flex-1">DD/BG Date</label>
                                <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO->DD_Date; ?>" id="dd_date" name="dd_date" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dd_date" class="form-label flex-1">DD/BG Validity Date</label>
                                <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO->DD_Validity; ?>" id="dd_validity" name="dd_validity" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="dd_amt" class="form-label flex-1">DD/BG Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="dd_amt" value="<?php echo $PO->DD_Amount; ?>" name="dd_amt" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="mt-3 d-flex align-items-end agreement_field">
                                <label for="is_agreement" class="form-label flex-1">Is Agreement?</label>
                                <label><input type="radio" name="is_agreement" id="is_agreement_yes" value="Yes" class="is_agreement_yes flex-1 input_style" <?php if ($PO->Is_Agreement == 'Yes') { ?> checked <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="is_agreement" id="is_agreement_no" value="No" class="flex-1 input_style" <?php if ($PO->Is_Agreement == 'No') { ?> checked <?php } else {
                                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                                        } ?>> No</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="agreement_no" class="form-label flex-1">Agreement No</label>
                                <input type="text" class="form-control flex-1 input_style" id="agreement_no" value="<?php echo $PO->Agreement_No; ?>" name="agreement_no" <?php if ($PO->Is_Agreement != 'Yes') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="agreement_date" class="form-label flex-1">Agreement Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="agreement_date" value="<?php echo $PO->Agreement_Date; ?>" name="agreement_date" <?php if ($PO->Is_Agreement != 'Yes') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 d-flex align-items-end bills_field">
                                <label for="is_bills_submit" class="form-label flex-1">Is Bills Submitted?</label>
                                <label><input type="radio" name="is_bills_submit" id="is_bills_submit_yes" value="Yes" <?php if ($PO->Is_BillsSubmit == 'Yes') { ?> checked <?php } ?> class="is_bills_submit_yes flex-1 input_style"> Yes</label>
                                <label class="ms-3"><input type="radio" name="is_bills_submit" id="is_bills_submit_no" value="No" <?php if ($PO->Is_BillsSubmit == 'No') { ?> checked <?php } ?> class="flex-1 input_style"> No</label>
                            </div>
                        </div>
                        <!-- <div class="col-md-9">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="bills_to_be_submit" class="form-label flex-1" >Bills to be Submitted</label>
                                    <select class="form-select" id="bills_to_be_submit" name="bills_to_be_submit" <?php if ($PO->Is_BillsSubmit != 'Yes') { ?> disabled <?php } ?>>
                                        <option value="0" <?php if ($PO->Bills_Percentage == '0') { ?> selected <?php } ?>>0%</option>
                                        <option value="60" <?php if ($PO->Bills_Percentage == '60') { ?> selected <?php } ?>>60%</option>
                                        <option value="90" <?php if ($PO->Bills_Percentage == '90') { ?> selected <?php } ?>>90%</option>
                                        <option value="100" <?php if ($PO->Bills_Percentage == '100') { ?> selected <?php } ?>>100%</option>
                                    </select>
                                    <input type="text" class="form-control flex-1 input_style" id="bills_to_be_submit" name="bills_to_be_submit" disabled>
                                </div>
                            </div> -->
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end bills_field_60">
                                <label for="is_bills_submit" class="form-label flex-1">60%</label>
                                <label><input type="radio" name="bill_60" id="bill_60" value="60" class="is_bills_60_yes flex-1 input_style" <?php if ($PO->Bills_Percentage_60 == '60') { ?> checked <?php } ?> <?php if ($PO->Is_BillsSubmit != 'Yes' || $PO->Bills_Percentage_90 == '90') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="bill_60" id="is_bills_submit_no" value="No" class="is_bills_60_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="bill_60_amt" name="bill_60_received_amt" <?php if ($PO->Bills_Percentage_60 != '60') { ?> disabled <?php } ?> value="<?php echo $PO->Bills_60_Amount; ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="bill_60_date" name="bill_60_received_date" <?php if ($PO->Bills_Percentage_60 != '60') { ?> disabled <?php } ?> value="<?php echo $PO->Bills_60_Date; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end bills_field_30">
                                <label for="is_bills_submit" class="form-label flex-1">30%</label>
                                <label><input type="radio" name="bill_30" id="bill_30" value="30" class="is_bills_30_yes flex-1 input_style" <?php if ($PO->Bills_Percentage_30 == '30') { ?> checked <?php } ?> <?php if ($PO->Is_BillsSubmit != 'Yes' || $PO->Bills_Percentage_90 == '90') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="bill_30" id="is_bills_submit_no" value="No" class="is_bills_30_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="bill_30_amt" name="bill_30_received_amt" value="<?php echo $PO->Bills_30_Amount; ?>" <?php if ($PO->Bills_Percentage_30 != '30') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="bill_30_date" name="bill_30_received_date" value="<?php echo $PO->Bills_30_Date; ?>" <?php if ($PO->Bills_Percentage_30 != '30') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end bills_field_90">
                                <label for="is_bills_submit" class="form-label flex-1">90%</label>
                                <label><input type="radio" name="bill_90" id="bill_90" value="Yes" class="is_bills_90_yes flex-1 input_style" <?php if ($PO->Bills_Percentage_90 == '90') { ?> checked <?php } ?> <?php if ($PO->Is_BillsSubmit != 'Yes' || $PO->Bills_Percentage_60 == '60') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="bill_90" id="is_bills_submit_no" value="No" class="is_bills_90_yes flex-1 input_style" <?php if ($PO->Is_Payment == 'No') { ?> checked <?php } ?> disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="bill_90_amt" name="bill_90_received_amt" value="<?php echo $PO->Bills_90_Amount; ?>" <?php if ($PO->Bills_Percentage_90 != '90') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="bill_90_date" name="bill_90_received_date" value="<?php echo $PO->Bills_90_Date; ?>" <?php if ($PO->Bills_Percentage_90 != '90') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end bills_field_10">
                                <label for="is_bills_submit" class="form-label flex-1">10%</label>
                                <label><input type="radio" name="bill_10" id="bill_10" value="10" class="is_bills_10_yes flex-1 input_style" <?php if ($PO->Bills_Percentage_10 == '10') { ?> checked <?php } ?> <?php if ($PO->Is_BillsSubmit != 'Yes') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="bill_10" id="is_bills_submit_no" value="No" class="is_bills_10_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="bill_10_amt" name="bill_10_received_amt" value="<?php echo $PO->Bills_10_Amount; ?>" <?php if ($PO->Bills_Percentage_10 != '10') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Bills Submitted Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="bill_10_date" name="bill_10_received_date" value="<?php echo $PO->Bills_10_Date; ?>" <?php if ($PO->Bills_Percentage_10 != '10') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 d-flex align-items-end payment_field">
                                <label for="is_bills_submit" class="form-label flex-1">Is Payment Received?</label>
                                <label><input type="radio" name="is_payment" id="is_payment_submit_yes" value="Yes" class="is_payment_submit_yes flex-1 input_style" <?php if ($PO->Is_Payment == 'Yes') { ?> checked <?php } ?> <?php if ($PO->Is_Payment != 'Yes') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="is_payment" id="is_payment_submit_no" value="No" class="is_payment_submit_no flex-1 input_style" <?php if ($PO->Is_Payment == 'No') { ?> checked <?php } ?> disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end payment_field_60">
                                <label for="is_bills_submit" class="form-label flex-1">60%</label>
                                <label><input type="radio" name="payment_60" id="payment_60" value="60" class="is_payment_60_yes flex-1 input_style" <?php if ($PO->Pay_Percentage_60 == '60') { ?> checked <?php } ?> <?php if ($PO->Is_Payment != 'Yes') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="payment_60" id="is_bills_submit_no" value="No" class="is_payment_60_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="payment_60_amt" name="payment_60_received_amt" <?php if ($PO->Pay_Percentage_60 != '60') { ?> disabled <?php } ?> value="<?php echo $PO->Pay_60_Amt; ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="payment_60_date" name="payment_60_received_date" <?php if ($PO->Pay_Percentage_60 != '60') { ?> disabled <?php } ?> value="<?php echo $PO->Pay_60_Date; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end payment_field_30">
                                <label for="is_bills_submit" class="form-label flex-1">30%</label>
                                <label><input type="radio" name="payment_30" id="payment_30" value="30" class="is_payment_30_yes flex-1 input_style" <?php if ($PO->Pay_Percentage_30 == '30') { ?> checked <?php } ?> <?php if ($PO->Is_Payment != 'Yes') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="payment_30" id="is_bills_submit_no" value="No" class="is_payment_30_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="payment_30_amt" name="payment_30_received_amt" value="<?php echo $PO->Pay_30_Amt; ?>" <?php if ($PO->Pay_Percentage_30 != '30') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="payment_30_date" name="payment_30_received_date" value="<?php echo $PO->Pay_30_Date; ?>" <?php if ($PO->Pay_Percentage_30 != '30') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end payment_field_90">
                                <label for="is_bills_submit" class="form-label flex-1">90%</label>
                                <label><input type="radio" name="payment_90" id="payment_90" value="90" class="is_payment_90_yes flex-1 input_style" <?php if ($PO->Pay_Percentage_90 == 'Yes') { ?> checked <?php } ?> <?php if ($PO->Is_Payment != 'Yes' || $PO->Pay_Percentage_60 == '60') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="payment_90" id="is_bills_submit_no" value="No" class="is_payment_90_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="payment_90_amt" name="payment_90_received_amt" value="<?php echo $PO->Pay_90_Amt; ?>" <?php if ($PO->Pay_Percentage_90 != '90') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="payment_90_date" name="payment_90_received_date" value="<?php echo $PO->Pay_90_Date; ?>" <?php if ($PO->Pay_Percentage_90 != '90') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 d-flex align-items-end payment_field_10">
                                <label for="is_bills_submit" class="form-label flex-1">10%</label>
                                <label><input type="radio" name="payment_10" id="payment_10" value="10" class="is_payment_10_yes flex-1 input_style" <?php if ($PO->Pay_Percentage_10 == '10') { ?> checked <?php } ?> <?php if ($PO->Is_Payment != 'Yes') { ?> disabled <?php } ?>> Yes</label>
                                <label class="ms-3"><input type="radio" name="payment_10" id="is_bills_submit_no" value="No" class="is_payment_10_yes flex-1 input_style" disabled> No</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="payment_10_amt" name="payment_10_received_amt" value="<?php echo $PO->Pay_10_Amt; ?>" <?php if ($PO->Pay_Percentage_10 != '10') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Payment Received Date</label>
                                <input type="date" class="form-control flex-1 input_style" id="payment_10_date" name="payment_10_received_date" value="<?php echo $PO->Pay_10_Date; ?>" <?php if ($PO->Pay_Percentage_10 != '10') { ?> disabled <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="received_amt" class="form-label flex-1">Late Delivery Charges Amount</label>
                                <input type="text" class="form-control flex-1 input_style" id="ldc_amount" name="ldc_amount" value="<?php echo $PO->LDC_Amount; ?>">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="received_amt" class="form-label flex-1">Received Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="received_amt" name="received_amt" value="<?php echo $PO->Payment_Received; ?>">
                                </div>
                            </div> -->


                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-end">
                                <label for="remarks" class="form-label flex-1">Remarks</label>
                                <input type="text" class="form-control flex-1 input_style" id="remarks" name="remarks">
                            </div>
                        </div>

                    </div>
                    <input type="submit" name="POSubmit" class="btn btn-success" id="BtnChange" value="SUBMIT">
                </form>
            </main>
        </div>
    </div>
</div>



<?php $this->load->view('portal/layout/footer'); ?>