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
                    <!-- <h4>Add Purchase Order</h4> -->
                </div>
                <div>
                    <form method="post" action="<?php echo base_url(); ?>portal/addPO" enctype="multipart/form-data" id="form">
                        <div class="row purchase_order_form">
                            <div>
                                <p class="fw-bold mb-0">PO Details</p>
                            </div>
                            <input type='hidden' value='1' name='total_count' id="total_count">
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="year" class="form-label flex-1">PO Year</label>
                                    <!-- <input type="text" class="form-control flex-1 input_style" id="year" name="year"> -->
                                    <?php $selected_value = 2025;
                                    $earliest_year = 2000;

                                    print '<select class="form-select input_style flex-1" id="year" name="year">';
                                    foreach (range(date('Y'), $earliest_year) as $x) {
                                        print '<option value="' . $x . '"' . ($x === $selected_value ? ' selected="selected"' : '') . '>' . $x . '</option>';
                                    }
                                    print '</select>'; ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="PONo" class="form-label flex-1">PO No</label>

                                    <input type="text" class="form-control flex-1 input_style" id="po_number" name="po_number" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="FileNo" class="form-label flex-1">File No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="file_number" name="file_number" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="PODate" class="form-label flex-1">PO Date</label>
                                    <input type="date" class="form-control flex-1 input_style" id="po_date datepicker" name="po_date" required>
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Firm Details</p>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="gross_amount" class="form-label flex-1">Gross Amount</label>
                                    <input type="text" class="form-control flex-1 input_style" id="gross_amount" name="gross_amount" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="firm_name" class="form-label flex-1">Firm Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="firm_name" name="firm_name" required>
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Item Details</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_name" class="form-label flex-1">Item Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_name" name="item_name[]" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Make & Model</label>
                                    <input type="text" class="form-control flex-1 input_style" id="model" name="model[]" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_qty" name="item_qty[]" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Unit Rate</label>
                                    <input type="text" class="form-control flex-1 input_style" id="unit_rate" name="unit_rate[]" required>
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Hospital Details</p>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select Hospital Type</label>
                                    <select onchange="hospital_typeChange('type')" class="form-select hospital_type input_style flex-1" id="type" name="type[]" data-id='type'>
                                        <option>Select Hospital Type</option>
                                        <?php
                                        foreach ($types as $type) {
                                        ?>
                                            <option value="<?php echo $type->id; ?>"><?php echo $type->type; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="hospital_name" class="form-label flex-1">Select Hospital Name</label>

                                    <div id='HospitalBox' class="flex-1">
                                        <select class="form-select input_style selectpicker" id="hospital_name" name="hospital_name[]" aria-label="Default select example">
                                            <option selected>Select Hospital Name</option>
                                            <!-- <?php include('names-select.php'); ?> -->
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="district" class="form-label flex-1">Select District</label>
                                    <select class="form-select input_style flex-1" id="district" name="district[]" required>
                                        <option>Select District</option>
                                        <option value="Srikakulam">Srikakulam</option>
                                        <option value="Parvathipuram Manyam">Parvathipuram Manyam</option>
                                        <option value="Vizianagaram">Vizianagaram</option>
                                        <option value="Visakhapatnam">Visakhapatnam</option>
                                        <option value="Alluri Sitharama Raju">Alluri Sitharama Raju</option>
                                        <option value="Anakapalli">Anakapalli</option>
                                        <option value="Kakinada">Kakinada</option>
                                        <option value="East Godavari">East Godavari</option>
                                        <option value="Dr. B. R. Ambedkar Konaseema">Dr. B. R. Ambedkar Konaseema</option>
                                        <option value="Eluru">Eluru</option>
                                        <option value="West Godavari">West Godavari</option>
                                        <option value="NTR">NTR</option>
                                        <option value="Krishna">Krishna</option>
                                        <option value="Palnadu">Palnadu</option>
                                        <option value="Guntur">Guntur</option>
                                        <option value="Bapatla">Bapatla</option>
                                        <option value="Sri Potti Sriramulu Nellore">Sri Potti Sriramulu Nellore</option>
                                        <option value="Prakasam">Prakasam</option>
                                        <option value="Kurnool">Kurnool</option>
                                        <option value="Nandyal">Nandyal</option>
                                        <option value="Anantapuramu">Anantapuramu</option>
                                        <option value="Sri Sathya Sai">Sri Sathya Sai</option>
                                        <option value="YSR">YSR</option>
                                        <option value="Annamayya">Annamayya</option>
                                        <option value="Tirupati">Tirupati</option>
                                        <option value="Chittoor">Chittoor</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Delivery & Scheme Details</p>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_period" class="form-label flex-1">Delivery Period</label>
                                    <input type="text" class="form-control flex-1 input_style" id="delivery_period" name="delivery_period" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="scheme" class="form-label flex-1">Scheme</label>
                                    <input type="text" class="form-control flex-1 input_style" id="scheme" name="scheme" required>
                                </div>
                            </div>
                            <div class="col-md-4 mt-lg-3">
                                <div class="d-flex align-items-end">
                                    <label for="supply_status" class="form-label flex-1">Supply Status</label>
                                    <label><input type="radio" name="supply_status" id="supply_status_yes" value="Supplied" class="supply_status_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="supply_status" id="supply_status_no" value="Not Supplied" class="flex-1 input_style" checked> No</label>
                                </div>
                            </div>

                        </div>

                        <div id="addinput"></div>
                        <button id="rowAdd" type="button" class="btn btn-dark">
                            <span class="bi bi-plus-square-dotted">
                            </span> Add another Item Details
                        </button>
                        <input type="submit" name="POSubmit" class="btn btn-success" value="SUBMIT">
                    </form>
                </div>

            </main>
        </div>
    </div>
</div>
<?php $this->load->view('portal/layout/footer'); ?>