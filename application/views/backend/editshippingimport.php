<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Shipping Import Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editshippingimportsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$beforeshippingimport->id);?>" style="display:none;">
            <div class=" form-group" style="display:none;">
                <label class="col-sm-2 control-label" for="normal-field">License</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="license" value='<?php echo set_value(' license ',$beforeshippingimport->license);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Bill Of Entry</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="billofentry" value='<?php echo set_value(' billofentry ',$beforeshippingimport->billofentry);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Date</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="date" value='<?php echo set_value(' date ',$beforeshippingimport->date);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Material</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("material",$material,set_value('material',$beforeshippingimport->material),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="qty" value='<?php echo set_value(' qty ',$beforeshippingimport->qty);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Amount</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value(' amount ',$beforeshippingimport->amount);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("status",$status,set_value('status',$beforeshippingimport->status),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewshippingimport?id=".$license); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>