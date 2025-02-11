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

    <!-- Loader start -->
    <div class="loader-wrapper">
        <div class="row loader-img">
            <div class="col-12">
                <img src="../assets/images/loader/loader-2.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <!-- Loader end -->

    <!-- header start -->
    <header class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <a href="https://themes.pixelstrap.com/sheltos/index.html">
                                <img src="../assets/images/logo/2.png" alt="" class="img-fluid">
                            </a>
                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul class="nav-menu">
                                        <li class="back-btn">
                                            <div class="mobile-back text-end">
                                                <span>Back</span>
                                                <i aria-hidden="true" class="fa fa-angle-right ps-2"></i>
                                            </div>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('home') }}" class="nav-link menu-title">Home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('listing') }}" class="nav-link menu-title">Listing</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('agent-grid') }}" class="nav-link menu-title">Agents</a>
                                        </li>
                                        <li class="mega-menu">
                                            <a href="{{ route('sale-property') }}" class="nav-link menu-title">
                                                For Sale
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('rent-property') }}" class="nav-link menu-title">For Rent</a>
                                        </li>
                                        {{-- <li class="dropdown">
                                            <a href="javascript:void(0)" class="nav-link menu-title">agent</a>
                                        </li> --}}
                                        <li class="dropdown">
                                            <a href="{{ route('contect') }}" class="nav-link menu-title">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <ul class="header-right">
                            <li class="right-menu">
                                <ul class="nav-menu">
                                    <li class="dropdown language">
                                        <a href="javascript:void(0)">
                                            <i data-feather="globe"></i>
                                        </a>
                                        <ul class="nav-submenu">
                                            <li><a href="javascript:void(0)">English</a></li>
                                            <li><a href="javascript:void(0)">French</a></li>
                                            <li><a href="javascript:void(0)">Arabic</a></li>
                                            <li><a href="javascript:void(0)">Spanish</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="user-favourites.html">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown cart">
                                        <a href="{{ route('cart.show')}}">
                                            <i data-feather="shopping-cart"></i>
                                        </a>
                                        {{-- <ul class="nav-submenu">
                                            <li>
                                                <div class="media">
                                                    <img src="../assets/images/property/2.jpg" class="img-fluid" alt="">
                                                    <div class="media-body">
                                                        <a href="single-property-8.html"><h5>Magnolia Ranch</h5></a>
                                                        <span>$120.00*</span>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <img src="../assets/images/property/3.jpg" class="img-fluid" alt="">
                                                    <div class="media-body">
                                                        <a href="single-property-8.html"><h5>Magnolia Ranch</h5></a>
                                                        <span>$140.00*</span>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total">
                                                    <h5>Subtotal :- <span class="float-end">$260.00</span></h5>
                                                </div>
                                            </li>
                                        </ul> --}}
                                    </li>
                                    <li class="dropdown currency">
                                        <a href="javascript:void(0)">
                                            <i data-feather="dollar-sign"></i>
                                        </a>
                                        <ul class="nav-submenu">
                                            <li><a href="javascript:void(0)">Dollar</a></li>
                                            <li><a href="javascript:void(0)">Euro</a></li>
                                            <li><a href="javascript:void(0)">Pound</a></li>
                                            <li><a href="javascript:void(0)">Yuan</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('login-user') }}">
                                            <i data-feather="user"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--  header end -->

    <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0">
        <img src="../assets/images/inner-background.jpg" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Tab Full width</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tab Full width</li>
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
                                            <button type="button" class="btn btn-dashed btn-pill color-2" onclick="removeFromCart({{ $item->id }})">Remove</button>
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


    <!-- footer start -->
    <footer>
        <div class="footer footer-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="footer-details text-center">
                            <a href="https://themes.pixelstrap.com/sheltos/index.html">
                                <img src="../assets/images/logo/footer-logo.png" alt="">
                            </a>
                            <p>Elegant retreat in a quiet Coral Gables setting. This home provides
                                wonderful entertaining spaces with a chef kitchen opening
                            </p>
                            <h6>Contact us</h6>
                            <ul class="icon-list">
                                <li><a href="contact-3.html"><i class="fas fa-map-marker-alt"></i></a></li>
                                <li><a href="contact-3.html"><i class="fas fa-phone-alt"></i></a></li>
                                <li><a href="signup.html"><i class="fas fa-envelope"></i></a></li>
                                <li><a href="contact-3.html"><i class="fas fa-globe"></i></a></li>
                                <li><a href="contact-3.html"><i class="fas fa-wifi"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="footer-links footer-left-space">
                                    <h5 class="footer-title ">Useful links
                                        <span class="according-menu"><i class="fas fa-chevron-down"></i></span>
                                    </h5>
                                    <ul class="footer-content">
                                        <li>
                                            <a href="about-us-2.html">About us</a>
                                        </li>
                                        <li>
                                            <a href="grid-2.html">New Arrivals</a>
                                        </li>
                                        <li>
                                            <a href="agency-grid.html">Agency</a>
                                        </li>
                                        <li>
                                            <a href="faq.html">Faq</a>
                                        </li>
                                        <li>
                                            <a href="contact-2.html">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <div class="footer-links">
                                    <h5 class="footer-title">feature
                                        <span class="according-menu"><i class="fas fa-chevron-down"></i></span>
                                    </h5>
                                    <ul class="footer-content">
                                        <li>
                                            <a href="services.html">Services</a>
                                        </li>
                                        <li>
                                            <a href="agency-list.html">Agency</a>
                                        </li>
                                        <li>
                                            <a href="agent-grid.html">Agents</a>
                                        </li>
                                        <li>
                                            <a href="pricing.html">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="user-favourites.html">Favourites</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <div class="footer-links">
                                    <h5 class="footer-title">Social
                                        <span class="according-menu"><i class="fas fa-chevron-down"></i></span>
                                    </h5>
                                    <ul class="footer-content">
                                        <li>
                                            <a href="https://www.facebook.com/">Facebook</a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/">Instagram</a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/">Twitter</a>
                                        </li>
                                        <li>
                                            <a href="https://login.mailchimp.com/">Mail chimp</a>
                                        </li>
                                        <li>
                                            <a href="https://accounts.google.com/">Gmail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="footer-links">
                                    <h5 class="footer-title">subscribe
                                        <span class="according-menu"><i class="fas fa-chevron-down"></i></span>
                                    </h5>
                                    <div class="footer-content">
                                        <p class="mb-0">
                                            Real estate investing involves the purchase, Improvement of realty, management and sale or rental of real estate for profit.
                                        </p>
                                        <form>
                                            <div class="input-group">
                                                <input type="email" class="form-control" placeholder="Email Address" required>
                                                <span class="input-group-apend">
                                                    <button type="submit" class="input-group-text" id="basic-addon2"><i
                                                        class="fas fa-paper-plane"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-blog">
                            <div class="slick-between">
                                <div class="footer-slider">
                                    <div>
                                        <div class="media">
                                            <a href="blog-detail-left-sidebar.html">
                                                <div class="img-overlay">
                                                        <img src="../assets/images/footer/1.jpg" alt="">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                               <h6><a href="blog-detail-left-sidebar.html">Real Estate Industry</a></h6>
                                                <p class="font-roboto"><a href="blog-detail-right-sidebar.html">An Electronic version of the real estate industry.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="media">
                                            <a href="blog-detail-left-sidebar.html">
                                                <div class="img-overlay">
                                                        <img src="../assets/images/footer/2.jpg" alt="">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                                <h6><a href="blog-detail-left-sidebar.html">Entertaining Spaces</a></h6>
                                                <p class="font-roboto"><a href="blog-detail-right-sidebar.html">This home provides
                                                    wonderful entertaining spaces.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="media">
                                            <a href="blog-detail-left-sidebar.html">
                                                <div class="img-overlay">
                                                        <img src="../assets/images/footer/3.jpg" alt="">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                               <h6><a href="blog-detail-left-sidebar.html">Estate Agents Work</a></h6>
                                                <p class="font-roboto"><a href="blog-detail-right-sidebar.html">The market of buying and selling real estate.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="media">
                                            <a href="blog-detail-left-sidebar.html">
                                                <div class="img-overlay">
                                                        <img src="../assets/images/footer/4.jpg" alt="">
                                                </div>
                                            </a>
                                            <div class="media-body">
                                                <h6><a href="blog-detail-left-sidebar.html">Increase in Demand</a></h6>
                                                <p class="font-roboto"><a href="blog-detail-right-sidebar.html">The effects of an increase demand in short run.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer footer-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="copy-right">
                            <p class="mb-0">Copyright 2022, All Right Reserved Sheltos</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 text-end">
                        <ul class="sub-footer-link">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="terms-conditions.html">Terms</a></li>
                            <li><a href="privacy-policy.html">Privacy policy</a></li>
                            <li><a href="{{ route('contect') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- tap to top start -->
    <div class="tap-top">
        <div>
            <i class="fas fa-arrow-up"></i>
        </div>
    </div>
    <!-- tap to top end -->

    <!-- customizer start -->
    <div class="customizer-wrap">
        <div class="customizer-links">
            <i data-feather="settings"></i>
        </div>
        <div class="customizer-contain custom-scrollbar">
            <div class="setting-back">
                <i data-feather="x"></i>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-2">Layout type</h6>
                </div>
                <div class="option-setting">
                    <span>Light</span>
                    <label class="switch">
                        <input type="checkbox" name="chk1" value="option" class="setting-check"><span class="switch-state"></span>
                    </label>
                    <span>Dark</span>
                </div>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-2">Layout Direction</h6>
                </div>
                <div class="option-setting">
                    <span>LTR</span>
                    <label class="switch">
                        <input type="checkbox" name="chk2" value="option" class="setting-check1"><span class="switch-state"></span>
                    </label>
                    <span>RTL</span>
                </div>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-2">Unlimited Color</h6>
                </div>
                <div class="option-setting unlimited-color-layout">
                    <div class="form-group">
                        <label for="ColorPicker3">color 3</label>
                        <input id="ColorPicker3" type="color" value="#ff5c41" name="Default">
                    </div>
                    <div class="form-group">
                        <label for="ColorPicker4">color 4</label>
                        <input id="ColorPicker4" type="color" value="#ff8c41" name="Default">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- customizer end -->

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
    // Show confirmation dialog using SweetAlert2
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to remove this property from your cart.",
        icon: 'warning',
        showCancelButton: true, // Show the Cancel button
        confirmButtonColor: '#3085d6', // Color for Confirm button
        cancelButtonColor: '#d33', // Color for Cancel button
        confirmButtonText: 'Yes, remove it!', // Text for Confirm button
        cancelButtonText: 'No, keep it' // Text for Cancel button
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with removing the property from the cart
            $.ajax({
                url: '{{ route('cart.remove') }}', // Ensure this is the correct route for removing the item
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    cart_item_id: cartItemId // Send the cart item ID to be removed
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Show success notification with SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Removed from Cart',
                            text: 'Property successfully removed from your cart!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Update the cart UI dynamically without reloading the page
                        $('#properties-item').html(response.cartHTML);
                    } else {
                        // Show error notification if there's an issue removing the property
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error removing property from cart',
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    // Show error notification for AJAX failure
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

