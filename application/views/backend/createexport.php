<div id="page-title">
    <a href="<?php echo site_url("site/viewexport"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
    <h1 class="page-header text-overflow">Export Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
Create export </h3>
                </div>
                <div class="panel-body">
                    <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createexportsubmit");?>' enctype='multipart/form-data'>
                        <div class="panel-body">
                            <div class=" form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">License</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="license" value='<?php echo set_value(' license ',$license);?>'>
                                    <?php 
//echo form_dropdown("license",$license,set_value('license'),"class='chzn-select form-control'");
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Product</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="product" value='<?php echo set_value(' product ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="qty" value='<?php echo set_value(' qty ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Rate Per Kg USD</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="rateperkgusd" value='<?php echo set_value(' rateperkgusd ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">FOB In USD</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="fobinusd" value='<?php echo set_value(' fobinusd ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">FOB In RS</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="fobinrs" value='<?php echo set_value(' fobinrs ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Export Balance Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="exportbalanceqty" value='<?php echo set_value(' exportbalanceqty ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Export Balance USD</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="exportbalanceusd" value='<?php echo set_value(' exportbalanceusd ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Export Expiry Date</label>
                                <div class="col-sm-4">
                                    <input type="date" id="normal-field" class="form-control" name="exportexpirydate" value='<?php echo set_value(' exportexpirydate ');?>'>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown("status",$status,set_value('status'),"class='chzn-select form-control'");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="<?php echo site_url("site/viewexport"); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                    </form>
                    </div>
            </section>
            </div>
        </div>
    </div>