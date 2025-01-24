@extends('layout.partials.dashboard')
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
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store') }}" id="userForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <!-- Name Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Enter Name" value="{{ old('name') }}"
                                           required data-parsley-trigger="keyup"
                                           data-parsley-pattern="^[a-zA-Z\s]+$"
                                           data-parsley-pattern-message="Name must contain only letters">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Role Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role_id">Role<span class="text-danger">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control" required>
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
                                            data-parsley-type="email"
                                           data-parsley-trigger="keyup">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Enter Password"
                                            data-parsley-minlength="6"
                                            data-parsley-trigger="keyup">
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
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                           placeholder="Enter Phone Number" value="{{ old('phone_number') }}"
                                           data-parsley-type="digits"
                                           data-parsley-length="[10, 15]"
                                           data-parsley-trigger="keyup">
                                    @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date of Birth Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}" required>
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
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                           placeholder="Enter Address" value="{{ old('address') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ZIP Code Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">ZIP Code</label>
                                    <input type="text" name="zip_code" id="zip_code" class="form-control"
                                           placeholder="Enter ZIP Code" value="{{ old('zip_code') }}"
                                           data-parsley-type="digits" data-parsley-trigger="keyup">
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
                                    <select name="gender" id="gender" class="form-control" required>
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
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3"
                                              placeholder="Enter Description">{{ old('description') }}</textarea>
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
                                    <input type="file" name="img" id="img" class="form-control" style="height: 150px;width: 220px; object-fit: cover;">

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
                                                {{ old('status') == '1' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="status_Active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_Inactive" value="0"
                                                {{ old('status') == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_Inactive">Inactive</label>
                                        </div>
                                    </div>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
            // Initialize Parsley validation
            $('#userForm').parsley();
        });
    </script>
@endsection
