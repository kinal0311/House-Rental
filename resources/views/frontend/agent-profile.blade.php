<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/agent-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:05 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> House Retal </title>
    @include('frontend.layoutcss')

</head>

<body>

@include('frontend.header-orange')


    <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0">
        <img src="{{ URL::asset('sheltos/assets/images/inner-background.jpg')}}" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Agent Profile</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agent Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- agent profile section start -->
    <section class="agent-section property-section agent-profile-wrap">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8 property-grid-2">
                    <div class="our-agent theme-card">
                        <div class="row">
                            <div class="col-sm-6 ratio_landscape">
                                <div class="agent-image">
                                    <!-- Display agent's avatar -->
                                    <img src="{{ asset($agent->img ?? 'default-avatar.jpg') }}" class="img-fluid bg-img" alt="{{ $agent->name }}">
                                    <span class="label label-shadow">{{ $agent->properties->count() }} Properties</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="our-agent-details">
                                    <h3 class="f-w-600">{{ $agent->name }}</h3>
                                    <h6>Real estate Property Agent</h6>
                                    <ul>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="map-pin"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6>{{ $agent->address }}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="phone-call"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6>{{ $agent->phone_number }}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="mail"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6>{{ $agent->email }}</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="agent-social">
                                    <li><a href="{{ $agent->facebook_url }}" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $agent->twitter_url }}" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $agent->google_url }}" class="google"><i class="fab fa-google"></i></a></li>
                                    <li><a href="{{ $agent->linkedin_url }}" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="about-agent theme-card">
                        <h3>About the agent</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="font-roboto">{{ $agent->description }}</p>
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
                    {{-- <div class="agent-property">
                        <div class="filter-panel">
                            <div class="top-panel">
                                <div>
                                    <h3>Properties Listing</h3>
                                    <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                                </div>
                                <ul class="grid-list-filter">
                                    <li>
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>Sort by
                                                    Newest</span> <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <a class="dropdown-item" href="javascript:void(0)">Sort by Newest</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Sort by Oldest</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Sory by featured</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Sort by price(Low to
                                                    high)</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="grid-btn active">
                                        <a href="javascript:void(0)">
                                            <i data-feather="grid"></i>
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <i data-feather="list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="property-2 row column-sm zoom-gallery property-label property-grid">
                            <div class="col-md-6 wow fadeInUp">
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
                                            <span>14</span>
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
                                        <p class="font-roboto">Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef
                                            kitchen opening…</p>
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
                            <div class="col-md-6 wow fadeInUp">
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
                                            <span>15</span>
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
                                        <p class="font-roboto">This home provides wonderful entertaining spaces with a chef
                                            kitchen opening. Elegant retreat in a quiet Coral Gables setting.</p>
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
                            <div class="col-md-6 wow fadeInUp">
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
                                            <span>16</span>
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
                                        <p class="font-roboto">How they are connected to neighbouring residences and land. Residences can be classified in flat or apartment.</p>
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
                            <div class="col-md-6 wow fadeInUp">
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
                                            <span>18</span>
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
                                        <p class="font-roboto">An interior designer is someone who plans,researches,coordinates,management and manages such enhancement projects.</p>
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
                    </div> --}}
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="left-sidebar single-sidebar sticky-cls">
                        <div class="filter-cards">
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
                                        <button type="submit" onclick="document.location='#'" class="btn btn-gradient color-2 btn-block btn-pill">Submit
                                            Request</button>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="advance-card">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agent profile section end -->

@include('frontend.footer-orange')
@include('frontend.footer-script')


</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/agent-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:05 GMT -->
</html>
