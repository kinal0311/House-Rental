<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:03 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

    @include('frontend.layoutcss')
    <style>
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
            color: #586167;
        }

        .form-control {
            border: none;
            color:#586167;
            border-bottom: 2px solid #eee;
            background-color: #ffffff;
            border-radius: 0;
            padding-left: 0;
            box-shadow: none;
        }
        .form-control:focus {
            border-bottom: 1px solid #586167;
            outline: none;
        }
        .input-group-text {
            background: none;
            border: none;
            padding-right: 0;
        }


            /* Red background for invalid inputs */
        .is-invalid, .is-invalid:focus {
            background-color: #f8d7da;
            /* border-bottom-color: #dc3545 !important; Red border */
            border-bottom: 2px solid #f8d7da;

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
                    <h2>Sign up</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sign up</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- breadcrumb end -->

    <!-- section start -->
    <section>
        <div class="container">
            <div class="row log-in sign-up">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                    <div class="theme-card">
                        <div class="title-3 text-start">
                            <h2>Sign up</h2>
                        </div>
                        <form method="POST" action="{{ route('user.store') }}" id="signUpForm" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               placeholder="Enter Name" value="{{ old('name') }}"
                                               required
                                               data-parsley-pattern="^[a-zA-Z\s]+$"
                                               data-parsley-pattern-message="Name must contain only letters and spaces."
                                               data-parsley-trigger="keyup">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="Enter Email" value="{{ old('email') }}"
                                               required
                                               data-parsley-type="email"
                                               data-parsley-trigger="keyup"
                                               data-parsley-type-message="Please enter a valid email address.">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number<span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" maxlength="20"
                                               placeholder="Enter Phone Number" value="{{ old('phone_number') }}"
                                               data-parsley-length="[10, 20]"
                                               data-parsley-length-message="Phone number must be between 10 and 15 digits."
                                               data-parsley-trigger="keyup" required>
                                        @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender<span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control" required data-parsley-trigger="change" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth<span class="text-danger">*</span></label>
                                        <input type="date" name="dob" id="dob" class="form-control"
                                               value="{{ old('dob') }}" required
                                               data-parsley-trigger="change"
                                               data-parsley-required-message="Date of birth is required."
                                               data-parsley-date
                                               data-parsley-date-message="Please select a valid date.">
                                        @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control"
                                               placeholder="Enter Password" required
                                               data-parsley-minlength="6"
                                               data-parsley-minlength-message="Password must be at least 6 characters long."
                                               data-parsley-trigger="keyup">
                                                <!-- Show Password Button -->
                                                {{-- <button type="button" id="togglePassword" class="btn btn-link position-absolute"
                                                style="top: 45%; right: 10px;">
                                            <i class="fa fa-eye" style="color: #6c757d;"></i> <!-- Eye Icon to show/hide password -->
                                        </button> --}}
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <div class="input-group" required>
                                            <select class="form-control" name="role_id" >
                                                <option value="">Select Role</option>
                                                <option value="2" {{ $role->name == 'Agent' ? 'selected' : '' }}>Agent</option>
                                                <option value="3" {{ $role->name == 'User' ? 'selected' : '' }}>User</option>
                                            </select>
                                            {{-- <span class="input-group-text"><i data-feather="shield"></i></span> --}}
                                        </div>
                                    </div>
                                    {{-- @error('role_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip_code">ZIP Code<span class="text-danger">*</span></label>
                                        <input type="text" name="zip_code" id="zip_code" class="form-control"
                                               placeholder="Enter ZIP Code" value="{{ old('zip_code') }}"
                                               data-parsley-type="digits" data-parsley-trigger="keyup" required>
                                        @error('zip_code')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="img">Profile Picture<span class="text-danger">*</span></label>
                                        <input type="file" name="img" id="img" class="form-control" accept="image/*" required>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                               placeholder="Enter Address" value="{{ old('address') }}"
                                               data-parsley-trigger="keyup" required>
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description<br><span class="text-danger">*required for agents</span></label>
                                        <textarea name="description" id="description" class="form-control" rows="3"
                                                  placeholder="Enter Description" data-parsley-trigger="keyup" required>{{ old('description') }} </textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Create Account</button>
                                    <a href="{{ route('login-user') }}" class="btn btn-dashed btn-pill color-2">Log in</a>
                                </div>
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
 document.getElementById("dob").addEventListener("change", function() {
        var date = new Date(this.value);
        var year = date.getFullYear();
        var month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
        var day = String(date.getDate()).padStart(2, '0');

        // Format as Y-m-d
        var formattedDate = year + '-' + month + '-' + day;
        console.log(formattedDate); // This is now in Y-m-d format
    });

    $(document).ready(function() {
        $('form').parsley({
            errorsContainer: function (ParsleyField) {
                return ParsleyField.$element.closest('.form-group').find('.error-message');
            }
        });
    });

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            showConfirmButton: true
        });
    @endif

</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:03 GMT -->
</html>
