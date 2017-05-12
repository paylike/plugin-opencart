<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-paylike" data-toggle="tooltip" title="<?php echo $button_save; ?>"
                        class="btn btn-primary"><i class="fa fa-save"></i>
                </button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>"
                   class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li>
                    <a href="<?php echo $breadcrumb['href']; ?>">
                        <?php echo $breadcrumb[ 'text']; ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle"></i>
            <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-paylike"
                      class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-payment_method_title"><span
                                    data-toggle="tooltip"
                                    title="<?php echo $help_paylike_payment_method_title; ?>"> <?php echo $payment_method_title; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_payment_method_title"
                                   value="<?php echo ($paylike_payment_method_title)?$paylike_payment_method_title:$default_payment_method_title; ?>"
                                   placeholder="<?php echo $payment_method_title; ?>" id="input-payment-method-title"
                                   class="form-control"/>
                            <?php if ($error_payment_method_title) { ?>
                            <div class="text-danger"><?php echo $error_payment_method_title; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-payment_method_description"><span
                                    data-toggle="tooltip"
                                    title="<?php echo $help_paylike_payment_method_description; ?>"> <?php echo $payment_method_description; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_payment_method_description"
                                   value="<?php echo ($paylike_payment_method_description)?$paylike_payment_method_description:$default_payment_method_description; ?>"
                                   placeholder="<?php echo $payment_method_description; ?>"
                                   id="input-payment-method-title" class="form-control"/>
                            <?php if ($error_payment_method_description) { ?>
                            <div class="text-danger"><?php echo $error_payment_method_description; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-title"><span data-toggle="tooltip"
                                                                                      title="<?php echo $help_paylike_title; ?>"> <?php echo $entry_title; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_title"
                                   value="<?php echo ($paylike_title)?$paylike_title:$default_entry_title; ?>"
                                   placeholder="<?php echo $entry_title; ?>" id="input-title" class="form-control"/>
                            <?php if ($error_title) { ?>
                            <div class="text-danger"><?php echo $error_title; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-description-status"><span data-toggle="tooltip"
                                                                                                   title="<?php echo $help_paylike_show_on_popup; ?>"> <?php echo $description_status; ?>
                        </label>
                        <div class="col-sm-10">
                            <select name="paylike_description_status" id="input-description-status"
                                    class="form-control">
                                <option value="1"
                                <?php echo ($paylike_description_status)?'selected="selected"':'';?>
                                ><?php echo $text_yes; ?></option>
                                <option value="0"
                                <?php echo (!$paylike_description_status)?'selected="selected"':'';?>
                                ><?php echo $text_no; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-description"><span data-toggle="tooltip"
                                                                                            title="<?php echo $help_paylike_description; ?>"> <?php echo $entry_description; ?></label>
                        <div class="col-sm-10">
                            <!-- <textarea name="paylike_description" rows="3" cols="5" style="resize: none;" id="input-description" class="form-control">
                                <?php echo ($paylike_description)?trim($paylike_description):trim($default_entry_description); ?>
                            </textarea> -->
                            <input type="text" name="paylike_description"
                                   value="<?php echo ($paylike_description)?$paylike_description:$default_entry_description; ?>"
                                   placeholder="<?php echo $paylike_description; ?>" id="input-description"
                                   class="form-control"/>
                            <?php /*if ($error_description) { ?>
                            <div class="text-danger"><?php echo $error_description; ?></div>
                            <?php }*/ ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-mode">
                            <span data-toggle="tooltip"
                                  title="<?php echo $entry_mode; ?>"><?php echo $entry_mode; ?></span>
                        </label>
                        <div class="col-sm-10">
                            <select name="paylike_mode" id="input-mode" class="form-control">
                                <option value="live"
                                <?php echo ($paylike_mode=='live')?'selected="selected"':'';?>
                                ><?php echo $text_live; ?></option>
                                <option value="test"
                                <?php echo ($paylike_mode=='test')?'selected="selected"':'';?>
                                ><?php echo $text_test; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-test-key"><span data-toggle="tooltip"
                                                                                         title="<?php echo $help_key; ?>"><?php echo $entry_test_key; ?></span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_test_key" value="<?php echo $paylike_test_key; ?>"
                                   placeholder="<?php echo $entry_test_key; ?>" id="input-test-key"
                                   class="form-control"/>
                            <?php if ($error_test_key) { ?>
                            <div class="text-danger">
                                <?php echo $error_test_key; ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-test-app-key"><span data-toggle="tooltip"
                                                                                             title="<?php echo $help_app_key; ?>"> <?php echo $entry_test_app_key; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_test_app_key" value="<?php echo $paylike_test_app_key; ?>"
                                   placeholder="<?php echo $entry_test_app_key; ?>" id="input-test-app-key"
                                   class="form-control"/>
                            <?php if ($error_test_app_key) { ?>
                            <div class="text-danger"><?php echo $error_test_app_key; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-live-key"><span data-toggle="tooltip"
                                                                                         title="<?php echo $help_key; ?>"><?php echo $entry_live_key; ?></span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_live_key" value="<?php echo $paylike_live_key; ?>"
                                   placeholder="<?php echo $entry_live_key; ?>" id="input-live-key"
                                   class="form-control"/>
                            <?php if ($error_live_key) { ?>
                            <div class="text-danger">
                                <?php echo $error_live_key; ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-live-app-key"><span data-toggle="tooltip"
                                                                                             title="<?php echo $help_app_key; ?>"> <?php echo $entry_live_app_key; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_live_app_key" value="<?php echo $paylike_live_app_key; ?>"
                                   placeholder="<?php echo $entry_live_app_key; ?>" id="input-live-app-key"
                                   class="form-control"/>
                            <?php if ($error_live_app_key) { ?>
                            <div class="text-danger"><?php echo $error_live_app_key; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                      title="<?php echo $help_total; ?>"><?php echo $entry_total; ?></span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_total"
                                   value="<?php echo ($paylike_total)?$paylike_total:1; ?>"
                                   placeholder="<?php echo $entry_total; ?>" id="input-total" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-order-status">
                            <?php echo $entry_order_status; ?>
                        </label>
                        <div class="col-sm-10">
                            <select name="paylike_order_status_id" id="input-order-status" class="form-control">
                                <?php foreach ($order_statuses as $order_status) { ?>
                                <?php if ($order_status[ 'order_status_id'] == $paylike_order_status_id) { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected">
                                    <?php echo $order_status[ 'name']; ?>
                                </option>
                                <?php } else { ?>
                                <option value="<?php echo $order_status['order_status_id']; ?>">
                                    <?php echo $order_status[ 'name']; ?>
                                </option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">
                            <span data-toggle="tooltip"
                                  title="<?php echo $help_capture; ?>"><?php echo $entry_capture; ?></span>
                        </label>
                        <div class="col-sm-10">
                            <select name="paylike_capture" id="input-capture" class="form-control">
                                <option value="2"
                                <?php echo ((!isset($paylike_capture)||$paylike_capture==null)||($paylike_capture=='2'))?'selected="selected"':'';?>
                                ><?php echo $text_capture_delayed; ?></option>
                                <option value="1"
                                <?php echo ($paylike_capture=='1')?'selected="selected"':'';?>
                                ><?php echo $text_capture_instant; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-geo-zone">
                            <?php echo $entry_geo_zone; ?>
                        </label>
                        <div class="col-sm-10">
                            <select name="paylike_geo_zone_id" id="input-geo-zone" class="form-control">
                                <option value="0">
                                    <?php echo $text_all_zones; ?>
                                </option>
                                <?php foreach ($geo_zones as $geo_zone) { ?>
                                <?php if ($geo_zone[ 'geo_zone_id'] == $paylike_geo_zone_id) { ?>
                                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected">
                                    <?php echo $geo_zone[ 'name']; ?>
                                </option>
                                <?php } else { ?>
                                <option value="<?php echo $geo_zone['geo_zone_id']; ?>">
                                    <?php echo $geo_zone[ 'name']; ?>
                                </option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">
                            <?php echo $entry_status; ?>
                        </label>
                        <div class="col-sm-10">
                            <select name="paylike_status" id="input-status" class="form-control">
                                <option value="1"
                                <?php echo ($paylike_status)?'selected="selected"':'';?>
                                ><?php echo $text_enabled; ?></option>
                                <option value="0"
                                <?php echo (!$paylike_status)?'selected="selected"':'';?>
                                ><?php echo $text_disabled; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-sort-order">
                            <?php echo $entry_sort_order; ?>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="paylike_sort_order" value="<?php echo $paylike_sort_order; ?>"
                                   placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order"
                                   class="form-control"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>
