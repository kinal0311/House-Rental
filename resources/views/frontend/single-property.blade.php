<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.pixelstrap.com/sheltos/main/single-property-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:50 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('frontend.layoutcss')

    <style>
        /* .slick-slide {
            min-width: 100px !important;
            width: auto !important;
        }
        .slick-track {
            display: flex !important;
        }
        .slick-slide img {
            width: 100%;
            height: auto;
            display: block;
        }
        .gallery-for, .gallery-nav {
            max-width: 100%;
            overflow: hidden;
        }
        .large-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .thumbnail-img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .thumbnail-img:hover {
            transform: scale(1.1);
        } */

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
    <header class="inner-page light-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <a href="https://themes.pixelstrap.com/sheltos/index.html">
                                <img src="../assets/images/logo/4.png" alt="" class="img-fluid">
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
                                            <a href="javascript:void(0)" class="nav-link menu-title">Home</a>
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
                                        <a href="javascript:void(0)">
                                            <i data-feather="shopping-cart"></i>
                                        </a>
                                        <ul class="nav-submenu">
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
                                        </ul>
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
                                        <a href="login.html">
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

    <!-- slider section start -->
    <section class="p-0 ratio3_2">
        <div class="container-fluid">
            <div class="zoom-image-box zoom-gallery-multiple">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <a href="../assets/images/property/4.jpg">
                            <img src="../assets/images/property/4.jpg" class="bg-img" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-6 p-0">
                        <a href="../assets/images/property/2.jpg">
                            <img src="../assets/images/property/2.jpg" class="bg-img" alt="">
                        </a>
                        <a href="../assets/images/property/1.jpg">
                            <img src="../assets/images/property/1.jpg" class="bg-img" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-6 p-0">
                        <a href="../assets/images/property/5.jpg">
                            <img src="../assets/images/property/5.jpg" class="bg-img" alt="">
                        </a>
                        <a href="../assets/images/property/3.jpg">
                            <img src="../assets/images/property/3.jpg" class="bg-img" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- single property header start -->
    <section class="without-top property-main small-section">
        <div class="single-property-section">
            <div class="container">

                <div class="single-title">
                    <div class="left-single">
                        <div class="d-flex">
                            <h2 class="mb-0 text-bold">{{ $property->property_type }}</h2>
                            <span><span class="label label-shadow ms-2">{{ $property->status }}</span></span>
                        </div>
                        <p class="mt-1">{{ $property->address }}</p>
                        <ul>
                            <li>
                                <div>
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">
                                    <span>{{ $property->beds }} Bedrooms</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">
                                    <span>{{ $property->baths }} Bathrooms</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/sofa.svg" class="img-fluid" alt="">
                                    <span>{{ $property->max_rooms }} Rooms</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">
                                    <span>{{ $property->area }} Sq ft</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/garage.svg" class="img-fluid" alt="">
                                    <span>1 Garage</span>
                                </div>
                            </li>
                        </ul>
                        <div class="share-buttons">
                            <div class="d-inline-block">
                                <a href="javascript:void(0)" class="btn btn-gradient btn-pill color-2"><i class="far fa-share-square"></i>
                                    share
                                </a>
                                <div class="share-hover">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/" class="icon-facebook"><i data-feather="facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/" class="icon-twitter"><i data-feather="twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/" class="icon-instagram"><i data-feather="instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-dashed btn-pill color-2 ms-md-2 ms-1 save-btn"><i class="far fa-heart"></i>
                                Save</a>
                            <a href="javascript:void(0)" class="btn btn-dashed btn-pill color-2 ms-md-2 ms-1" onclick="myFunction()"><i data-feather="printer"></i>
                                Print</a>
                        </div>
                    </div>
                    <div class="right-single">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h2 class="price">${{ $property->price }} <span>/ start From</span></h2>
                        <div class="feature-label">
                            <span class="btn btn-dashed color-2 btn-pill">Wi-fi</span>
                            <span class="btn btn-dashed color-2 ms-1 btn-pill">Swimming Pool</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- single property header end -->

    <!-- single property start -->
    <section class="single-property mt-0 pt-0">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8">
                    <div class="description-section tab-description">
                        <div class="description-details">
                            <div class="desc-box">
                                <ul class="nav nav-tabs line-tab" id="top-tab" role="tablist">
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active"
                                            href="#about">about</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#feature">feature</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#gallery">gallery</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#video">video</a>
                                    </li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#floor_plan">Floor
                                            plan</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#location-map">location</a></li>
                                </ul>
                                <div class=" tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active about page-section" id="about">
                                        <h4 class="content-title">Property Details
                                            <a href="https://www.google.com/maps/place/New+York,+NY,+USA/@40.697488,-73.979681,8z/data=!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728?hl=en"
                                                target="_blank">
                                                <i class="fa fa-map-marker-alt"></i> view on map</a>
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-6 col-xl-4">
                                                <ul class="property-list-details">
                                                    <li><span>Property Type :</span> {{ $property->property_type }}</li>
                                                    <li><span>Property ID :</span> {{ $property->id }}</li>
                                                    <li><span>Property status :</span> {{ $property->status }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <ul class="property-list-details">
                                                    <li><span>Price :</span> $ {{ $property->price }}</li>
                                                    <li><span>Property Size :</span> {{ $property->area }} sq / ft</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <ul class="property-list-details">
                                                    <li><span>City :</span> {{ $property->city }}</li>
                                                    <li><span>Bedrooms :</span>{{ $property->beds }}</li>
                                                    <li><span>Bathrooms :</span> {{ $property->baths }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- <h4 class="content-title mt-4">Attachments</h4>
                                        <a href="javascript:void(0)" class="attach-file"><i class="far fa-file-pdf"></i>Demo Property
                                            Document </a> --}}
                                        <h4 class="mt-4">Property Brief</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="font-roboto">{{ $property->description }}</p>
                                            </div>
                                            {{-- <div class="col-sm-4">
                                                <p class="font-roboto">Connected residences owned by a single entity leased out, or owned separately with an agreement covering the relationship between units and common areas.</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="font-roboto">Residential real estate may contain either a single family or multifamily structure that is available for occupation or
                                                    for non-business purposes.</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade page-section" id="feature">
                                        <h4 class="content-title">features</h4>
                                        <div class="single-feature row">
                                            <div class="col-xl-3 col-6">
                                                <ul>
                                                    <li>
                                                        <i class="fas fa-wifi"></i> Free Wi-Fi
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-hands"></i> Elevator Lift
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-power-off"></i> Power Backup
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-car"></i> free Parking in the area
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-6">
                                                <ul>
                                                    <li>
                                                        <i class="fas fa-user-shield"></i> Security Guard
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-video"></i> CCTV
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-door-open"></i> Emergency Exit
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-shower"></i> Shower
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-6">
                                                @php
                                                    $featureIcons = [
                                                        'Swimming Pool' => 'fas fa-swimmer',
                                                        'Gym' => 'fas fa-dumbbell',
                                                        'Garage' => 'fas fa-car',
                                                        'Garden' => 'fas fa-leaf',
                                                        'Fireplace' => 'fas fa-fire'
                                                    ];

                                                    $features = is_string($property->additional_features) ? json_decode($property->additional_features, true) : $property->additional_features;
                                                @endphp

                                                <ul>
                                                    @foreach($features as $feature)
                                                        <li>
                                                            <i class="{{ $featureIcons[$feature] ?? 'fas fa-check' }}"></i> {{ $feature }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade page-section ratio3_2" id="gallery">
                                        <h4 class="content-title">Gallery</h4>
                                        <div class="single-gallery">
                                            <!-- Large Image Slider (Main Image) -->
                                            <div class="gallery-for">
                                                @foreach($property->images as $key => $image)
                                                    <div class="{{ $key == 0 ? 'large-image' : '' }}">
                                                        <img src="{{ asset($image->image_url) }}" class="bg-img" alt="Property Image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Thumbnail Images Slider -->
                                            <div class="gallery-nav">
                                                @foreach($property->images as $image)
                                                    <div>
                                                        <img src="{{ asset($image->image_url) }}" class="img-fluid thumbnail-img" alt="Thumbnail Image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade page-section" id="location-map">
                                        <h4 class="content-title">location</h4>
                                        <iframe title="realestate location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="desc-box">
                                <div class="page-section">
                                    <h4 class="content-title">Reviews</h4>
                                    <div class="review">
                                        <div class="review-box">
                                            <div class="media">
                                                <img src="../assets/images/avatar/3.jpg" class="img-70" alt="">
                                                <div class="media-body">
                                                    <h6>Olive Yew</h6>
                                                    <p>Sep 13, 2022</p>
                                                    <p class="mb-0">The location, view from the rooms are just awesome. Very cool landscaping has been done Around the hotel.
                                                        There are small activities that you can indulge with your family.</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-box review-child">
                                            <div class="media">
                                                <img src="../assets/images/avatar/4.jpg" class="img-70" alt="">
                                                <div class="media-body">
                                                    <h6>Allie Grater</h6>
                                                    <p>Sep 25, 2022</p>
                                                    <p class="mb-0">We were there for 3 nights and hotel was too good. Greenery was flaunting everywhere. There were games kept for our
                                                        entertainment.</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-box">
                                            <div class="media">
                                                <img src="../assets/images/avatar/2.jpg" class="img-70" alt="">
                                                <div class="media-body">
                                                    <h6>Walter Melon</h6>
                                                    <p>Oct 20, 2022</p>
                                                    <p class="mb-0">There are small activities that you can indulge with your family. Very cool landscaping has been done Around the hotel. The location, view from the rooms are just awesome.</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <h4 class="content-title">Write a Review</h4>
                                    <form class="review-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Comment"></textarea>
                                        </div>
                                        <button type="submit" onclick="document.location='submit-property.html'" class="btn btn-gradient color-2 btn-pill">Submit</button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="property-section p-t-40">
                        <div class="title-3 text-start inner-title">
                            <h2>Related Properties</h2>
                        </div>
                        <div class="row ratio_65">
                            <div class="col-12 property-grid-2">
                                <div class="property-2 row column-sm zoom-gallery property-label property-grid">
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/10.jpg" class="bg-img" alt="">
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/5.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/3.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/4.jpg" class="bg-img" alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-shadow">sale</span>
                                                    </div>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>25</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="property-details">
                                                <span class="font-roboto">France</span>
                                                <a href="single-property-8.html">
                                                    <h3>Little Acorn Farm</h3>
                                                </a>
                                                <h6>$6558.00*</h6>
                                                <p class="font-roboto">Real estate is divided into several categories, including residential property, commercial property and industrial property.</p>
                                                <ul>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : 5000</li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>August 4, 2022</span>
                                                    <button type="button"  onclick="document.location='single-property-8.html'" class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/14.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/6.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/10.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/9.jpg" class="bg-img" alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-dark">no fees</span>
                                                    </div>
                                                    <span class="label label-success">open house</span>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>42</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-details">
                                                <span class="font-roboto">brazil</span>
                                                <a href="single-property-8.html">
                                                    <h3>Hidden Spring Hideway</h3>
                                                </a>
                                                <h6>$9554.00*</h6>
                                                <p class="font-roboto">An interior designer is someone who plans,researches,coordinates,management and manages such enhancement projects.</p>
                                                <ul>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : 5000</li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>July 18, 2022</span>
                                                    <button type="button"  onclick="document.location='single-property-8.html'" class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/12.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/10.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/6.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/9.jpg" class="bg-img" alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-shadow">sale</span>
                                                    </div>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>10</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-details">
                                                <span class="font-roboto">usa</span>
                                                <a href="single-property-8.html">
                                                    <h3>Home in Merrick Way</h3>
                                                </a>
                                                <h6>$4513.00*</h6>
                                                <p class="font-roboto">The most common and most absolute type of estate, the tenant enjoys the greatest discretion over the disposal of the property.</p>
                                                <ul>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : 5000</li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>January 6, 2022</span>
                                                    <button type="button"  onclick="document.location='single-property-8.html'" class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/16.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/5.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/4.jpg" class="bg-img" alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/3.jpg" class="bg-img" alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-dark">no fees</span>
                                                    </div>
                                                    <span class="label label-success">open house</span>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>25</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip" data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-details">
                                                <span class="font-roboto">brazil</span>
                                                <a href="single-property-8.html">
                                                    <h3>Magnolia Ranch</h3>
                                                </a>
                                                <h6>$9554.00*</h6>
                                                <p class="font-roboto">Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef
                                                    kitchen opening…</p>
                                                <ul>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : 5000</li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>May 14, 2022</span>
                                                    <button type="button"  onclick="document.location='single-property-8.html'" class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="left-sidebar sticky-cls single-sidebar">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <h6>Contact Info</h6>
                                <div class="category-property">
                                    <div class="agent-info">
                                        <div class="media">
                                            <img src="{{ asset($property->agent->img ?? 'assets/images/default-agent.png') }}"
                                                 class="img-50" alt="Agent Image">
                                            <div class="media-body ms-2">
                                                <h6>{{ $property->agent->name ?? 'Unknown Agent' }}</h6>
                                                <p>{{ $property->agent->email ?? 'No Email Available' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <i data-feather="map-pin" class="me-2"></i>
                                            {{ $property->agent->address ?? 'No Address Available' }}
                                        </li>
                                        <li>
                                            <i data-feather="phone-call" class="me-2"></i>
                                            {{ $property->agent->phone_number ?? 'No Contact Available' }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="advance-card">
                                <h6>Request exploration</h6>
                                <div class="category-property">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input
                                            placeholder="phone number"
                                            class="form-control"
                                            name="mobnumber"
                                            id="tbNumbers"
                                            oninput="maxLengthCheck(this)"
                                            type = "tel"
                                            onkeypress="javascript:return isNumber(event)"
                                            maxlength = "9"
                                            required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Message" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" onclick="document.location='user-listing.html'" class="btn btn-gradient color-2 btn-block btn-pill">Submit
                                            Request</button>
                                    </form>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>filter</h6>
                                <div class="row gx-2">
                                    <div class="col-12">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Property
                                                    Status</span> <i class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Property Status</a>
                                                <a class="dropdown-item" href="javascript:void(0)">For Rent</a>
                                                <a class="dropdown-item" href="javascript:void(0)">For Sale</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Property
                                                    Type</span> <i class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Property Type</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Apartment</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Family House</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Cottage</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Condominium</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Property
                                                    Location</span> <i class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Property Location</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Austria</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Brazil</a>
                                                <a class="dropdown-item" href="javascript:void(0)">New york</a>
                                                <a class="dropdown-item" href="javascript:void(0)">USA</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>Max
                                                    Rooms</span> <i class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Max Rooms</a>
                                                <a class="dropdown-item" href="javascript:void(0)">1</a>
                                                <a class="dropdown-item" href="javascript:void(0)">2</a>
                                                <a class="dropdown-item" href="javascript:void(0)">3</a>
                                                <a class="dropdown-item" href="javascript:void(0)">4</a>
                                                <a class="dropdown-item" href="javascript:void(0)">5</a>
                                                <a class="dropdown-item" href="javascript:void(0)">6</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Bed</span>
                                                <i class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Bed</a>
                                                <a class="dropdown-item" href="javascript:void(0)">1</a>
                                                <a class="dropdown-item" href="javascript:void(0)">2</a>
                                                <a class="dropdown-item" href="javascript:void(0)">3</a>
                                                <a class="dropdown-item" href="javascript:void(0)">4</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Bath</span> <i
                                                    class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Bath</a>
                                                <a class="dropdown-item" href="javascript:void(0)">1</a>
                                                <a class="dropdown-item" href="javascript:void(0)">2</a>
                                                <a class="dropdown-item" href="javascript:void(0)">3</a>
                                                <a class="dropdown-item" href="javascript:void(0)">4</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Agencies</span> <i
                                                    class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Agencies</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Lincoln</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Blue Sky</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Zephyr</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Premiere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="price-range">
                                            <label for="amount">Price : </label>
                                            <input type="text" id="amount" readonly>
                                            <div id="slider-range" class="theme-range-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="price-range">
                                            <label for="amount">Area : </label>
                                            <input type="text" id="amount1" readonly>
                                            <div id="slider-range1" class="theme-range-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="list-left-sidebar.html" class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search </a>
                                    </div>
                                </div>
                            </div>
                           <div class="advance-card feature-card">
                                <h6>Featured</h6>
                                <div class="feature-slider">
                                    <div>
                                        <img src="../assets/images/property/4.jpg" class="bg-img" alt="">
                                        <div class="bottom-feature">
                                            <h5>Neverland</h5>
                                            <h6>$13,000 <small>/ start from</small></h6>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="../assets/images/property/16.jpg" class="bg-img" alt="">
                                        <div class="bottom-feature">
                                            <h5>Neverland</h5>
                                            <h6>$13,000 <small>/ start from</small></h6>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="../assets/images/property/14.jpg" class="bg-img" alt="">
                                        <div class="bottom-feature">
                                            <h5>Neverland</h5>
                                            <h6>$13,000 <small>/ start from</small></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="labels-left">
                                    <span class="label label-success">featured</span>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Recently Added</h6>
                                <div class="recent-property">
                                    <ul>
                                        <li>
                                            <div class="media">
                                                <img src="../assets/images/property/9.jpg" class="img-fluid" alt="">
                                                <div class="media-body">
                                                    <h5>Sea Breezes</h5>
                                                    <span>$9800 / <span>Month</span></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img src="../assets/images/property/10.jpg" class="img-fluid" alt="">
                                                <div class="media-body">
                                                    <h5>Orchard House</h5>
                                                    <span>$7500 / <span>Month</span></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img src="../assets/images/property/11.jpg" class="img-fluid" alt="">
                                                <div class="media-body">
                                                    <h5>Neverland</h5>
                                                    <span>$5000 / <span>Month</span></span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Mortgage</h6>
                                <div class="category-property">
                                    <form>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" placeholder="Loan Amount" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" placeholder="Down Payment" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">%</span>
                                            <input type="number" class="form-control" placeholder="Rate of Interest" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" placeholder="Number Of years" required>
                                        </div>
                                        <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill">Calculate</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- single property end -->

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
                            <li><a href="layout-2.html">Home</a></li>
                            <li><a href="terms-conditions.html">Terms</a></li>
                            <li><a href="privacy-policy.html">Privacy policy</a></li>
                            <li><a href="contact-2.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- video modal start -->
    <div class="modal fade video-modal" id="videomodal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <iframe title="realestate" src="https://www.youtube.com/embed/Sz_1tkcU0Co" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- video modal end -->

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

    @include('frontend.footer-script')
    @yield('script')
<script>
$(document).ready(function () {
    if ($('.gallery-for').length && $('.gallery-nav').length) {
        // Main Image Slider
        $('.gallery-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.gallery-nav'
        });

        // Thumbnail Image Slider
        $('.gallery-nav').slick({
            slidesToShow: 4, // Adjust number of thumbnails
            slidesToScroll: 1,
            asNavFor: '.gallery-for',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 3 }
                },
                {
                    breakpoint: 480,
                    settings: { slidesToShow: 2 }
                }
            ]
        });

        // Force recalculation of widths
        setTimeout(() => {
            $('.gallery-nav, .gallery-for').slick('setPosition');
        }, 500);
    }
});


</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/single-property-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:50 GMT -->
</html>
