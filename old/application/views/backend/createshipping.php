<div id="page-title">
    <a href="<?php echo site_url("site/viewshipping"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
    <h1 class="page-header text-overflow">shipping Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
Create shipping </h3>
                </div>
                <div class="panel-body">
                    <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createshippingsubmit");?>' enctype='multipart/form-data'>
                        <div class="panel-body">
                            <div class=" form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Liscense</label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown("liscense",$liscense,set_value('liscense'),"class='chzn-select form-control'");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Shipping Bill Number</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="shippingbillno" value='<?php echo set_value(' shippingbillno ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Date</label>
                                <div class="col-sm-4">
                                    <input type="date" id="normal-field" class="form-control" name="date" value='<?php echo set_value(' date ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Material</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="material" value='<?php echo set_value(' material ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Quantity</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="qty" value='<?php echo set_value(' qty ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value(' amount ');?>'>
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
                                    <a href="<?php echo site_url("site/viewshipping"); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                    </form>
                    </div>
            </section>
            </div>
        </div>
    </div>