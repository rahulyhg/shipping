<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Company Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editcompanysubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Name</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ',$before->name);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Pan Card</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="pancard" value='<?php echo set_value(' pancard ',$before->pancard);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Address</label>
                <div class="col-sm-8">
                    <textarea name="address" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'address',$before->address);?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">IEC Code</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="ieccode" value='<?php echo set_value(' ieccode ',$before->ieccode);?>'>
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
                    <a href='<?php echo site_url("site/viewcompany"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>