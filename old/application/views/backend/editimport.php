<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">import Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editimportsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">License</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("license",$license,set_value('license',$before->license),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Product</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="product" value='<?php echo set_value(' product ',$before->product);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Norm</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="norm" value='<?php echo set_value(' norm ',$before->norm);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="qty" value='<?php echo set_value(' qty ',$before->qty);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Rate Per Kg USD</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="rateperkgusd" value='<?php echo set_value(' rateperkgusd ',$before->rateperkgusd);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">CIF In USD</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="cifinusd" value='<?php echo set_value(' cifinusd ',$before->cifinusd);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">CIF In RS</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="cifinrs" value='<?php echo set_value(' cifinrs ',$before->cifinrs);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Bill Of Entry Number</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="billofentryno" value='<?php echo set_value(' billofentryno ',$before->billofentryno);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Date</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="date" value='<?php echo set_value(' date ',$before->date);?>'>
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
                    <a href='<?php echo site_url("site/viewimport"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>