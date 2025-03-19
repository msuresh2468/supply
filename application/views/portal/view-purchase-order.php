<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pb-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="my-0">View Purchase Order</h4>
                    <!-- <a href="<?php echo base_url() ?>portal/view-po/<?php echo $view_purchase_order->PO_Number; ?>" class="text-decoration-none bg-primary text-white px-3 py-1">Back</a> -->
                </div>
                <div class="row mx-0">
                    <div class="col-md-6 pe-lg-5">
                        <div class="row view_PO">
                            <div class="col-6 py-2">
                                <p class="mb-0">PO Number: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->PO_Number; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">PO Date: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->PO_Date; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">File Number: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->File_Number; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Firm Name: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Firm_Name; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Item Name: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Item_Name; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Model: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Model; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Item Quantity: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Item_Qty; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Unit Rate: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Unit_Rate; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Item Amount: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Item_Amount; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Hospital Type: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_hospital_type->type; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Hospital Name: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_hospital_name->name; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Delivery Period: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Delivery_Period; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Scheme: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Scheme; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Supply Due Date: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Supply_DueDate; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Supply Status: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Supply_Status; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ps-lg-5">
                        <div class="row view_PO">
                            <div class="col-6 py-2">
                                <p class="mb-0">Is DD/BG: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Is_DD; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">DD Number: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->DD_Number; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">DD/BG Date: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->DD_Date; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">DD/BG Amount: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->DD_Amount; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Is Agreement: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Is_Agreement; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Agreement Number: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Agreement_No; ?></p>
                            </div>  
                            <div class="col-6 py-2">
                                <p class="mb-0">Delivery Date: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Delivery_Date; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Installation Date: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Installation_Date; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Is Bills Submit?: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Is_BillsSubmit; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Bills Percentage: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Bills_Percentage; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Payment Received: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Payment_Received; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Balance Amount: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Balance_Amount; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Year: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Year; ?></p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0">Remarks: </p>
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0"><?php echo $view_purchase_order->Remarks; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>



<?php $this->load->view('portal/layout/footer'); ?>