<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Forgot Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Notiflix -->
        <link href="{{asset('assets\libs\notiflix\notiflix-2.1.2.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ URL::asset('sheltos/assets/images/logo/10.png')}}" alt="" class="img-fluid">
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address to reset your password.</p>
                                </div>

                                @if(session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                <form method="POST" action="{{ route('forget.password.get') }}" id="forgotPasswordForm" data-parsley-validate>
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email">Email address</label>
                                        <input class="form-control" type="email" name="email" id="email" required placeholder="Enter your email" data-parsley-required-message="Please enter email" data-parsley-type="email" autocomplete="off">
                                    </div>

                                    <div class="form-group text-center">
                                        <button class="btn btn-primary rounded" type="submit"> Send Reset Link </button>
                                    </div>
                                </form>
                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p><a href="{{ route('login') }}" class="text-50 ml-1">Back to Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
        <script src="{{ URL::asset('assets\libs\notiflix\notiflix-2.1.2.js')}}"></script>

        <script>
            @if(session('error'))
                Notiflix.Notify.Failure('{{ session('error') }}');
            @endif
            $('#forgotPasswordForm').parsley();
        </script>
    </body>
</html>
