<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createlicense"); ?>">Create</a>
    <h1 class="page-header text-overflow">License Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("License List");?>
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                            <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="number">License Number</th>
                                        <th data-field="companyname">Company</th>
                                        <th data-field="issuedate">Issue Date</th>
                                        <th data-field="expirydate">Expiry Date</th>
                                        <th data-field="extention">Extention</th>
                                        <th data-field="status">Status</th>
                                        <th data-field="importexpirydate">Import Expiry Date</th>
                                        <th data-field="usdrate">USD Rate</th>
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
            
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.number + "</td><td>" + resultrow.companyname + "</td><td>" + resultrow.issuedate + "</td><td>" + resultrow.expirydate + "</td><td>" + resultrow.extention + "</td><td>" + resultrow.status + "</td><td>" + resultrow.importexpirydate + "</td><td>" + resultrow.usdrate + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editlicense?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletelicense?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>