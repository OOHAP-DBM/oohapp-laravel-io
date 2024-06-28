@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bravo-login-form-page bravo-login-page">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @include('Layout::admin.message')
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email',request()->email) }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6 position-relative">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <span class="error-message" id="password-error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6 position-relative">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <span class="input-group-text password-toggle" data-target="#password-confirm">
                                        <i class="icofont-eye"></i>
                                    </span>
                                    <span class="error-message" id="password-confirm-error"></span>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            position: absolute;
            bottom: -20px;
            left: 0;
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.password-toggle').on('click', function() {
                var passwordField = $($(this).data('target'));
                var passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).find('i').removeClass('icofont-eye').addClass('icofont-eye-blocked');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).find('i').removeClass('icofont-eye-blocked').addClass('icofont-eye');
                }
            });

            $('#password').on('input', function() {
                var password = $(this).val();
                var errorMessage = '';

                if (password.length < 6) {
                    errorMessage = 'Password length must be at least 6 characters.';
                }

                $('#password-error').text(errorMessage);
            });

            $('#password').on('keypress', function(event) {
                if (event.which === 32) {
                    event.preventDefault();
                    $('#password-error').text('Space is not allowed in the password.');
                }
            });

            $('#password').on('keydown', function(event) {
                if (event.which !== 32) {
                    $('#password-error').text('');
                }
            });

            $('#password-confirm').on('input', function() {
                var confirmPassword = $(this).val();
                var password = $('#password').val();
                var errorMessage = '';

                if (password !== confirmPassword) {
                    errorMessage = 'Passwords do not match.';
                } else if (confirmPassword.length < 6) {
                    errorMessage = 'Password length must be at least 6 characters.';
                }

                $('#password-confirm-error').text(errorMessage);
            });

            $('#password-confirm').on('keypress', function(event) {
                if (event.which === 32) {
                    event.preventDefault();
                    $('#password-confirm-error').text('Space is not allowed in the password.');
                }
            });

            $('#password-confirm').on('keydown', function(event) {
                if (event.which !== 32) {
                    $('#password-confirm-error').text('');
                }
            });
        });
    </script>
@endsection
