@extends('layout.partials.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">Add User</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store') }}" id="userForm" method="POST" enctype="multipart/form-data" data-parsley-validate>  {{-- data-parsley-validate --}}
                        @csrf
                        <div class="row">

                            <!-- Name Field -->
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

                            <!-- Role Field -->
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
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="Enter Password" required
                                           data-parsley-minlength="6"
                                           data-parsley-minlength-message="Password must be at least 6 characters long."
                                           data-parsley-trigger="keyup">
                                            <!-- Show Password Button -->
                                            <button type="button" id="togglePassword" class="btn btn-link position-absolute"
                                            style="top: 45%; right: 10px;">
                                        <i class="fa fa-eye" style="color: #6c757d;"></i> <!-- Eye Icon to show/hide password -->
                                    </button>
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
                                           data-parsley-trigger="keyup" required>
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
                                           data-parsley-type="digits" data-parsley-trigger="keyup" required>
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

                            <!-- Description Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="3"
                                              placeholder="Enter Description" data-parsley-trigger="keyup" required>{{ old('description') }} </textarea>
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
                                    <input type="file" name="img" id="img" class="form-control" accept="image/*" >
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
                                                {{ old('status') == '1' ? 'checked' : '' }} required data-parsley-required="true" data-parsley-errors-container="#radio-error">
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

                        <!-- Submit Button -->
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.admin.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Initialize Parsley
        $('#userForm').parsley();

        // Check for radio button validation and show error message manually if needed
        $('#userForm').on('submit', function(e) {
            //e.preventDefault();

            // If Parsley detects an invalid form
            if ($(this).parsley().isValid() === false) {
                // Display error message
                $('#statusError').text('Please select a status.');
            }
        });
    });


    // Toggle password visibility when "Show Password" button is clicked
    // document.getElementById('togglePassword').addEventListener('click', function () {
    //     var passwordField = document.getElementById('password');
    //     var passwordFieldType = passwordField.getAttribute('type');

    //     // Toggle between text and password types
    //     if (passwordFieldType === 'password') {
    //         passwordField.setAttribute('type', 'text');  // Show the text
    //         this.innerHTML = '<i class="fa fa-eye-slash"></i>';  // Change to eye-slash icon
    //     } else {
    //         passwordField.setAttribute('type', 'password');  // Hide the text
    //         this.innerHTML = '<i class="fa fa-eye"></i>';  // Change to eye icon
    //     }
    // });
</script>
@endsection
