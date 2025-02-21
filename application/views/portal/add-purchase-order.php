<?php
$this->load->view('portal/layout/header');
?>
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
                    <h4>Add Purchase Order</h4>
                </div>
                <div>
                    <form method="post" action="<?php echo base_url(); ?>portal/addPO" enctype="multipart/form-data" id="form">
                        <div class="row purchase_order_form">
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="PONo" class="form-label flex-1">PO No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="po_number" name="po_number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="FileNo" class="form-label flex-1">File No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="file_number" name="file_number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="PODate" class="form-label flex-1">PO Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="po_date datepicker" name="po_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="firm_name" class="form-label flex-1">Firm Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="firm_name" name="firm_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_name" class="form-label flex-1">Item Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_name" name="item_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Model</label>
                                    <input type="text" class="form-control flex-1 input_style" id="model" name="model">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="number" class="form-control flex-1 input_style" id="item_qty" name="item_qty">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Unit Rate</label>
                                    <input type="number" class="form-control flex-1 input_style" id="unit_rate" name="unit_rate">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_amt" class="form-label flex-1">Item Amount</label>
                                    <input type="number" class="form-control flex-1 input_style" id="item_amt" name="item_amt">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="hospital_name" class="form-label flex-1">Hospital Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="hospital_name" name="hospital_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_period" class="form-label flex-1">Delivery Period</label>
                                    <input type="text" class="form-control flex-1 input_style" id="delivery_period" name="delivery_period">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="scheme" class="form-label flex-1">Scheme</label>
                                    <input type="text" class="form-control flex-1 input_style" id="scheme" name="scheme">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="supply_due_date" class="form-label flex-1">Supply Due Date</label>
                                    <input type="text" class="form-control flex-1 input_style" id="supply_due_date" name="supply_due_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-2 d-flex align-items-end">
                                    <label for="is_dd" class="form-label flex-1">Is DD/BG?</label>
                                    <label><input type="radio" name="is_dd" id="is_dd_yes" value="Yes" class="is_dd_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_dd" id="is_dd_no" value="No" class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_number" class="form-label flex-1">DD/BG Number</label>
                                    <input type="text" class="form-control flex-1 input_style" id="dd_number" name="dd_number" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_date" class="form-label flex-1">DD/BG Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="dd_date" name="dd_date" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="dd_amt" class="form-label flex-1">DD/BG Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="dd_amt" name="dd_amt" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 d-flex align-items-end">
                                    <label for="is_agreement" class="form-label flex-1">Is Agreement?</label>
                                    <label><input type="radio" name="is_agreement" id="is_agreement_yes" value="Yes" class="is_agreement_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_agreement" id="is_agreement_no" value="No" class="flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="agreement_no" class="form-label flex-1">Agreement No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="agreement_no" name="agreement_no" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="agreement_date" class="form-label flex-1">Agreement Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="agreement_date" name="agreement_date" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="supply_status" class="form-label flex-1">Supply Status</label>
                                    <input type="text" class="form-control flex-1 input_style" id="supply_status" name="supply_status">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_date" class="form-label flex-1">Delivery Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="delivery_date" name="delivery_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="installation_date" class="form-label flex-1">Installation Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="installation_date" name="installation_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 d-flex align-items-end">
                                    <label for="is_bills_submit" class="form-label flex-1">Is Bills Submitted?</label>
                                    <label><input type="radio" name="is_bills_submit" id="is_bills_submit_yes" value="Yes" class="is_bills_submit_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="is_bills_submit" id="is_bills_submit_no" value="No" class="flex-1 input_style"> No</label>
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
                                    <label for="balance_amt" class="form-label flex-1">Balance Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="balance_amt" name="balance_amt">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="year" class="form-label flex-1">Year</label>
                                    <input type="text" class="form-control flex-1 input_style" id="year" name="year">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="remarks" class="form-label flex-1">Remarks</label>
                                    <input type="text" class="form-control flex-1 input_style" id="remarks" name="remarks">
                                </div>
                            </div>

                        </div>
                        <!-- <div id="addinput"></div>
                        <button id="rowAdd" type="button" class="btn btn-dark">
                            <span class="bi bi-plus-square-dotted">
                            </span> Add New Firm
                        </button> -->

                        <input type="submit" name="POSubmit" class="btn btn-success" value="SUBMIT">
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>
<?php $this->load->view('portal/layout/footer'); ?>