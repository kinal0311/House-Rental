<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:03 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

@include('frontend.layoutcss')
<style>

    /* Red background for invalid inputs */
    .is-invalid, .is-invalid:focus {
        background-color: #f8d7da;
        border-bottom-color: #dc3545 !important; /* Red border */
    }

    /* Red error messages */
    .parsley-errors-list {
        color: #dc3545;
        font-size: 14px;
        list-style: none;
        padding: 5px 0 0;
        margin: 0;
    }

</style>
</head>

<body>

@include('frontend.header-orange')


    <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0">
        <img src="{{ URL::asset('sheltos/assets/images/inner-background.jpg')}}" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Log in</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Log in</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- section start -->
    <section class="login-wrap">
        <div class="container">
            <div class="row log-in">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                    <div class="theme-card">
                        <div class="title-3 text-start">
                            <h2>Log in</h2>
                        </div>
                        <form method="POST" id="userLoginForm" action="{{ route('login-user.post') }}" data-parsley-validate>
                            @csrf

                            <!-- Email Field -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required
                                        data-parsley-required-message="Email not Found" value="{{ old('email') }}">
                                </div>
                                {{-- <div class="text-danger d-block mt-1">
                                    @error('email') {{ $message }} @enderror
                                </div> --}}
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" id="pwd-input" name="password" class="form-control" placeholder="Password" maxlength="8" required
                                        data-parsley-required-message="Password is incorrect">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i id="pwd-icon" class="far fa-eye-slash"></i>
                                        </div>
                                    </div>
                                </div>
                                {{-- <small class="text-danger d-block mt-1">
                                    @error('password') {{ $message }} @enderror
                                </small> --}}
                                <div class="important-note">
                                    Password should be a minimum of 8 characters and should contain letters and numbers.
                                </div>
                            </div>

                            <!-- Remember Me and Forgot Password -->
                            <div class="d-flex">
                                <label class="d-block mb-0" for="chk-ani">
                                    <input class="checkbox_animated color-2" id="chk-ani" type="checkbox"> <span>Remember me</span>
                                </label>
                                <a href="#" class="font-rubik text-color-2">Forgot password?</a>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Log in</button>
                                <a href="{{ route('signup-user') }}" class="btn btn-dashed btn-pill color-2">Create Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->


    @include('frontend.footer-orange')
    @yield('script')
    @include('frontend.footer-script')

    <script>
$(document).ready(function() {
    $('#userLoginForm').parsley();

    // Apply red background on error
    $('#userLoginForm').parsley().on('field:error', function() {
        this.$element.addClass('is-invalid'); // Add red background
    });

    // Remove red background when fixed
    $('#userLoginForm').parsley().on('field:success', function() {
        this.$element.removeClass('is-invalid'); // Remove red background
    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: {!! json_encode(session('success')) !!},
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: {!! json_encode(session('error')) !!},
            confirmButtonColor: '#d33',
            confirmButtonText: 'Try Again'
        });
    @endif
});

</script>

</body>
<!-- Mirrored from themes.pixelstrap.com/sheltos/main/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:03 GMT -->
</html>
