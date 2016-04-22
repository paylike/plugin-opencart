<div class="buttons">
  <div class="pull-right">
    <input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="btn btn-primary" />
  </div>
</div>

<script type="text/javascript" src="//sdk.paylike.io/2.js"></script>
<script type="text/javascript"><!--
    
$('body').on('click', '#button-confirm', function() {
  var paylike = Paylike('<?php echo $paylike_public_key; ?>');
    paylike.popup({
        currency: '<?php echo $currency_code; ?>',
        amount: <?php echo $amount; ?>,
        fields: [
        // simple custom field
       
        // elaborate custom field
        {
            name: 'name',
            type: 'text',
            value: '<?php echo $name; ?>',
            required: true,
        },
    ],
    }, function( err, res ){
        if (err)
            return console.log(err);

        console.log(res.transaction.id);
        console.log(res);
        $.ajax({
          url: 'index.php?route=payment/paylike/update',
          type: 'post',
          data: {'trans_ref':res.transaction.id},
          dataType: 'json',
          cache: false,
          beforeSend: function() {
            $('#button-confirm').button('loading');
          },
          complete: function() {
            $('#button-confirm').button('reset');
          },
          success: function(json) {
            if (json['error']) {
              alert(json['error']);
            }

            if (json['redirect']) {
              //location = json['redirect'];
            }
          }
        });

        //alert('Thank you!');
    });

});
//--></script>