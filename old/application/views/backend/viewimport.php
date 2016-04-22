<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createimport"); ?>">Create</a>
    <h1 class="page-header text-overflow">import Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("import List");?>
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                            <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="license">License</th>
                                        <th data-field="product">Product</th>
                                        <th data-field="norm">Norm</th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="rateperkgusd">Rate Per Kg USD</th>
                                        <th data-field="cifinusd">CIF In USD</th>
                                        <th data-field="cifinrs">CIF In RS</th>
                                        <th data-field="billofentryno">Bill Of Entry Number</th>
                                        <th data-field="date">Date</th>
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
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.license + "</td><td>" + resultrow.product + "</td><td>" + resultrow.norm + "</td><td>" + resultrow.qty + "</td><td>" + resultrow.rateperkgusd + "</td><td>" + resultrow.cifinusd + "</td><td>" + resultrow.cifinrs + "</td><td>" + resultrow.billofentryno + "</td><td>" + resultrow.date + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editimport?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteimport?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>