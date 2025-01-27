@extends('layout.partials.master')
@section('content')

<div class="container">
    <h2>My Account</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <form action="{{ route('account.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="role_id">Role</label>
                <select id="role_id" name="role_id" class="form-control" required>
                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Agent</option>
                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', $user->dob) }}" required>
            </div>

            <div class="form-group">
                <label for="password">New Password (Optional)</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
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
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $user->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control" rows="2">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="form-group">
                <label for="zip_code">ZIP Code</label>
                <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ old('zip_code', $user->zip_code) }}" required>
            </div>

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

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
@section('script')
<script>
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
</script>
@endsection
