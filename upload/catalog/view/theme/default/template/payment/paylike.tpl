<div class="buttons">
  <div class="pull-right">
    <input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="btn btn-primary" />
  </div>
</div>

<script type="text/javascript" src="https://sdk.paylike.io/6.js"></script>
<script type="text/javascript"><!--
    
$('body').on('click', '#button-confirm', function() {
    var paylike = Paylike('<?php echo $paylike_public_key; ?>');
    paylike.popup({
        title: "<?php echo $popup_title; ?>",
        description: "<?php echo $popup_description; ?>",
        currency: '<?php echo $currency_code; ?>',
        amount: <?php echo $amount; ?>,
        custom: {
            orderId: '<?php echo $order_id; ?>',
            products:  <?php echo $products; ?>,
            customer:{
                name: "<?php echo $name; ?>",
                email: '<?php echo $email; ?>',
                telephone: '<?php echo $telephone; ?>',
                address: "<?php echo $address; ?>",
                customerIp: '<?php echo $ip; ?>'
           },
            platform:{
                name: 'opencart',
                version: '<?php echo VERSION; ?>',
            },
            ecommerce: {
                name: 'opencart',
                version: '<?php echo VERSION; ?>',
        },
        version: '1.0.3'
    },
    locale: '<?php echo $lc;  ?>'

}, function(err, res) {
        if (err)
            return console.log(err);

        console.log(res);
        console.log('++++++++++++++++++++++++++++');

        $.ajax({
            url: 'index.php?route=payment/paylike/process_payment',
            type: 'post',
            data: {
                'trans_ref': res.transaction.id
            },
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('#button-confirm').button('loading');
            },
            complete: function() {
                $('#button-confirm').button('reset');
            },
            success: function(json) {
                console.log(json);
                location.href = json.redirect;
            }
        });
    });

});
//--></script>
