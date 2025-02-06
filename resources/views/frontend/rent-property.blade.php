<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/list-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:45 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>House Rental</title>

@include('frontend.layoutcss')
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
                    <h2>Left sidebar</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Left sidebar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- property grid start -->
    <section class="property-section">
        <div class="container">
            <div class="row ratio_63">
                <div class="col-xl-3 col-lg-4">
                    <div class="left-sidebar">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <div class="back-btn d-lg-none d-block">
                                    Back
                                </div>
                                <h5 class="mb-0 advance-title">Advance search </h5>
                            </div>
                            <div class="advance-card">
                                <h6>filter</h6>
                                <div class="row gx-2">
                                    <div class="col-12">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik"
                                                data-bs-toggle="dropdown"><span>Property Status</span> <i
                                                    class="fas fa-angle-down"></i></span>
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
                                                data-bs-toggle="dropdown"><span>Property Type</span> <i
                                                    class="fas fa-angle-down"></i></span>
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
                                                data-bs-toggle="dropdown"><span>Property Location</span> <i
                                                    class="fas fa-angle-down"></i></span>
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
                                                data-bs-toggle="dropdown"><span>Bed</span> <i
                                                    class="fas fa-angle-down"></i></span>
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
                                        <a href="list-right-sidebar.html" class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search </a>
                                    </div>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Category</h6>
                                <div class="category-property">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="fas fa-arrow-right me-2"></i>Apartment <span
                                                    class="float-end">(15)</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-arrow-right me-2"></i>Villa <span
                                                    class="float-end">(10)</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-arrow-right me-2"></i>Family House <span
                                                    class="float-end">(8)</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-arrow-right me-2"></i>Town House <span
                                                    class="float-end">(5)</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-arrow-right me-2"></i>Offices <span
                                                    class="float-end">(12)</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-arrow-right me-2"></i>Duplexes <span
                                                    class="float-end">(3)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Contact Info</h6>
                                <div class="category-property">
                                    <ul>
                                        <li>
                                            <i data-feather="map-pin" class="me-2"></i>A-32, Albany, Newyork.
                                        </li>
                                        <li>
                                            <i data-feather="phone-call" class="me-2"></i>(+066) 518 - 457 - 5181
                                        </li>
                                        <li>
                                            <i data-feather="mail" class="me-2"></i>Contact@gmail.com
                                        </li>
                                    </ul>
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 property-grid-2">
                    <div class="filter-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Properties Listing</h2>
                                <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                            </div>
                            <ul class="grid-list-filter d-flex">
                                <li>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>Sort by
                                                Newest</span> <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                                        <div class="dropdown-menu text-start">
                                            <a class="dropdown-item" href="javascript:void(0)">Sort by Newest</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Sort by Oldest</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Sory by featured</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Sort by price (Low to
                                                high)</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="collection-grid-view">
                                    <ul>
                                        <li><img src="../assets/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                        <li><img src="../assets/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                        <li><img src="../assets/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                    </ul>
                                </li>
                                <li class="grid-btn">
                                    <a href="javascript:void(0)" class="grid-layout-view">
                                        <i data-feather="grid"></i>
                                    </a>
                                </li>
                                <li class="list-btn active">
                                    <a href="javascript:void(0)" class="list-layout-view">
                                        <i data-feather="list"></i>
                                    </a>
                                </li>
                                <li class="d-lg-none d-block">
                                    <div>
                                        <h6 class="mb-0 mobile-filter font-roboto">Advance search <i
                                                data-feather="align-center" class="float-end"></i></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="property-wrapper-grid list-view">
                        <div class="property-2 row column-sm zoom-gallery property-label property-grid list-view">
                            @foreach($properties as $property)
                            <div class="col-md-6 col-md-12 wow fadeInUp">
                                <div class="property-box">
                                    <div class="property-image">
                                        <div class="property-slider">
                                            @foreach($property->images as $image)
                                            <a href="javascript:void(0)">
                                                <img src="{{ URL::asset($image->image_url) }}" class="bg-img" alt="">
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="labels-left">
                                            <div>
                                                <span class="label label-shadow
                                                @if($property->status == 'Sale')
                                                    bg-info
                                                @elseif($property->status == 'Sold')
                                                    bg-danger
                                                @elseif($property->status == 'Rent')
                                                    bg-success
                                                @endif
                                            ">{{ $property->status }}</span>
                                            </div>
                                        </div>
                                        <div class="seen-data">
                                            <i data-feather="camera"></i>
                                            <span>{{ $property->images->count() }}</span>
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
                                        <span class="font-roboto">{{ $property->city }}</span>
                                        <a href="single-property-8.html">
                                            <h3>{{ $property->address }}</h3>
                                        </a>
                                        <h6>${{ $property->price }}*</h6>
                                        <p class="font-roboto">{{ $property->description }}</p>
                                        <ul>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : {{ $property->beds }}</li>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : {{ $property->baths }}</li>
                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : {{ $property->area }}</li>
                                        </ul>
                                        <div class="property-btn d-flex">
                                            {{-- <span>August 4, 2022</span> --}}
                                            <a href="{{ route('single-property.show', $property->id) }}" class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <nav class="theme-pagination">
                        {{ $properties->links('pagination::bootstrap-5') }}
                        {{-- <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul> --}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- property grid end -->

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
<script>
    // $(document).on('click', '.theme-pagination', function(event) {
    //     event.preventDefault(); // Prevent full page reload

    //     let page = $(this).attr('href').split('page=')[1]; // Get page number
    //     fetchProperties(page);
    // });

    // function fetchProperties(page) {
    //     $.ajax({
    //         url: "/properties?page=" + page, // Update URL if needed
    //         success: function(data) {
    //             $("#property-list").html(data); // Replace content with new data
    //         },
    //         error: function() {
    //             alert("Failed to load data.");
    //         }
    //     });
    // }
</script>



</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/list-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:45 GMT -->
</html>
