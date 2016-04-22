<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">license Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editlicensesubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">License Number</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="number" value='<?php echo set_value(' number ',$before->number);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Company</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown("company",$company,set_value('company',$before->company),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Issue Date</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="issuedate" value='<?php echo set_value(' issuedate ',$before->issuedate);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Expiry Date</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="expirydate" value='<?php echo set_value(' expirydate ',$before->expirydate);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Extention</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="extention" value='<?php echo set_value(' extention ',$before->extention);?>'>
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
                    <a href='<?php echo site_url("site/viewlicense"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>