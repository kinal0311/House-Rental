<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/tab-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:46 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>House Rental</title>

    @include('frontend.layoutcss')
    <style>
        .property-slider img {
            width: 100%; /* Makes images responsive */
            height: 250px; /* Set your desired height */
            object-fit: cover; /* Ensures images cover the area without stretching */
            border-radius: 10px; /* Optional: Rounds image corners */
        }

        /* Space between properties horizontally and vertically */
        .grid-item {
            margin-bottom: 20px; /* Add bottom margin for spacing between rows */
            padding-left: 15px;
            padding-right: 15px; /* Add padding between items */
        }

        /* Adjust the grid layout for 3 items per row with margins between them */
        .property-2 .row {
            margin-left: -15px;
            margin-right: -15px;
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
                    <h2>Cart</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <section class="property-section">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-12 property-grid-3">
                    <div class="filter-panel tab-top-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Cart Property</h2>
                                <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                            </div>
                        </div>
                    </div>
                        {{-- @foreach ($cart as $cartItem)
                            @php
                                $property = $cartItem->property;
                            @endphp

                            @if ($property)
                                <div class="col-xl-4 col-md-6 col-12 grid-item wow fadeInUp mb-4 {{ $property->status }}">
                                    <!-- Your HTML rendering here -->
                                </div>
                            @else
                                <p>Property not found or unavailable.</p>
                            @endif
                            @endforeach --}}
                    <div class="property-2 column-sm zoom-gallery property-label property-grid row justify-content-start" id="properties-item">
                        @if($cart->isEmpty())
                            <h3>No properties in cart.</h3>
                        @else
                            @foreach($cart as $item)
                            @php
                                $property = $item->property; // Get the property details
                            @endphp
                            <div class="col-xl-4 col-md-6 col-12 grid-item wow fadeInUp mb-4 {{ $property->status }}">
                                <div class="property-box">
                                    <div class="property-image">
                                        <div class="property-slider">
                                            @if($property && $property->images->count() > 0)
                                                @foreach($property->images as $image)
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ asset($image->image_url) }}" class="bg-img" alt="Property Image">
                                                    </a>
                                                @endforeach
                                            @else
                                                <p>No images available</p> <!-- or use a default placeholder image -->
                                            @endif
                                        </div>

                                        <div class="labels-left">
                                            <div>
                                                <span class="label label-shadow
                                                @if($property && $property->status == 'Sale') bg-info
                                                @elseif($property && $property->status == 'Sold') bg-danger
                                                @elseif($property && $property->status == 'Rent') bg-success
                                                @else bg-secondary
                                                @endif
                                                ">
                                                {{ $property->status ?? 'Unknown' }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="seen-data">
                                            <i data-feather="camera"></i>
                                            <span>{{ $property->images->count() ?? 0 }}</span>
                                        </div>

                                        <div class="overlay-property-box">
                                            <a href="javascript:void(0);" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="Wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="property-details">
                                        <span class="font-roboto">{{ $property->city ?? 'Unknown City' }}</span>
                                        <a href="#">
                                            <h3>{{ $property->address ?? 'No Address' }}</h3>
                                        </a>
                                        <h6>${{ $property->price ?? '0.00' }}*</h6>
                                        <ul>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt=""> Bed: {{ $property->beds ?? 0 }}</li>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt=""> Baths: {{ $property->baths ?? 0 }}</li>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt=""> Sq Ft: {{ $property->area ?? 0 }}</li>
                                        </ul>
                                        <div class="property-btn d-flex">
                                            <button type="button" class="btn btn-dashed btn-pill color-2" id="removeBtn" onclick="removeFromCart({{ $item->id }})">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- <div class="container">
    <h2>Your Cart</h2>

    <div class="property-2 column-sm zoom-gallery property-label property-grid row grid" id="cart-items">
        @if(empty($cart))
            <p>No properties in cart.</p>
        @else
            @foreach($cart as $item)
            <div class="col-xl-4 col-md-6 grid-item wow fadeInUp">
                <div class="property-box">
                    <div class="property-image">
                        <div class="property-slider">
                            <!-- Show one static image (Adjust as needed) -->
                            <a href="javascript:void(0)">
                                <img src="{{ asset('default-property.jpg') }}" class="bg-img" alt="">
                            </a>
                        </div>
                        <div class="labels-left">
                            <span class="label label-shadow bg-info">In Cart</span>
                        </div>
                        <div class="seen-data">
                            <i data-feather="camera"></i>
                            <span>1</span>
                        </div>
                        <div class="overlay-property-box">
                            <a href="javascript:void(0);" class="effect-round remove-item" data-id="{{ $item['id'] }}" data-bs-toggle="tooltip" title="Remove">
                                <i data-feather="trash"></i>
                            </a>
                        </div>
                    </div>

                    <div class="property-details">
                        <span class="font-roboto">{{ $item['property_type'] }}</span>
                        <h3>Property ID: {{ $item['id'] }}</h3>
                        <h6>${{ number_format($item['price'], 2) }}</h6>
                        <p class="font-roboto">This property is added to your cart.</p>
                        <ul>
                            <li>Quantity: {{ $item['quantity'] }}</li>
                        </ul>
                        <div class="property-btn d-flex">
                            <button type="button" class="btn btn-dashed btn-pill color-2 remove-item" data-id="{{ $item['id'] }}">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div> --}}


@include('frontend.footer-orange')

@yield('script')
@include('frontend.footer-script')
<script src="https://unpkg.com/feather-icons"></script>

<script>
$(document).ready(function(){

    $('#properties-item').slick({
        slidesToShow: 3, // Show 3 items per row
        slidesToScroll: 1, // Scroll 1 item at a time
        infinite: true, // Loop the slider
        dots: true, // Show navigation dots
        responsive: [
            {
                breakpoint: 1024, // Tablet and above
                settings: {
                    slidesToShow: 2, // Show 2 items for smaller screens
                }
            },
            {
                breakpoint: 600, // Mobile devices
                settings: {
                    slidesToShow: 1, // Show 1 item per row on mobile
                }
            }
        ]
    });
});


function removeFromCart(cartItemId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to remove this property from your cart.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_item_id: cartItemId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Removed!',
                            text: 'Property successfully removed from your cart.',
                            showConfirmButton: false,
                            timer: 1000
                        }).then(() => {
                            // Redirect to listing page
                            window.location.href = response.redirect;
                        });

                        // Update cart count
                        $('#cart-count').text(response.cartCount);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error removing property from cart',
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error occurred while removing from cart',
                        showConfirmButton: true
                    });
                }
            });
        }
    });
}



</script>
</body>
<!-- Mirrored from themes.pixelstrap.com/sheltos/main/tab-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:46 GMT -->
</html>

