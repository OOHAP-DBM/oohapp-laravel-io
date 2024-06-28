<style>
        .ss {
            font-size: 16px !important;
            top: -29px;
            left: 12px;
            position: relative;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
        .form-group {
            position: relative;
        }
    </style>
<form class="bravo-form-login" method="POST" action="{{ route('login') }}">
    <input type="hidden" name="redirect" value="{{request()->query('redirect')}}">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control" name="email" style="padding: 0.375rem 1.75rem;" autocomplete="off" placeholder="&nbsp;&nbsp;&nbsp;{{__('Email address')}}">
        <i class="input-icon ss icofont-mail"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>
    <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" style="padding: 0.375rem 1.75rem;" autocomplete="off" placeholder="&nbsp;&nbsp;&nbsp;{{__('Password')}}">
            <i class="input-icon ss icofont-ui-password"></i>
            <span class="input-group-text password-toggle" id="password-toggle">
                                        <i class="icofont-eye"></i>
                                    </span>
            
        </div>      
        <span class="invalid-feedback error error-password"></span>
            <span class="error-message" id="password-error"></span>  
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="remember-me" class="mb0">
                <input type="checkbox" name="remember" id="remember-me" value="1"> {{__('Remember me')}} <span class="checkmark fcheckbox"></span>
            </label>
            <a href="{{ route("password.request") }}">{{__('Forgot Password?')}}</a>
        </div>
    </div>
    @if(setting_item("user_enable_login_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'login')}}
        </div>
    @endif
    <div class="error message-error invalid-feedback"></div>
    <div class="form-group">
        <button class="btn btn-primary form-submit" type="submit">
            {{ __('Login') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="advanced">
            <p class="text-center f14 c-grey">{{__('or continue with')}}</p>
            <div class="row">
                @if(setting_item('facebook_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('/social-login/facebook')}}"class="btn btn_login_fb_link" data-channel="facebook">
                            <i class="input-icon fa fa-facebook"></i>
                            {{__('Facebook')}}
                        </a>
                    </div>
                @endif
                @if(setting_item('google_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/google')}}" class="btn btn_login_gg_link" data-channel="google">
                            <i class="input-icon fa fa-google"></i>
                            {{__('Google')}}
                        </a>
                    </div>
                @endif
                @if(setting_item('twitter_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/twitter')}}" class="btn btn_login_tw_link" data-channel="twitter">
                            <i class="input-icon fa fa-twitter"></i>
                            {{__('Twitter')}}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
    @if(is_enable_registration())
        <div class="c-grey font-medium f14 text-center"> {{__('Do not have an account?')}} <a href="" data-target="#register" data-toggle="modal">{{__('Sign Up')}}</a></div>
    @endif
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.password-toggle').on('click', function() {
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

        $('input[name="password"]').on('input', function() {
            var password = $(this).val();
            var errorMessage = '';

            if (password.length < 6) {
                errorMessage = 'Password length must be at least 6 characters.';
            }

            $('#password-error').text(errorMessage);
        });

        $('input[name="password"]').on('keypress', function(event) {
            if (event.which === 32) {
                event.preventDefault();
                $('#password-error').text('Space is not allowed in the password.');
            }
        });
        $('input[name="password"]').on('keydown', function(event) {
            if (event.which !== 32) {
                $('#password-error').text('');
            }
        });
        $('input[name="phone"]').on('input', function() {
            var sanitized = $(this).val().replace(/[^+0-9]/g, '');
            if (sanitized !== $(this).val()) {
                $(this).val(sanitized);
            }
            if ($(this).val().length > 15) {
                $(this).val($(this).val().slice(0, 15));
            }
        });

        $('form').on('submit', function() {
            var phoneValue = $('input[name="phone"]').val();
            if (phoneValue !== '' && !/^[\+0-9]+$/.test(phoneValue)) {
                $('.error-phone').text('Phone number can only contain + and digits.');
                return false;
            }
        });
    });
</script>
