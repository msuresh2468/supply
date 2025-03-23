<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="my-0">Add Procurement Item Details</h4>
                    <a href="<?php echo base_url() ?>portal/procurement-details" class="text-decoration-none bg-primary text-white px-3 py-1">Back</a>
                </div>
                <?php
                if ($this->session->flashdata('status')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>
                <div>
                    <form method="post" action="<?php echo base_url(); ?>portal/procurement/addProcurement" enctype="multipart/form-data" id="">
                        <div class="row purchase_order_form">
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="year" class="form-label flex-1">Year</label>
                                    <input type="text" class="form-control flex-1 input_style" id="year" name="year" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="item_name" class="form-label flex-1">Item Name</label>
                                    <input type="text" class="form-control flex-1 input_style" id="item_name" name="item_name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="model" class="form-label flex-1">Make & Model</label>
                                    <input type="text" class="form-control flex-1 input_style" id="model" name="model" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="offerprice" class="form-label flex-1">Price Offered By the Firm</label>
                                    <input type="text" class="form-control flex-1 input_style" id="offer_price" name="offer_price" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="tenderNo" class="form-label flex-1">Tender No</label>
                                    <input type="text" class="form-control flex-1 input_style" id="tender_no" name="tender_no" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-end">
                                    <label for="quote_price" class="form-label flex-1">Quoted In PO Price</label>
                                    <input type="text" class="form-control flex-1 input_style" id="quote_price" name="quote_price" required>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="TenderSubmit" class="btn btn-success" id="add_tender" value="SUBMIT">
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>



<?php $this->load->view('portal/layout/footer'); ?>