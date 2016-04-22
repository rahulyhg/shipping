<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">shipping Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editshippingsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Liscense</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("liscense",$liscense,set_value('liscense',$before->liscense),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Shipping Bill Number</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="shippingbillno" value='<?php echo set_value(' shippingbillno ',$before->shippingbillno);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Date</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="date" value='<?php echo set_value(' date ',$before->date);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Material</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="material" value='<?php echo set_value(' material ',$before->material);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="qty" value='<?php echo set_value(' qty ',$before->qty);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Amount</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value(' amount ',$before->amount);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("status",$status,set_value('status',$before->status),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewshipping"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>