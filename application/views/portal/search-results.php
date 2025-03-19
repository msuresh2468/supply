<?php $this->load->view('portal/layout/header'); ?>
<div class="portal_section">
    <?php $this->load->view('portal/layout/nav-menu'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('portal/layout/sidebar_menu'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <?php if (count($results) > 0) { ?>
                            <?php foreach ($results as $row) { ?>
                                <p><a href="<?php echo base_url('portal/view-po/' . $row['PO_Number']); ?>"><?php echo $row['Item_Name']; ?></a></p>
                            <?php } ?>
                        <?php } else {
                            echo "<h4 class='text-center text-danger'>No Search Results Found</h4>";
                        } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php $this->load->view('portal/layout/footer'); ?>