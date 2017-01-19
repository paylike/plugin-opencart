<?php
// Heading
$_['heading_title']         = 'Paylike';

// Text
$_['text_payment']          = 'Payment';
$_['text_success']          = 'Success: You have modified paylike account details!';
$_['text_edit']             = 'Edit Paylike';
$_['text_paylike'] 			= '<a onclick="window.open(\'https://paylike.io/\');"><img src="view/image/payment/paylike.png" alt="Paylike" title="Paylike" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_test'] 			= 'Test';
$_['text_live'] 			= 'Live';
$_['text_capture_instant'] 			= 'Instant';
$_['text_capture_delayed'] 			= 'Delayed (e.g. on product shipping/delivery)';

// Entry
// Ocean
$_['payment_method_title']  = 'Payment Method Title';
$_['payment_method_description']  = 'Payment Method Description';
$_['entry_title']           = 'Popup Title';
$_['description_status']    = 'Show Popup Description';
$_['entry_description']     = 'Popup Description';
$_['entry_mode']     		= 'Transaction Mode';
$_['entry_test_key']        = 'Testmode Public Key';
$_['entry_test_app_key']    = 'Testmode App Key';
$_['entry_live_key']        = 'Livemode Public Key';
$_['entry_live_app_key']    = 'Livemode App Key';
$_['entry_total']           = 'Total';
$_['entry_order_status']    = 'Order Status';
$_['entry_capture']         = 'Capture';
$_['entry_status']          = 'Status';
$_['entry_sort_order']      = 'Sort Order';
$_['entry_geo_zone']        = 'Geo Zone';

//Default
$_['default_entry_title']			= 'Credit card (Paylike)';
$_['default_payment_method_description'] = 'Secure payment with credit card via &copy; Paylike';
$_['default_entry_description']		= 'Secure payment with credit card via &copy; Paylike';


// Help
$_['help_paylike_payment_method_title'] = 'Payment Method Title.';
$_['help_paylike_payment_method_description'] = 'Payment Method Description.';
$_['help_paylike_title']        = 'This controls the title which the user sees during checkout.';
$_['help_paylike_show_on_popup']= 'If this is set to no the product list will be shown';
$_['help_paylike_description']  = 'Text description that shows up on the payment popup.';
$_['help_mode']        			= 'This controls the title which the user sees during checkout.';
//$_['help_key']              	= 'Public key will be used in front end transaction SDK';
$_['help_key']              	= 'Public key will be used in the front-end to create transactions';
//$_['help_app_key']          	= 'App key is private key that will be used in capture, refund, void API';
$_['help_app_key']          	= 'App key is the private key that will be used in the backend to e.g. capture, refund and void';
$_['help_total']            	= 'The checkout total the order must reach before this payment method becomes active.';
$_['help_capture']    			= 'Whether or not to immediately capture the transaction.';

// Error
$_['error_permission']      = 'Warning: You do not have permission to modify payment Paylike!';
$_['error_payment_method_title'] = 'Payment Method Title Required!';
$_['error_payment_method_description'] = 'Payment Method Description Required!';
$_['error_title']           = 'Title Required!';
$_['error_description']     = 'Description Required!';
$_['error_test_key']             = 'Testmode Public key Required!';
$_['error_test_app_key']         = 'Testmode App key Required!';
$_['error_live_key']             = 'Livemode Public key Required!';
$_['error_live_app_key']         = 'Livemode App key Required!';
$_['error_order_already_captured']         = 'Order already captured!';
$_['refund_before_capture_error']         = 'You need to Captured Order prior to Refund.';
$_['void_after_capture_error']	= 'You can\'t Void transaction now. It\'s already Captured, try to Refund.';

// Success
$_['order_captured_success']	= 'Order successfully captured!';
$_['order_refunded_success']	= 'Successfully refunded of amount %s!';
$_['order_voided_success']		= 'Order successfully Voided!';