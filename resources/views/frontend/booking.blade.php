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
<style>
    .invoice-header {
        background-color: #f8f9fa;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .invoice-footer {
        background-color: #f8f9fa;
        padding: 10px;
        margin-top: 20px;
        border-radius: 5px;
    }

    .invoice-table th {
        background-color: #f1f1f1;
    }
    </style>

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

    <div class="container mt-5 mb-5 p-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Invoice Header -->
                <div class="invoice-header">
                    <h2 class="mb-3">Invoice for Property Booking</h2>
                    <p><strong>Booking Date:</strong> {{ \Carbon\Carbon::now()->format('d M, Y') }}</p>
                    <p><strong>Invoice Number:</strong> #INV-{{ rand(1000, 9999) }}</p>
                </div>

                <!-- Property Details Section -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h4>Customer Details</h4>
                        <p><strong>Customer Name:</strong> {{ $user->name }} </p>  <!-- Corrected -->
                        <p><strong>Email:</strong> {{ $user->email }}</p>        <!-- Corrected -->
                        <p><strong>Phone No.:</strong> {{ $user->phone_number  ?? 'N/A' }}</p> <!-- Assuming there's a phone field, or you can customize this -->
                        <p><strong>Gender:</strong> {{ $user->gender ?? 'N/A' }}</p> <!-- Assuming there's a gender field, or you can customize this -->
                    </div>
                    <div class="col-md-4">
                        <h4>Agent Details</h4>
                        <p><strong>Agent Name:</strong> {{ $agent->name }} </p>  <!-- Corrected -->
                        <p><strong>Email:</strong> {{ $agent->email }}</p>        <!-- Corrected -->
                        <p><strong>Phone No.:</strong> {{ $agent->phone_number  ?? 'N/A' }}</p> <!-- Assuming there's a phone field, or you can customize this -->
                        <p><strong>Gender:</strong> {{ $agent->gender ?? 'N/A' }}</p> <!-- Assuming there's a gender field, or you can customize this -->
                    </div>
                    <div class="col-md-4">
                        <h4>Property Details</h4>
                        <p><strong>Property Name:</strong> {{ $property->property_type }} </p>
                        <p><strong>Property Location:</strong> {{ $property->address }} </p>
                        <p><strong>Property Type:</strong> {{ $property->status }} </p>
                    </div>
                </div>

                <!-- Invoice Table Section -->
                <table class="table table-bordered invoice-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Property Price</td>
                            <td>${{ number_format($property->price, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Deposit</td>
                            <td>${{ number_format($property->token_amount ?? 0, 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>${{ number_format($property->price + ($property->token_amount ?? 0), 2) }}</strong></td>
                        </tr>
                    </tbody>

                </table>

                <!-- Footer -->
                <div class="d-flex justify-content-between">
                    <div class="invoice-footer">
                        <p>If you have any questions, please contact us at <strong>support@example.com</strong></p>
                        <p>Thank you for booking with us!</p>
                    </div>
                    <div class="m-5">
                        <!-- Back Button -->
                        <button onclick="history.back()" class="btn btn-dashed btn-pill color-6">
                            <i class="fa-solid fa-arrow-left"></i> Back
                        </button>

                        <!-- Payment Button -->
                        <form action="{{ route('payment.process') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id }}">

                            <button type="submit" class="btn btn-gradient btn-pill color-2">
                                <i class="fa-solid fa-credit-card"></i> Pay Now
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('frontend.footer-orange')
    <!-- customizer end -->
    {{-- @if(session('status') && session('message')) --}}

    @include('frontend.footer-script')
    @yield('script')

    <script>
        // Retrieve session data using Blade variables inside JavaScript
        const status = "{{ session('status') }}";
        const message = "{{ session('message') }}";

        // Check if status and message are not empty
        if (status && message) {
            if (status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: message,
                    confirmButtonText: 'OK'
                });
            } else if (status === 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                    confirmButtonText: 'OK'
                });
            }
        }
    </script>

</body>
{{-- @endif --}}
<!-- Mirrored from themes.pixelstrap.com/sheltos/main/single-property-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:50 GMT -->
</html>
