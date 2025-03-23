<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse d-print-none shadow-lg px-lg-0">
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
                <a class="nav-link <?php echo $pagename == 'supplied' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/supplied-items">
                    Supplied Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'notsupplied' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/not-supplied-items">
                    Not Supplied Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'installed' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/installed-items">
                    Installed Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'notinstalled' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/not-installed-items">
                    Not Installed Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'installafter' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/installed-items-after-cutoff-date">
                    Installed Items After Cutoff Date
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'installbefore' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/installed-items-before-cutoff-date">
                    Installed Items Before Cutoff Date
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'agreements' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-agreements">
                    PO Agreement Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'dd' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-dds-list">
                    PO BG/DD Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'underwarranty' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-item-warranty">
                    Under Warranty Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'completedwarranty' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/warranty-expired-items">
                    Warranty Expired Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $pagename == 'ldc' ? 'active' : ' '; ?>" href="<?php echo base_url() ?>portal/po-ldc-details">
                    LD Amount Details
                </a>
            </li>
            <li class="nav-item <?php echo $pagename == 'payment' ? 'active' : ' '; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>portal/payment-details">
                    Payment Details
                </a>
            </li>
            <li class="nav-item <?php echo $pagename == 'tender' ? 'active' : ' '; ?>">
                <a class="nav-link" href="<?php echo base_url() ?>portal/procurement-details">
                    Procurement Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black" href="<?php echo base_url() ?>logout">Logout <i class="fa fa-sign-out"></i></a>
            </li>

        </ul>
    </div>
</nav>