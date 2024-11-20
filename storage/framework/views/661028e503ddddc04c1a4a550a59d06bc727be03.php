<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('module/booking/css/checkout.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo-booking-page padding-content" >
        <div class="container">
            <div id="bravo-checkout-page" >
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="form-title"><?php echo e(__('Booking Submission')); ?></h3>
                         <div class="booking-form">
                             <?php echo $__env->make($service->checkout_form_file ?? 'Booking::frontend/booking/checkout-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                             <?php if(!empty($token = request()->input('token'))): ?>
                                 <input type="hidden" name="token" value="<?php echo e($token); ?>">
                             <?php endif; ?>
                         </div>
                    </div>
                    <div class="col-md-4">
                        <div class="booking-detail booking-form">
                            <?php echo $__env->make($service->checkout_booking_detail_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('module/booking/js/checkout.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.razorpay.com/widgets/affordability/affordability.js"></script>


    <script>
    
    
        
        $('document').ready(function(){
            
       $('#razorpay').click(function(){
            
           $('#exceptrazorpay').hide();
           
           $('#includerazorpay').show();
           
           
            
        });
        
        $('#stripe').click(function(){
            
            
            $('#exceptrazorpay').show();
           
           $('#includerazorpay').hide();
            
            
            
        });
        
     
            
        });
        
        
        $('#buttonRazorpay').click(function(){
            
        var email =$("#Xemail").val();
        var phone =$("#Xphone").val();
        var product_price = $("#moneyforPaid").attr('totalamount');
        
      var data = product_price.substr(1);
      
               var me = this;

                if(this.onSubmit) return false;

               

                this.onSubmit = true;
      
     
         
         var options = {
           "key": "rzp_test_9509c349bV8K0C",
            "amount": data*100,
            "currency": "INR",
           "name": "OOHAPP ONLINE PAYMENT",
           "description": "Payment transaction",
           "image": "https://oohapp.io/uploads/0000/1/2023/02/06/logo-wogo.png",
           "handler":function(response){
               
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

                   $.ajax({
                    url:bookingCore.routes.checkout,
                    data:$('.booking-form').find('input,textarea,select').serialize(),
                    method:"post",
                    success:function (res) {
                        if(!res.status && !res.url){
                            me.onSubmit = false;
                        }


                        if(res.elements){
                            for(var k in res.elements){
                                $(k).html(res.elements[k]);
                            }
                        }

                        if(res.message)
                        {
                            me.message.content = res.message;
                            me.message.type = res.status;
                        }

                        if(res.url){
                            window.location.href = res.url
                        }

                        if(res.errors && typeof res.errors == 'object')
                        {
                            var html = '';
                            for(var i in res.errors){
                                html += res.errors[i]+'<br>';
                            }
                            me.message.content = html;
                        }
                        if(typeof BravoReCaptcha != "undefined"){
                            BravoReCaptcha.reset('booking');
                        }

                    },
                    error:function (e) {
                        me.onSubmit = false;
                        if(e.responseJSON){
							me.message.content = e.responseJSON.message ? e.responseJSON.message : 'Can not booking';
							me.message.type = false;
                        }else{
                            if(e.responseText){
								me.message.content = e.responseText;
								me.message.type = false;
                            }
                        }
                        if(typeof BravoReCaptcha != "undefined"){
                            BravoReCaptcha.reset('booking');
                        }
                    }
                })
     }
      ,
      
     "theme": {
                "color": "#52e1f0"
            },
            
            "prefill": {
                "contact": phone,
                "email":  email,
            },

           
       };


       var rzp1 = new Razorpay(options);
         rzp1.open();

            
            
        });
        
           
        

        
        
        
        
    </script>
    
    
    <script type="text/javascript">
        jQuery(function () {
            $.ajax({
                'url': bookingCore.url + '<?php echo e($is_api ? '/api' : ''); ?>/booking/<?php echo e($booking->code); ?>/check-status',
                'cache': false,
                'type': 'GET',
                success: function (data) {
                    if (data.redirect !== undefined && data.redirect) {
                        window.location.href = data.redirect
                    }
                }
            });
        })

        $('.deposit_amount').on('change', function(){
            checkPaynow();
        });

        $('input[type=radio][name=how_to_pay]').on('change', function(){
            checkPaynow();
        });

        function checkPaynow(){
            var credit_input = $('.deposit_amount').val();
            var how_to_pay = $("input[name=how_to_pay]:checked").val();
            var convert_to_money = credit_input * <?php echo e(setting_item('wallet_credit_exchange_rate',1)); ?>;

            if(how_to_pay == 'full'){
                var pay_now_need_pay = parseFloat(<?php echo e(floatval($booking->total)); ?>) - convert_to_money;
            }else{
                var pay_now_need_pay = parseFloat(<?php echo e(floatval($booking->deposit == null ? $booking->total : $booking->deposit)); ?>) - convert_to_money;
            }

            if(pay_now_need_pay < 0){
                pay_now_need_pay = 0;
            }
            $('.convert_pay_now').html(bravo_format_money(pay_now_need_pay));
            $('.convert_deposit_amount').html(bravo_format_money(convert_to_money));
        }


        jQuery(function () {
            $(".bravo_apply_coupon").click(function () {
                var parent = $(this).closest('.section-coupon-form');
                parent.find(".group-form .fa-spin").removeClass("d-none");
                parent.find(".message").html('');
                $.ajax({
                    'url': bookingCore.url + '/booking/<?php echo e($booking->code); ?>/apply-coupon',
                    'data': parent.find('input,textarea,select').serialize(),
                    'cache': false,
                    'method':"post",
                    success: function (res) {
                        parent.find(".group-form .fa-spin").addClass("d-none");
                        if (res.reload !== undefined) {
                            window.location.reload();
                        }
                        if(res.message && res.status === 1)
                        {
                            parent.find('.message').html('<div class="alert alert-success">' + res.message+ '</div>');
                        }
                        if(res.message && res.status === 0)
                        {
                            parent.find('.message').html('<div class="alert alert-danger">' + res.message+ '</div>');
                        }
                    }
                });
            });
            $(".bravo_remove_coupon").click(function (e) {
                e.preventDefault();
                var parent = $(this).closest('.section-coupon-form');
                var parentItem = $(this).closest('.item');
                parentItem.find(".fa-spin").removeClass("d-none");
                $.ajax({
                    'url': bookingCore.url + '/booking/<?php echo e($booking->code); ?>/remove-coupon',
                    'data': {
                        coupon_code:$(this).attr('data-code')
                    },
                    'cache': false,
                    'method':"post",
                    success: function (res) {
                        parentItem.find(".fa-spin").addClass("d-none");
                        if (res.reload !== undefined) {
                            window.location.reload();
                        }
                        if(res.message && res.status === 0)
                        {
                            parent.find('.message').html('<div class="alert alert-danger">' + res.message+ '</div>');
                        }
                    }
                });
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\oohapp-laravel-io\themes/BC/Booking/Views/frontend/checkout.blade.php ENDPATH**/ ?>