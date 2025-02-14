<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.pixelstrap.com/sheltos/main/single-property-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:50 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>House Rental</title>
    @include('frontend.layoutcss')

</head>

<body>

@include('frontend.header-white')
    <!-- slider section start -->
    <section class="p-0 ratio3_2">
        <div class="container-fluid">
            <div class="zoom-image-box zoom-gallery-multiple">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <a href="{{ URL::asset('sheltos/assets/images/property/4.jpg')}}">
                            <img src="{{ URL::asset('sheltos/assets/images/property/4.jpg')}}" class="bg-img" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-6 p-0">
                        <a href="{{ URL::asset('sheltos/assets/images/property/2.jpg')}}">
                            <img src="{{ URL::asset('sheltos/assets/images/property/2.jpg')}}" class="bg-img" alt="">
                        </a>
                        <a href="{{ URL::asset('sheltos/assets/images/property/1.jpg')}}">
                            <img src="{{ URL::asset('sheltos/assets/images/property/1.jpg')}}" class="bg-img" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-6 p-0">
                        <a href="{{ URL::asset('sheltos/assets/images/property/5.jpg')}}">
                            <img src="{{ URL::asset('sheltos/assets/images/property/5.jpg')}}" class="bg-img" alt="">
                        </a>
                        <a href="{{ URL::asset('sheltos/assets/images/property/3.jpg')}}">
                            <img src="{{ URL::asset('sheltos/assets/images/property/3.jpg')}}" class="bg-img" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider section end -->
    {{-- <div class="container mt-5 mb-5">
        @auth
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Profile Card -->
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="card-title mb-0">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <!-- Profile Image -->
                            <div class="text-center mb-4">
                                @if(Auth::user()->img)
                                    <img src="{{ asset( Auth::user()->img) }}" alt="Profile Image" class="rounded-circle" style="max-width: 150px;">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="Default Profile Image" class="rounded-circle" style="max-width: 150px;">
                                @endif
                            </div>

                            <!-- Profile Info -->
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    <p><strong>Gender:</strong> {{ Auth::user()->gender }}</p>
                                    <p><strong>Phone Number:</strong> {{ Auth::user()->phone_number }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Role ID:</strong> {{ Auth::user()->role_id }}</p>
                                    <p><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse(Auth::user()->dob)->format('d M Y') }}</p>
                                    <button class="btn btn-pill
                                    @if(Auth::user()->status == 1)
                                        btn-success
                                    @else
                                        btn-danger
                                    @endif
                                    color-2">
                                    {{ Auth::user()->status == 1 ? 'Active' : 'Inactive' }}
                                </button>


                                    <p><strong>Description:</strong> {{ Auth::user()->description }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Zip Code:</strong> {{ Auth::user()->zip_code }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center">You need to log in to view your profile.</p>
        @endauth
    </div> --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5 mb-5">
        <div class="filter-panel tab-top-panel">
            <div class="top-panel d-flex justify-content-between align-items-center">
                <div>
                    <h2>My Profile</h2>
                </div>
                <!-- Button will now be aligned to the right -->
                <button class="btn btn-gradient btn-pill color-2" type="button" id="logoutButton">Log out</button>
            </div>
        </div>


        <div class="row justify-content-center ">
            @auth

                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-body p-5">
                            <form method="POST" action="{{ route('update.profile') }}" id="updateProfileForm" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                @if(Auth::user()->img)
                                    <div class="text-center">
                                        <img id="profileImage" src="{{ asset(Auth::user()->img ?? 'assets/images/default.png') }}" alt="Profile Image" style="cursor:pointer; width:150px; height:150px; border-radius:50%;">
                                    </div>
                                    <input type="file" id="imageUpload" name="img" style="display: none;">
                                @else
                                    <div class="text-center">
                                        <img src="https://via.placeholder.com/150" alt="Default Profile Image" class="img-account-profile rounded-circle mb-2" style="max-width: 150px;">
                                    </div>
                                @endif
                                <!-- Form Group (username)-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="Name">Name</label><span class="text-danger">*</span>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="{{ Auth::user()->name }}">
                                    </div>

                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Phone Number">Phone Number</label><span class="text-danger">*</span>
                                        <input class="form-control" id="phone_number" type="text" name="phone_number" placeholder="Enter your phonenumber" value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Email">Email</label>
                                        <input class="form-control" id="email" name="email" type="text" placeholder="Enter your Email" value="{{ Auth::user()->email }}" readonly>
                                    </div>

                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Password">Password</label>
                                        <input class="form-control" id="password" type="text" name="password" placeholder="Enter your password" value="">
                                    </div>
                                </div>
                                <!-- Form Row -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Gender">Gender</label><span class="text-danger">*</span>
                                        <input class="form-control" id="gender" type="text" name="gender" placeholder="Enter your gender" value="{{ Auth::user()->gender }}">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Birth Of Date">Birth Of Date</label>
                                        <input class="form-control" id="dob" type="text" name="dob" placeholder="Enter your location" value="{{ \Carbon\Carbon::parse(Auth::user()->dob)->format('d M Y') }}">
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="Description">Description</label><span class="text-danger">*required for agents</span>
                                    <input class="form-control" id="Description" type="text" placeholder="Enter your Description" value="{{ Auth::user()->description }}">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="Address">Address</label>
                                        <input class="form-control" id="Address" type="text" name="address" placeholder="Enter your address" value="{{ Auth::user()->address }}">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="ZIP Code">ZIP Code</label>
                                        <input class="form-control" id="zip_code" type="text" name="zip_code" placeholder="Enter your zip code" value="{{ Auth::user()->zip_code }}">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                {{-- <button class="btn btn-dashed btn-pill color-2" type="button">Make changes</button> --}}
                                <button class="btn btn-dashed btn-pill color-2" type="submit" id="">Edit profile</button>
                            </form>
                        </div>
                    </div>

                </div>
            @else
                <p class="text-center">You need to log in to view your profile.</p>
            @endauth
        </div>
    </div>

@include('frontend.footer-orange')
<!-- customizer end -->

@include('frontend.footer-script')
@yield('script')
<script>
    $(document).ready(function() {
        // Handle logout button click
        $('#logoutButton').click(function() {
            $.ajax({
                url: '{{ route('logout-user') }}', // Adjust this to the appropriate logout route in your app
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    // Redirect to login page or show a success message
                    window.location.href = '{{ route('login-user') }}'; // Adjust the redirect as necessary
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while logging out. Please try again.');
                }
            });
        });


    // Open file input when clicking the image
    $('#profileImage').click(function () {
        $('#imageUpload').click();
    });

    // Show selected image preview
    $('#imageUpload').change(function (event) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#profileImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(event.target.files[0]);
    });


    });
</script>

</body>
</html>

