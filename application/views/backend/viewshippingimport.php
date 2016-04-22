<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createshippingimport?id=".$license); ?>">Create</a>
    <h1 class="page-header text-overflow">Shipping Import Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("Shipping Import List");?>
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                            <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="license">License</th>
                                        <th data-field="billofentry">Bill Of Entry</th>
                                        <th data-field="date">Date</th>
                                        <th data-field="material">Material</th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="amount">Amount</th>
                                        <th data-field="status">Status</th>
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
                resultrow.status="Disabled";
            else if(resultrow.status==1)
                resultrow.status="Enabled";
            
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.license + "</td><td>" + resultrow.billofentry + "</td><td>" + resultrow.date + "</td><td>" + resultrow.material + "</td><td>" + resultrow.qty + "</td><td>" + resultrow.amount + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editshippingimport?id=');?>" + resultrow.license + "&shippingimportid="+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteshippingimport?id='); ?>" + resultrow.license + "&shippingimportid="+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>