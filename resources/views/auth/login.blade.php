<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Notiflix -->
        <link href="{{asset('assets\libs\notiflix\notiflix-2.1.2.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Back Button -->
    <div class="text-left m-3">
        <a href="{{ route('home') }}" class="btn btn-outline-blue btn-sm ml-2">
            <i class="mdi mdi-arrow-left"></i>
        </a>
    </div>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ URL::asset('sheltos/assets/images/logo/10.png')}}" alt="" class="img-fluid">
                                        {{-- <img src="{{ URL::asset('sheltos/assets/images/logo/13.png')}}" alt="" height="100" width="100" class=""> --}}
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>
                                    @if(session('error'))
                                    <p style="color: red;">{{ session('error') }}</p>
                                    @endif

                                <form method="POST" action="{{ route('login.post') }}" id="loginForm" data-parsley-validate>

                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name='email' id="emailaddress" required="" placeholder="Enter your email" data-parsley-required-message="Please enter email" data-parsley-type="email" autocomplete="off">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control"  data-parsley-required-message="Please enter password"
                                            data-parsley-errors-container="#passwordError" required="">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i id="pwd-icon" class="far fa-eye-slash" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="passwordError"></div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="row mt-3 justify-content-center">
                                        <div class="col-md-auto">
                                            <button class="btn btn-primary rounded " type="submit"> Log In </button>
                                        </div>
                                        <div class="col-md-auto">
                                            <a href="{{ route('register') }}" class="btn btn-outline-primary rounded ">Register</a>
                                        </div>

                                    </div>

                                </form>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p> <a href="{{ route('forget.password.get') }}" class="text-50 ml-1">Forgot your password?</a></p>
                                    </div> <!-- end col -->
                                </div>
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Parsley JS -->
        <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

        <!-- Notiflix -->
        <script src="{{ URL::asset('assets\libs\notiflix\notiflix-2.1.2.js')}}"></script>

         <script>
            @if(session('error'))
            Notiflix.Notify.Failure('{{ session('error') }}');
            @endif
            $('#loginForm').parsley();

            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);

                // First, check if the form is valid according to Parsley
                if (form.parsley().isValid()) {

                    // Perform AJAX login request
                    $.ajax({
                        url: form.attr('action'),  // The login route in the form action
                        method: 'POST',
                        data: form.serialize(),  // Serialize the form data
                        success: function(response) {
                            if (response.success) {
                                // If login is successful, redirect to the 'master' page
                                window.location.href = response.redirect;
                                Notiflix.Notify.Success('Form is valid. Logging in...');
                            }
                        },
                        error: function(xhr) {
                            var errorMessage = 'Login failed. Please try again.';

                            // Check for error response from the backend
                            if (xhr.status === 401) {
                                errorMessage = 'Invalid email or password.';
                            } else if (xhr.status === 403) {
                                errorMessage = xhr.responseJSON.message || 'You do not have permission to access this page.';
                            }

                            // Display the failure notification with the appropriate error message
                            Notiflix.Notify.Failure(errorMessage);
                        }
                    });
                } else {
                    // If the form is invalid (based on Parsley), show a failure notification
                    Notiflix.Notify.Failure('Please fix the errors in the form.');
                }
            });

            $(document).ready(function(){
                $("#pwd-icon").click(function(){
                    var passwordField = $("#password");
                    var fieldType = passwordField.attr("type");

                    if (fieldType === "password") {
                        passwordField.attr("type", "text");
                        $(this).removeClass("fa-eye-slash").addClass("fa-eye");
                    } else {
                        passwordField.attr("type", "password");
                        $(this).removeClass("fa-eye").addClass("fa-eye-slash");
                    }
                });
            });

        </script>
    </body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <!-- Parsley CSS -->
        <link href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.css" rel="stylesheet">

        <!-- Notiflix CSS -->
        <link href="https://cdn.jsdelivr.net/npm/notiflix@3.0.2/dist/notiflix-3.0.2.min.css" rel="stylesheet">
    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>

                                @if(session('error'))
                                    <p style="color: red;">{{ session('error') }}</p>
                                @endif

                                <form method="POST" action="{{ route('login.post') }}" id="loginForm" data-parsley-validate>

                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name='email' id="emailaddress" required="" placeholder="Enter your email" data-parsley-type="email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name='password' required="" id="password" placeholder="Enter your password" data-parsley-minlength="6">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-white-50 ml-1">Forgot your password?</a></p>
                                <p class="text-white-50">Don't have an account? <a href="pages-register.html" class="text-white ml-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- Parsley JS -->
        <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

        <!-- Notiflix JS -->
        <script src="https://cdn.jsdelivr.net/npm/notiflix@3.0.2/dist/notiflix-3.0.2.min.js"></script>

        <!-- Custom Script to Show Notifications -->
        <script>
            // Show error notification if there is a session error
            @if(session('error'))
                Notiflix.Notify.Failure('{{ session('error') }}');
            @endif

            // Initialize Parsley validation
            $('#loginForm').parsley();

            // Show success or failure on form submission
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                var form = $(this);
                if (form.parsley().isValid()) {
                    // If the form is valid, show a success notification
                    Notiflix.Notify.Success('Form is valid. Logging in...');
                    form.submit();  // Submit the form
                } else {
                    // If the form is invalid, show a failure notification
                    Notiflix.Notify.Failure('Please fix the errors in the form.');
                }
            });
        </script>

    </body>
</html> --}}
