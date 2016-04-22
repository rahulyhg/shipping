<div id="page-title">
    <a href="<?php echo site_url("site/viewimport"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
    <h1 class="page-header text-overflow">import Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
Create import </h3>
                </div>
                <div class="panel-body">
                    <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createimportsubmit");?>' enctype='multipart/form-data'>
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
                                <label class="col-sm-2 control-label" for="normal-field">Rate Per Kg USD</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="rateperkgusd" value='<?php echo set_value(' rateperkgusd ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Applied Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="appliedqty" value='<?php echo set_value(' appliedqty ');?>'>
                                </div>
                            </div><div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">CIF Without Norm USD</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="cifwithoutnormusd" value='<?php echo set_value(' cifwithoutnormusd ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">CIF Without Norm RS</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="cifwithoutnormrs" value='<?php echo set_value(' cifwithoutnormrs ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Norm</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="norm" value='<?php echo set_value(' norm ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Final Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="finalqty" value='<?php echo set_value(' finalqty ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">CIF In USD</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="cifinusd" value='<?php echo set_value(' cifinusd ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">CIF In RS</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="cifinrs" value='<?php echo set_value(' cifinrs ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Bill Of Entry Number</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="billofentryno" value='<?php echo set_value(' billofentryno ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Date</label>
                                <div class="col-sm-4">
                                    <input type="date" id="normal-field" class="form-control" name="date" value='<?php echo set_value(' date ');?>'>
                                </div>
                            </div>
                            <div class=" form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown("status",$status,set_value('status'),"class='chzn-select form-control'");?>
                                </div>
                            </div>
                            
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Import Balance Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="importbalanceqty" value='<?php echo set_value(' importbalanceqty ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Import Balance Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="importbalanceamount" value='<?php echo set_value(' importbalanceamount ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Difference Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="differenceqty" value='<?php echo set_value(' differenceqty ');?>'>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label class="col-sm-2 control-label" for="normal-field">Difference Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="differenceamount" value='<?php echo set_value(' differenceamount ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="<?php echo site_url("site/viewimport"); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                    </form>
                    </div>
            </section>
            </div>
        </div>
    </div>