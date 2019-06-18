<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}" />
<!--===============================================================================================-->  
    <link href="bower_components/moneylover-bower/login/images/icons/favicon.ico" rel="icon" type="image/png" />
<!--===============================================================================================-->
    <link href="bower_components/moneylover-bower/login/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
    <link href="bower_components/moneylover-bower/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
    <link href="bower_components/moneylover-bower/login/vendor/animate/animate.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->  
    <link href="bower_components/moneylover-bower/login/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
    <link href="bower_components/moneylover-bower/login/vendor/select2/select2.min.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
    <link href="bower_components/moneylover-bower/login/css/util.css" rel="stylesheet" type="text/css" />
    <link href="bower_components/moneylover-bower/login/css/main.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="bower_components/moneylover-bower/login/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        {{ __('Login') }}
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->  
    <script src="bower_components/moneylover-bower/login/vendor/jquery/jquery-3.2.1.min.js"/></script>
    <!--===============================================================================================-->
    <script src="bower_components/moneylover-bower/login/vendor/bootstrap/js/popper.js"/></script>
    <script src="bower_components/moneylover-bower/login/vendor/bootstrap/js/bootstrap.min.js"/></script>
    <!--===============================================================================================-->
        <script src="bower_components/moneylover-bower/login/vendor/select2/select2.min.js"/></script>
    <!--===============================================================================================-->
    <script src="bower_components/moneylover-bower/login/vendor/tilt/tilt.jquery.min.js"/></script>

    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="bower_components/moneylover-bower/login/js/main.js"/></script>

</body>
</html>
