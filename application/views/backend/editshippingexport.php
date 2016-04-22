<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Shipping Export Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editshippingexportsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$beforeshippingexport->id);?>" style="display:none;">
            <div class=" form-group" style="display:none;">
                <label class="col-sm-2 control-label" for="normal-field">License</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="license" value='<?php echo set_value(' license ',$beforeshippingexport->license);?>'>
                    <?php 
//echo form_dropdown("license",$license,set_value('license',$beforeshippingexport->license),"class='chzn-select form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Shipping Bill Number</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="shippingbillno" value='<?php echo set_value(' shippingbillno ',$beforeshippingexport->shippingbillno);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Date</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="date" value='<?php echo set_value(' date ',$beforeshippingexport->date);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Material</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="material" value='<?php echo set_value(' material ',$beforeshippingexport->material);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="qty" value='<?php echo set_value(' qty ',$beforeshippingexport->qty);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Manual FOB in USD</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value(' amount ',$beforeshippingexport->amount);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Manual FOB In RS</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="manualfobrs" value='<?php echo set_value(' manualfobrs ',$beforeshippingexport->manualfobrs);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Actual Realised eBRC in USD</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="actualrealisedebrcusd" value='<?php echo set_value(' actualrealisedebrcusd ',$beforeshippingexport->actualrealisedebrcusd);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("status",$status,set_value('status',$beforeshippingexport->status),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewshippingexport"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>