<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="padding: 0px;">
    <div class="position-sticky pt-4">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" aria-current="page" href="<?php echo base_url() ?>portal/index">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'purchase' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/purchase-orders">
                    Purchase Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/supplied-items">
                    Supplied Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/not-supplied-items">
                    Not Supplied Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/installed-items">
                    Installed Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/not-installed-items">
                    Not Installed Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/installed-items-after-cutoff-date">
                    Installed Items After Cutoff Date
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/installed-items-before-cutoff-date">
                    Installed Items Before Cutoff Date
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-agreements">
                    PO Agreement Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-dds-list">
                    PO BG/DD Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-item-warranty">
                    Under Warranty Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/warranty-expired-items">
                    Warranty Expired Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'index' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-ldc-details">
                    LDC Amount Details
                </a>
            </li>
            <li class="nav-item <?php echo $pagename == 'index' ? 'active' : ' '; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>portal/payment-details">
                    Payment Details
                </a>
            </li>
            <li class="nav-item <?php echo $pagename == 'tender' ? 'active' : ' '; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>portal/tender-information">
                    Tender Details
                </a>
            </li>
        </ul>
    </div>
</nav>