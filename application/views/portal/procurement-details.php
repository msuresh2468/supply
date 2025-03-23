<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="my-0">Procurement of Items Details</h4>
                    <a href="<?php echo base_url() ?>portal/procurement/add-procurement-item" class="text-decoration-none bg-primary text-white px-3 py-1">Add New Item</a>
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

                        <?php if (count($procurement) > 0) { ?>
                            <?php $this->load->view('portal/layout/filter-search'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Item Name</th>
                                        <th>Make/Model</th>
                                        <th>Price Offered by the Firm</th>
                                        <th>Tender No & Date</th>
                                        <th>Quoted in PO Price</th>
                                        <th>Profit Amount</th>
                                        <th>Profit Percentage</th>
                                    </tr>
                                </thead>
                                <tbody id="filter_search">
                                    <?php foreach ($procurement as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->Year; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Item_Name; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Item_Model; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Offer_Price; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Tender_No; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Quote_Price; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Quote_Price - $row->Offer_Price; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $quote = $row->Quote_Price;
                                                $offer = $row->Offer_Price;
                                                $profit = $row->Quote_Price - $row->Offer_Price;
                                                $profit = $profit/$offer;
                                                echo $profit * 100;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "<h4 class='text-center text-danger'>Currently No Items Found</h4>";
                        } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>



<?php $this->load->view('portal/layout/footer'); ?>