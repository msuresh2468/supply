<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <!-- <h4>Add Purchase Order</h4> -->
                </div>
                <div>
                    <form method="post" action="<?php echo base_url('portal/updatePO/' . $PO->id); ?>" enctype="multipart/form-data" id="form">
                        <div class="row purchase_order_form">
                            <div>
                                <p class="fw-bold mb-0">PO Details</p>
                            </div>
                            <input type='hidden' value='1' name='total_count' id="total_count">
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
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Year; ?>" id="year" name="year">
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Firm & Item Details</p>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="gross_amount" class="form-label flex-1">Gross Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Item_Amount; ?>" id="gross_amount" name="gross_amount">
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="firm_name" class="form-label flex-1">Firm Name</label>
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Firm_Name; ?>" id="firm_name" name="firm_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_name" class="form-label flex-1">Item Name</label>
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Item_Name; ?>" id="item_name" name="item_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Make & Model</label>
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->Model; ?>" id="model" name="model">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="number" class="form-control flex-1 input_style" value="<?php echo $PO->Item_Qty; ?>" id="item_qty" name="item_qty[]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Unit Rate</label>
                                    <input type="number" class="form-control flex-1 input_style" value="<?php echo $PO->Unit_Rate; ?>" id="unit_rate" name="unit_rate">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Total Amount</label>
                                    <input type="number" class="form-control flex-1 input_style" value="<?php echo $PO->Unit_Rate *  $PO->Item_Qty; ?>" id="unit_rate" name="unit_rate">
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Hospital Details</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select District</label>
                                    <select class="form-select input_style flex-1" id="district" name="district">
                                        <option>Select District</option>
                                        <option value="Srikakulam" <?php if ($PO->District == 'Srikakulam') { ?> selected <?php } ?>>Srikakulam</option>
                                        <option value="Parvathipuram-Manyam" <?php if ($PO->District == 'Parvathipuram Manyam') { ?> selected <?php } ?>>Parvathipuram Manyam</option>
                                        <option value="Vizianagaram" <?php if ($PO->District == 'Vizianagaram') { ?> selected <?php } ?>>Vizianagaram</option>
                                        <option value="Visakhapatnam" <?php if ($PO->District == 'Visakhapatnam') { ?> selected <?php } ?>>Visakhapatnam</option>
                                        <option value="Alluri Sitharama Raju" <?php if ($PO->District == 'Alluri Sitharama Raju') { ?> selected <?php } ?>>Alluri Sitharama Raju</option>
                                        <option value="Anakapalli" <?php if ($PO->District == 'Anakapalli') { ?> selected <?php } ?>>Anakapalli</option>
                                        <option value="Kakinada" <?php if ($PO->District == 'Kakinada') { ?> selected <?php } ?>>Kakinada</option>
                                        <option value="East Godavari" <?php if ($PO->District == 'East Godavari') { ?> selected <?php } ?>>East Godavari</option>
                                        <option value="Dr. B. R. Ambedkar Konaseema" <?php if ($PO->District == 'Dr. B. R. Ambedkar Konaseema') { ?> selected <?php } ?>>Dr. B. R. Ambedkar Konaseema</option>
                                        <option value="Eluru" <?php if ($PO->District == 'Eluru') { ?> selected <?php } ?>>Eluru</option>
                                        <option value="West Godavari" <?php if ($PO->District == 'West Godavari') { ?> selected <?php } ?>>West Godavari</option>
                                        <option value="NTR" <?php if ($PO->District == 'NTR') { ?> selected <?php } ?>>NTR</option>
                                        <option value="Krishna" <?php if ($PO->District == 'Krishna') { ?> selected <?php } ?>>Krishna</option>
                                        <option value="Palnadu" <?php if ($PO->District == 'Palnadu') { ?> selected <?php } ?>>Palnadu</option>
                                        <option value="Guntur" <?php if ($PO->District == 'Guntur') { ?> selected <?php } ?>>Guntur</option>
                                        <option value="Bapatla" <?php if ($PO->District == 'Bapatla') { ?> selected <?php } ?>>Bapatla</option>
                                        <option value="Sri Potti Sriramulu Nellore" <?php if ($PO->District == 'Sri Potti Sriramulu Nellore') { ?> selected <?php } ?>>Sri Potti Sriramulu Nellore</option>
                                        <option value="Prakasam" <?php if ($PO->District == 'Prakasam') { ?> selected <?php } ?>>Prakasam</option>
                                        <option value="Kurnool" <?php if ($PO->District == 'Kurnool') { ?> selected <?php } ?>>Kurnool</option>
                                        <option value="Nandyal" <?php if ($PO->District == 'Nandyal') { ?> selected <?php } ?>>Nandyal</option>
                                        <option value="Anantapuramu" <?php if ($PO->District == 'Anantapuramu') { ?> selected <?php } ?>>Anantapuramu</option>
                                        <option value="Sri Sathya Sai" <?php if ($PO->District == 'Sri Sathya Sai') { ?> selected <?php } ?>>Sri Sathya Sai</option>
                                        <option value="YSR" <?php if ($PO->District == 'YSR') { ?> selected <?php } ?>>YSR</option>
                                        <option value="Annamayya" <?php if ($PO->District == 'Annamayya') { ?> selected <?php } ?>>Annamayya</option>
                                        <option value="Tirupati" <?php if ($PO->District == 'Tirupati') { ?> selected <?php } ?>>Tirupati</option>
                                        <option value="Chittoor" <?php if ($PO->District == 'Chittoor') { ?> selected <?php } ?>>Chittoor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Hospital Type</label>
                                    <input type="text" class="form-select hospital_name input_style flex-1" value="<?php echo $view_hospital_type->type ?>">
                                    <!-- <select onchange="hospital_typeChange('type')" class="form-select hospital_type input_style flex-1" id="type" name="type[]" data-id='type'>
                                        <option>Select Hospital Type</option>
                                        <?php
                                        foreach ($types as $type) {
                                        ?>
                                            <option value="<?php echo $type->id; ?>"><?php echo $type->type; ?></option>
                                        <?php }
                                        ?>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="hospital_name" class="form-label flex-1">Hospital Name</label>
                                    <input type="text" class="form-select hospital_name input_style flex-1" value="<?php echo $view_hospital_name->name ?>">
                                    <!-- <?php include('names-select.php'); ?> -->
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
                            <div class="col-md-3">
                                <div class="mt-2 d-flex align-items-end dd_field">
                                    <label for="is_dd" class="form-label flex-1">Is DD/BG?</label>
                                    <label><input type="radio" name="is_dd" id="is_dd_yes" class="is_dd_yes flex-1 input_style" value="Yes" <?php if ($PO->Is_DD == 'Yes') { ?> checked <?php } ?>> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_dd" id="is_dd_no" class="flex-1 input_style" value="No" <?php if ($PO->Is_DD == 'No') { ?> checked <?php } ?>> No</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_number" class="form-label flex-1">DD/BG Number</label>
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO->DD_Number; ?>" id="dd_number" name="dd_number" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_date" class="form-label flex-1">DD/BG Date</label>
                                    <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO->DD_Date; ?>" id="dd_date" name="dd_date" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_amt" class="form-label flex-1">DD/BG Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="dd_amt" value="<?php echo $PO->DD_Amount; ?>" name="dd_amt" <?php if ($PO->Is_DD != 'Yes') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 d-flex align-items-end agreement_field">
                                    <label for="is_agreement" class="form-label flex-1">Is Agreement?</label>
                                    <label><input type="radio" name="is_agreement" id="is_agreement_yes" value="Yes" class="is_agreement_yes flex-1 input_style" <?php if ($PO->Is_Agreement == 'Yes') { ?> checked <?php } ?>> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_agreement" id="is_agreement_no" value="No" class="flex-1 input_style" <?php if ($PO->Is_Agreement == 'No') { ?> checked <?php } ?>> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="agreement_no" class="form-label flex-1">Agreement No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="agreement_no" value="<?php echo $PO->Agreement_No; ?>" name="agreement_no" <?php if ($PO->Is_Agreement != 'Yes') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="agreement_date" class="form-label flex-1">Agreement Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="agreement_date" value="<?php echo $PO->Agreement_Date; ?>" name="agreement_date" <?php if ($PO->Is_Agreement != 'Yes') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4 mt-lg-3">
                                <div class="d-flex align-items-end">
                                    <label for="supply_status" class="form-label flex-1">Supply Status</label>
                                    <label><input type="radio" name="supply_status" id="supply_status_yes" value="Supplied" <?php if ($PO->Supply_Status == 'Supplied') { ?> checked <?php } ?> class="supply_status_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="supply_status" id="supply_status_no" value="Not Supplied" <?php if ($PO->Supply_Status == 'Not Supplied') { ?> checked <?php } ?> class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_date" class="form-label flex-1">Delivery Date</label>
                                    <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO->Delivery_Date; ?>" id="delivery_date" name="delivery_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="installation_date" class="form-label flex-1">Installation Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="installation_date" name="installation_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="warranty_date" class="form-label flex-1">Warranty Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="warranty_date" name="warranty_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 d-flex align-items-end bills_field">
                                    <label for="is_bills_submit" class="form-label flex-1">Is Bills Submitted?</label>
                                    <label><input type="radio" name="is_bills_submit" id="is_bills_submit_yes" value="Yes" <?php if ($PO->Is_BillsSubmit == 'Yes') { ?> checked <?php } ?> class="is_bills_submit_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_bills_submit" id="is_bills_submit_no" value="No" <?php if ($PO->Is_BillsSubmit == 'No') { ?> checked <?php } ?> class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="bills_to_be_submit" class="form-label flex-1">Bills to be Submitted</label>
                                    <input type="text" class="form-control flex-1 input_style" id="bills_to_be_submit" name="bills_to_be_submit" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="received_amt" class="form-label flex-1">Payment Received Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="received_amt" name="received_amt">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="remarks" class="form-label flex-1">Remarks</label>
                                    <input type="text" class="form-control flex-1 input_style" id="remarks" name="remarks">
                                </div>
                            </div>

                        </div>
                        <input type="submit" name="POSubmit" class="btn btn-success" value="SUBMIT">
                    </form>
                </div>

            </main>
        </div>
    </div>
</div>
<?php $this->load->view('portal/layout/footer'); ?>