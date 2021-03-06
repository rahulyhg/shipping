<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createexport?id=".$license); ?>">Create</a>
    <h1 class="page-header text-overflow">export Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("Export List");?>
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                            <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="licensenumber">License</th>
                                        <th data-field="product">Product</th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="rateperkgusd">Rate Per Kg USD</th>
                                        <th data-field="fobinusd">FOB In USD</th>
                                        <th data-field="fobinrs">FOB In RS</th>
                                        <th data-field="status">Status</th>
                                        <th data-field="exportbalanceqty">Export Balance Quantity</th>
                                        <th data-field="exportbalanceusd">Export Balance USD</th>
                                        <th data-field="exportexpirydate">Export Expiry Date</th>
                                        <th data-field="Action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="fixed-table-pagination" style="display: block;">
                            <div class="pull-left pagination-detail">
                                <?php $this->chintantable->createpagination();?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        function drawtable(resultrow) {
            if(resultrow.status==0)
                resultrow.status="Closed";
            else if(resultrow.status==1)
                resultrow.status="Open";
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.licensenumber + "</td><td>" + resultrow.product + "</td><td>" + resultrow.qty + "</td><td>" + resultrow.rateperkgusd + "</td><td>" + resultrow.fobinusd + "</td><td>" + resultrow.fobinrs + "</td><td>" + resultrow.status + "</td><td>" + resultrow.exportbalanceqty + "</td><td>" + resultrow.exportbalanceusd + "</td><td>" + resultrow.exportexpirydate + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editexport?id=');?>" + resultrow.license + "&exportid="+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteexport?id='); ?>" + resultrow.license + "&exportid="+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>