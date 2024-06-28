<style>
    .ss {
        font-size: 16px;
        top: -29px;
        left: 12px;
        position: relative;
    }
    .error-message {
        color: red;
        font-size: 12px;
    }
    .form-group {
        position: relative; 
    }
    .toggle-password {
        position: absolute;
        top: 50%; 
        right: 10px; 
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>


<form class="form bravo-form-register" method="post" action="<?php echo e(route('auth.register.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" autocomplete="off" style="padding: 0.375rem 1.75rem;" placeholder="&nbsp;&nbsp;&nbsp;<?php echo e(__("First Name")); ?>" maxlength="15">
                <i class="input-icon field-icon ss icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-first_name"></span>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" autocomplete="off" style="padding: 0.375rem 1.75rem;" placeholder="&nbsp;&nbsp;&nbsp;<?php echo e(__("Last Name")); ?>" maxlength="15">
                <i class="input-icon field-icon ss icofont-waiter-alt"></i>
                <span class="invalid-feedback error error-last_name"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="phone" autocomplete="off" style="padding: 0.375rem 1.75rem;" placeholder="&nbsp;&nbsp;&nbsp;<?php echo e(__('Phone')); ?>" maxlength="15">
    <i class="input-icon field-icon ss icofont-ui-touch-phone"></i>
    <span class="invalid-feedback error error-phone"></span>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" autocomplete="off" style="padding: 0.375rem 1.75rem;" placeholder="&nbsp;&nbsp;&nbsp;<?php echo e(__('Email address')); ?>">
        <i class="input-icon field-icon ss icofont-mail"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>
   
     <div class="form-group">
        <input type="password" class="form-control" name="password" autocomplete="off" style="padding: 0.375rem 1.75rem;" placeholder="&nbsp;&nbsp;&nbsp;<?php echo e(__('Password')); ?>">
        <i class="input-icon field-icon ss icofont-ui-password"></i>
        <span class="input-group-text toggle-password" id="toggle-password">
                                        <i class="icofont-eye"></i>
                                    </span>
        <span class="invalid-feedback error error-password"></span>
        <span class="error-message" id="password-error"></span>
    </div>
    <!-- <div class="form-group">
        <label for="term">
            <input id="term" type="checkbox" name="term" class="mr5">
            <?php echo __("I have read and accept the <a href=':link' target='_blank'>Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('booking_term_conditions'))]); ?>

            <span class="checkmark fcheckbox"></span>
        </label>
        <div><span class="invalid-feedback error error-term"></span></div>
    </div> -->

    <div class="form-group">
        <label for="term">
            <input id="term" type="checkbox" name="term" class="mr5">
            I have read and accept the <a href="/page/terms-and-condition" target="_blank">Terms and Privacy Policy</a>
            <span class="checkmark fcheckbox"></span>
        </label>
        <div><span class="invalid-feedback error error-term"></span></div>
    </div>
    <?php if(setting_item("user_enable_register_recaptcha")): ?>
        <div class="form-group">
            <?php echo e(recaptcha_field($captcha_action ?? 'register')); ?>

        </div>
        <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
    <?php endif; ?>
    <div class="error message-error invalid-feedback"></div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-submit">
            <?php echo e(__('Sign Up')); ?>

            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    <?php if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable')): ?>
        <div class="advanced">
            <p class="text-center f14 c-grey"><?php echo e(__("or continue with")); ?></p>
            <div class="row">
                <?php if(setting_item('facebook_enable')): ?>
                    <div class="col-xs-12 col-sm-4">
                        <a href="<?php echo e(url('/social-login/facebook')); ?>" class="btn btn_login_fb_link"
                           data-channel="facebook">
                            <i class="input-icon fa fa-facebook"></i>
                            <?php echo e(__('Facebook')); ?>

                        </a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('google_enable')): ?>
                    <div class="col-xs-12 col-sm-4">
                        <a href="<?php echo e(url('social-login/google')); ?>" class="btn btn_login_gg_link" data-channel="google">
                            <i class="input-icon fa fa-google"></i>
                            <?php echo e(__('Google')); ?>

                        </a>
                    </div>
                <?php endif; ?>
                <?php if(setting_item('twitter_enable')): ?>
                    <div class="col-xs-12 col-sm-4">
                        <a href="<?php echo e(url('social-login/twitter')); ?>" class="btn btn_login_tw_link" data-channel="twitter">
                            <i class="input-icon fa fa-twitter"></i>
                            <?php echo e(__('Twitter')); ?>

                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="c-grey f14 text-center">
       <?php echo e(__(" Already have an account?")); ?>

        <a href="#" data-target="#login" data-toggle="modal"><?php echo e(__("Log In")); ?></a>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('input[name="phone"]').on('input', function () {
            var sanitized = $(this).val().replace(/[^+0-9]/g, '');
            if (sanitized !== $(this).val()) {
                $(this).val(sanitized);
            }
            if ($(this).val().length > 15) {
                $(this).val($(this).val().slice(0, 15));
            }
        });

        $('form').on('submit', function () {
            var phoneValue = $('input[name="phone"]').val();
            if (phoneValue !== '' && !/^[\+0-9]+$/.test(phoneValue)) {
                $('.error-phone').text('Phone number can only contain + and digits.');
                return false;
            }
        });

        $('input[name="password"]').on('input', function () {
            var password = $(this).val();
            var errorMessage = '';

            if (password.length < 6) {
                errorMessage = 'Password length must be at least 6 characters.';
            }

            $('#password-error').text(errorMessage);
        });

        $('input[name="password"]').on('keypress', function (event) {
            if (event.which === 32) {
                event.preventDefault();
                $('#password-error').text('Space is not allowed in the password.');
            }
        });

        $('input[name="password"]').on('keydown', function (event) {
            if (event.which !== 32) {
                $('#password-error').text('');
            }
        });

        $('#toggle-password').on('click', function() {
            console.log("click on toggle");
            var passwordField = $('input[name="password"]');
            var passwordFieldType = passwordField.attr('type');
            
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).find('i').removeClass('icofont-eye').addClass('icofont-eye-blocked');
            } else {
                passwordField.attr('type', 'password');
                $(this).find('i').removeClass('icofont-eye-blocked').addClass('icofont-eye');
            }
        });
    });
</script>

<?php /**PATH C:\Users\DBM PC\Documents\GitHub\oohapp-laravel-io\modules/Layout/auth/register-form.blade.php ENDPATH**/ ?>