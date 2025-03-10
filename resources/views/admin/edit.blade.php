@extends('layout.partials.master')

@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-6 col-md-8 col-sm-8 my-2">
            <div class="page-title-box">
                <h4 class="text-uppercase mb-0">Edit User</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update', $user->id) }}" id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!-- Name Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{ $user->name }}"
                                           {{ $user->trashed() ? 'readonly' : '' }}
                                           required>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Role Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role_id">Role<span class="text-danger">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control" {{ $user->trashed() ? 'disabled' : '' }} required>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->role_id == $role->id ? 'selected' : '' }}>
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
                                           value="{{ $user->email }}"
                                           {{ $user->trashed() ? 'readonly' : '' }}
                                           readonly required>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password (Leave blank to keep current password)</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i id="pwd-icon" class="far fa-eye-slash" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </div>
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
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                           value="{{ $user->phone_number }}" readonly
                                           {{ $user->trashed() ? 'readonly' : '' }}
                                            data-parsley-length="[10, 20]">
                                    @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date of Birth Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob }}"
                                           {{ $user->trashed() ? 'readonly' : '' }} required>
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
                                           value="{{ $user->address }}"
                                           {{ $user->trashed() ? 'readonly' : '' }} required>
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
                                           value="{{ $user->zip_code }}"
                                           {{ $user->trashed() ? 'readonly' : '' }}
                                           data-parsley-type="digits" required>
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
                                    <select name="gender" id="gender" class="form-control" {{ $user->trashed() ? 'disabled' : '' }} required>
                                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>

                                    <div class="text-danger"></div>

                                </div>
                            </div>

                            <!-- Description Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="3"
                                              {{ $user->trashed() ? 'readonly' : '' }} required>{{ $user->description }}</textarea>
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
                                    <label for="image">Profile Picture</label>
                                    <input type="file" name="img" id="img" class="form-control mb-3 w-50">

                                    <!-- Existing image preview if there is an existing image -->
                                    @if($user->img != '')
                                    <img class="border rounded p-0 pic_preview" src="{{URL::asset($user->img)}}" alt="your image" style="height: 200px;width: 200px; object-fit: cover;" id="existing-img"/>
                                    @endif

                                    <!-- New image preview (hidden initially) -->
                                    <img class="border rounded p-0 pic_preview" id="new-img" style="height: 200px; width: 200px; object-fit: cover; display: none;" src="" alt="new image" />

                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_Active" value="1"
                                                {{ $user->status == 1 ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="status_Active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_Inactive" value="0"
                                                {{ $user->status == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_Inactive">Inactive</label>
                                        </div>
                                    </div>

                                    <div class="text-danger"></div>

                                </div>
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update User</button>
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
        $('#editForm').parsley();


    $('#img').on('change', function () {

        var file = this.files[0];
        if (file && file.type.match('image.*')) {
            $('#existing-img').hide();  // Hide the existing image preview

            var reader = new FileReader();
            reader.onload = function (event) {
                // Log to check if the file is read correctly
                console.log(event);

                // Update the new image's source and show it
                $('#new-img').attr('src', event.target.result).show();
            }

            reader.readAsDataURL(file);  // Trigger reading the file as a data URL
            $('#upload-result').show();  // Show the upload result (if needed)
        } else {
            Notiflix.Notify.Warning('Please upload a valid image file.');
        }
    });

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
@endsection
