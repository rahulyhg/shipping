<section class="panel">
    <div class="panel-body">
        <ul class="nav nav-stacked">
            <li><a href="<?php echo site_url('site/editlicense?id=').$before->id; ?>">License Details</a></li>
            <li><a href="<?php echo site_url('site/viewexport?id=').$before->id; ?>">Export</a></li>
            <li><a href="<?php echo site_url('site/viewimport?id=').$before->id; ?>">Import</a></li>
            <li><a href="<?php echo site_url('site/viewshippingimport?id=').$before->id; ?>">Shipping Import</a></li>
            <li><a href="<?php echo site_url('site/viewshippingexport?id=').$before->id; ?>">Shipping Export</a></li>
        </ul>
    </div>
</section>