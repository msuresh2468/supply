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
                    <form method="post" action="<?php echo base_url('portal/updatePOItem/' . $PO_Item->id); ?>" enctype="multipart/form-data" id="form">
                        <div class="row purchase_order_form">
                            <div>
                                <p class="fw-bold mb-0">PO Details</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="PONo" class="form-label flex-1">PO No</label>
                                    
                                    <input type="text" class="form-control flex-1 input_style" disabled value="<?php echo $PO_Item->po_id; ?>" id="po_number" name="po_number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_name" class="form-label flex-1">Item Name</label>
                                    <input type="text" class="form-control flex-1 input_style" disabled value="<?php echo $PO_Item->Item_Name ; ?>" id="item_name" name="item_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Make & Model</label>
                                    <input type="text" class="form-control flex-1 input_style" disabled value="<?php echo $PO_Item->Item_Model ; ?>" id="model" name="model">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_qty" class="form-label flex-1">Item Quantity</label>
                                    <input type="number" class="form-control flex-1 input_style" disabled value="<?php echo $PO_Item->Item_Qty ; ?>" id="item_qty" name="item_qty[]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Unit Rate</label>
                                    <input type="number" class="form-control flex-1 input_style" disabled value="<?php echo $PO_Item->Unit_Rate ; ?>" id="unit_rate" name="unit_rate">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="unit_rate" class="form-label flex-1">Total Amount</label>
                                    <input type="number" class="form-control flex-1 input_style" disabled value="<?php echo $PO_Item->Unit_Rate *  $PO_Item->Item_Qty; ?>" id="unit_rate" name="unit_rate">
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Hospital Details</p>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Select District</label>
                                    <select class="form-select input_style flex-1" id="district" name="district" disabled>
                                        <option>Select District</option>
                                        <option value="Srikakulam" <?php if($PO_Item->District == 'Srikakulam') { ?> selected <?php } ?> >Srikakulam</option>
                                        <option value="Parvathipuram-Manyam" <?php if($PO_Item->District == 'Parvathipuram Manyam') { ?> selected <?php } ?> >Parvathipuram Manyam</option>
                                        <option value="Vizianagaram" <?php if($PO_Item->District == 'Vizianagaram') { ?> selected <?php } ?> >Vizianagaram</option>
                                        <option value="Visakhapatnam" <?php if($PO_Item->District == 'Visakhapatnam') { ?> selected <?php } ?> >Visakhapatnam</option>
                                        <option value="Alluri Sitharama Raju" <?php if($PO_Item->District == 'Alluri Sitharama Raju') { ?> selected <?php } ?> >Alluri Sitharama Raju</option>
                                        <option value="Anakapalli" <?php if($PO_Item->District == 'Anakapalli') { ?> selected <?php } ?> >Anakapalli</option>
                                        <option value="Kakinada" <?php if($PO_Item->District == 'Kakinada') { ?> selected <?php } ?> >Kakinada</option>
                                        <option value="East Godavari" <?php if($PO_Item->District == 'East Godavari') { ?> selected <?php } ?> >East Godavari</option>
                                        <option value="Dr. B. R. Ambedkar Konaseema" <?php if($PO_Item->District == 'Dr. B. R. Ambedkar Konaseema') { ?> selected <?php } ?> >Dr. B. R. Ambedkar Konaseema</option>
                                        <option value="Eluru" <?php if($PO_Item->District == 'Eluru') { ?> selected <?php } ?> >Eluru</option>
                                        <option value="West Godavari" <?php if($PO_Item->District == 'West Godavari') { ?> selected <?php } ?> >West Godavari</option>
                                        <option value="NTR" <?php if($PO_Item->District == 'NTR') { ?> selected <?php } ?> >NTR</option>
                                        <option value="Krishna" <?php if($PO_Item->District == 'Krishna') { ?> selected <?php } ?> >Krishna</option>
                                        <option value="Palnadu" <?php if($PO_Item->District == 'Palnadu') { ?> selected <?php } ?> >Palnadu</option>
                                        <option value="Guntur" <?php if($PO_Item->District == 'Guntur') { ?> selected <?php } ?> >Guntur</option>
                                        <option value="Bapatla" <?php if($PO_Item->District == 'Bapatla') { ?> selected <?php } ?> >Bapatla</option>
                                        <option value="Sri Potti Sriramulu Nellore" <?php if($PO_Item->District == 'Sri Potti Sriramulu Nellore') { ?> selected <?php } ?> >Sri Potti Sriramulu Nellore</option>
                                        <option value="Prakasam" <?php if($PO_Item->District == 'Prakasam') { ?> selected <?php } ?> >Prakasam</option>
                                        <option value="Kurnool" <?php if($PO_Item->District == 'Kurnool') { ?> selected <?php } ?> >Kurnool</option>
                                        <option value="Nandyal" <?php if($PO_Item->District == 'Nandyal') { ?> selected <?php } ?> >Nandyal</option>
                                        <option value="Anantapuramu" <?php if($PO_Item->District == 'Anantapuramu') { ?> selected <?php } ?> >Anantapuramu</option>
                                        <option value="Sri Sathya Sai" <?php if($PO_Item->District == 'Sri Sathya Sai') { ?> selected <?php } ?> >Sri Sathya Sai</option>
                                        <option value="YSR" <?php if($PO_Item->District == 'YSR') { ?> selected <?php } ?> >YSR</option>
                                        <option value="Annamayya" <?php if($PO_Item->District == 'Annamayya') { ?> selected <?php } ?> >Annamayya</option>
                                        <option value="Tirupati" <?php if($PO_Item->District == 'Tirupati') { ?> selected <?php } ?> >Tirupati</option>
                                        <option value="Chittoor" <?php if($PO_Item->District == 'Chittoor') { ?> selected <?php } ?> >Chittoor</option>                 
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Hospital Type</label>
                                    <input type="text" disabled class="form-select hospital_name input_style flex-1" 
                                    value="<?php if($PO_Item->Hospital_Type == '1') echo 'AH';
                                    else if($PO_Item->Hospital_Type == '2') echo 'PHC';
                                    else if($PO_Item->Hospital_Type == '3') echo 'CHC';
                                    else if($PO_Item->Hospital_Type == '4') echo 'DH';
                                    else if($PO_Item->Hospital_Type == '5') echo 'TH';
                                    else if($PO_Item->Hospital_Type == '6') echo 'UPHC';
                                    else if($PO_Item->Hospital_Type == '7') echo 'MCH';
                                    else if($PO_Item->Hospital_Type == '8') echo 'Others';                                    
                                    ?>">
                                   
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="hospital_name" class="form-label flex-1">Hospital Name</label>
                                    <input type="text" disabled class="form-select hospital_name input_style flex-1" value="<?php echo $PO_Item->po_hospital_name ?>">
                                    
                                </div>
                            </div>
                            <div>
                                <p class="fw-bold mb-0">Delivery & Scheme Details</p>
                            </div>
                            <div class="col-md-4 mt-lg-3">
                                <div class="d-flex align-items-end supply_status">
                                    <label for="supply_status" class="form-label flex-1">Supply Status</label>
                                    <label><input type="radio" name="supply_status" id="supply_status_yes" value="Supplied" <?php if($PO_Item->supply_status == 'Supplied') { ?> checked <?php } ?> class="supply_status_yes flex-1 input_style"> Yes</label>
                                    <label class="ms-3"><input type="radio" name="supply_status" id="supply_status_no" value="Not Supplied" <?php if($PO_Item->supply_status == 'Not Supplied') { ?> checked <?php } else { echo 'disabled'; }?> class="supply_status_yes flex-1 input_style"> No</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="delivery_date" class="form-label flex-1">Delivery Date</label>
                                    <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO_Item->Delivery_Date; ?>" id="delivery_date" name="delivery_date" <?php if ($PO_Item->supply_status != 'Supplied') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="installation_date" class="form-label flex-1">Installation Date</label>
                                    <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO_Item->Installation_Date; ?>" id="installation_date" name="installation_date" <?php if ($PO_Item->supply_status != 'Supplied') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="warranty_years" class="form-label flex-1">Warranty Years</label>
                                    <input type="text" class="form-control flex-1 input_style" value="<?php echo $PO_Item->Warranty_Years; ?>" id="warranty_years" name="warranty_years" <?php if ($PO_Item->supply_status != 'Supplied') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="warranty_Date" class="form-label flex-1">Warranty Date</label>
                                    <input type="date" class="form-control flex-1 input_style" value="<?php echo $PO_Item->Warranty_Date; ?>" id="warranty_date" name="warranty_date" <?php if ($PO_Item->supply_status != 'Supplied') { ?> disabled <?php } ?>>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="stock_number" class="form-label flex-1">Stock Entry Page Number</label>
                                    <input type="text" class="form-control flex-1 input_style" id="stock_number" name="stock_number">
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