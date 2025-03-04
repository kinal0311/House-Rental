<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Notiflix -->
    <link href="{{asset('assets/libs/notiflix/notiflix-2.1.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-9 col-xl-7">
                    <div class="card bg-pattern">
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="text-center w-100 m-auto">
                                <a href="{{ route('home') }}">
                                    <img src="{{ URL::asset('sheltos/assets/images/logo/10.png')}}" alt="" class="img-fluid">
                                </a>
                                <p class="text-muted mb-4 mt-3">Fill in the form below to create an account.</p>
                            </div>

                            <form method="POST" action="{{ route('register.post')}}" id="registerForm" enctype="multipart/form-data">
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
                                                   data-parsley-required-message="Please enter name"
                                                   data-parsley-trigger="keyup">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_id">Role<span class="text-danger">*</span></label>
                                            <select name="role_id" id="role_id" class="form-control"
                                                    required
                                                    data-parsley-trigger="change"
                                                    data-parsley-required-message="Please select a role.">
                                                <option value="" disabled selected>Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Email Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email<span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                   placeholder="Enter Email" value="{{ old('email') }}"
                                                   required
                                                   data-parsley-type="email"
                                                   data-parsley-trigger="keyup"
                                                   data-parsley-required-message="Please enter email"
                                                   data-parsley-type-message="Please enter a valid email address.">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Password Field -->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label for="password">Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control"
                                                       placeholder="Enter Password" required
                                                       data-parsley-minlength="6"
                                                       data-parsley-minlength-message="Password must be at least 6 characters long."
                                                       data-parsley-trigger="keyup"
                                                       data-parsley-required-message="Please enter password"
                                                       data-parsley-errors-container="#passwordError">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i id="pwd-icon" class="far fa-eye-slash" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="passwordError"></div>
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <!-- Phone Number Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number<span class="text-danger">*</span></label>
                                            <input type="text" name="phone_number" id="phone_number" class="form-control" maxlength="20"
                                                   placeholder="Enter Phone Number" value="{{ old('phone_number') }}"
                                                   data-parsley-length="[10, 20]"
                                                   data-parsley-required-message="Please enter phone number"
                                                   data-parsley-length-message="Phone number must be between 10 and 15 digits."
                                                   data-parsley-trigger="keyup" required>
                                            @error('phone_number')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date of Birth Field -->
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
                                </div>

                                <div class="row">
                                    <!-- Address Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address<span class="text-danger">*</span></label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                   placeholder="Enter Address" value="{{ old('address') }}"
                                                   data-parsley-trigger="keyup" data-parsley-required-message="Please enter your address" required>
                                            @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- ZIP Code Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">ZIP Code<span class="text-danger">*</span></label>
                                            <input type="text" name="zip_code" id="zip_code" class="form-control"
                                                   placeholder="Enter ZIP Code" value="{{ old('zip_code') }}"
                                                   data-parsley-type="digits" data-parsley-required-message="Please enter ZIP code" data-parsley-trigger="keyup" required>
                                            @error('zip_code')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <!-- Gender Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender<span class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control" required data-parsley-trigger="change" data-parsley-required-message="Select your gender" required>
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

                                    <!-- Description Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description<span class="text-danger">*</span></label>
                                            <textarea name="description" id="description" class="form-control" rows="3"
                                                      placeholder="Enter Description" data-parsley-trigger="keyup" data-parsley-required-message="Description is required" required>{{ old('description') }} </textarea>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <!-- Image Upload Field -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="img">Profile Picture</label>
                                            <input type="file" name="img" id="img" class="form-control" data-parsley-required-message="Image is required" accept="image/*" >
                                            @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="status_Active" value="1"
                                                        {{ old('status') == '1' ? 'checked' : '' }} required data-parsley-required="true" data-parsley-required-message="Select your status" data-parsley-errors-container="#radio-error">
                                                    <label class="form-check-label" for="status_Active">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="status_Inactive" value="0"
                                                        {{ old('status') == '0' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="status_Inactive">Inactive</label>
                                                </div>
                                            </div>

                                            <!-- Display error message below radio buttons -->
                                            <div id="radio-error" class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 justify-content-center">
                                    <div class="col-md-auto">
                                        <button class="btn btn-outline-primary" type="button" onclick="window.history.back();">Back</button>
                                    </div>
                                    <div class="col-md-auto">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-alt">
        2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
    </footer>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Parsley JS -->
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

    <!-- Notiflix -->
    <script src="{{ URL::asset('assets/libs/notiflix/notiflix-2.1.2.js')}}"></script>

<script>
    $(document).ready(function() {
        // Initialize Parsley
        $('#registerForm').parsley();

        // Check for radio button validation and show error message manually if needed
        $('#registerForm').on('submit', function(e) {
            //e.preventDefault();

            // If Parsley detects an invalid form
            if ($(this).parsley().isValid() === false) {
                // Display error message
                $('#statusError').text('Please select a status.');
            }
        });
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
