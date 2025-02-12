<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/agent-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:05 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>House Rental</title>

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
                    <h2>Agent Grid</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agent Grid</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- agent grid section start -->
    <section class="agent-section property-section">
        <div class="container">
            <div class="row ratio2_3 agent-section property-section ">
                <div class="col-xl-9 col-lg-8 property-grid-3 agent-grids">
                    <div class="filter-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Agent Listing</h2>
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
                                <li class="grid-btn active">
                                    <a href="javascript:void(0)" class="grid-layout-view">
                                        <i data-feather="grid"></i>
                                    </a>
                                </li>
                                <li class="list-btn">
                                    <a href="javascript:void(0)" class="list-layout-view">
                                        <i data-feather="list"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="property-wrapper-grid">
                        <div class="property-2 row column-sm property-label property-grid">
                            @foreach($agents as $agent)
                            <div class="col-xl-4 col-md-6 wow fadeInUp">
                                <div class="property-box">
                                    <div class="agent-image">
                                        <div>
                                            <img src="{{ asset($agent->img ?? 'default-avatar.jpg') }}" class="bg-img" alt="">
                                            <span class="label label-shadow">{{ $agent->properties->count() }} properties</span>
                                            <div class="agent-overlay"></div>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="https://accounts.google.com/"><img src="{{ URL::asset('sheltos/assets/images/about/icon-1.png')}}" alt=""></a>
                                                    </li>
                                                    <li><a href="https://twitter.com/"><img src="{{ URL::asset('sheltos/assets/images/about/icon-2.png')}}" alt=""></a>
                                                    </li>
                                                    <li><a href="https://www.facebook.com/"><img src="{{ URL::asset('sheltos/assets/images/about/icon-3.png')}}" alt=""></a>
                                                    </li>
                                                </ul>
                                                <span>Connect</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="agent-content">
                                        <h3><a href="agent-profile.html">{{ $agent->name }}</a></h3>
                                        <p class="font-roboto">Real estate Agent</p>
                                        <ul class="agent-contact">
                                            <li>
                                                <i class="fas fa-phone-alt"></i>
                                                <span class="phone-number">+91 {{ $agent->phone_number }}</span>
                                                <span class="character">+91 **********</span>
                                                <span class="label label-light label-flat color-2">
                                                    show
                                                    <span>hide</span>
                                                </span>
                                            </li>
                                            <li><i class="fas fa-envelope"></i> {{ $agent->email }}</li>
                                            {{-- <li><i class="fas fa-fax"></i> 247 054 787</li> --}}
                                        </ul>
                                        <a href="{{ route('agent-profile', $agent->id) }}">View profile <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
                           <div class="advance-card feature-card">
                                <h6>Featured</h6>
                                <div class="feature-slider">
                                    <div>
                                        <img src="{{ URL::asset('sheltos/assets/images/property/4.jpg')}}" class="bg-img" alt="">
                                        <div class="bottom-feature">
                                            <h5>Neverland</h5>
                                            <h6>$13,000 <small>/ start from</small></h6>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ URL::asset('sheltos/assets/images/property/16.jpg')}}" class="bg-img" alt="">
                                        <div class="bottom-feature">
                                            <h5>Neverland</h5>
                                            <h6>$13,000 <small>/ start from</small></h6>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ URL::asset('sheltos/assets/images/property/14.jpg')}}" class="bg-img" alt="">
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
                                                <img src="{{ URL::asset('sheltos/assets/images/property/9.jpg')}}" class="img-fluid" alt="">
                                                <div class="media-body">
                                                    <h5>Sea Breezes</h5>
                                                    <span>$9800 / <span>Month</span></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img src="{{ URL::asset('sheltos/assets/images/property/10.jpg')}}" class="img-fluid" alt="">
                                                <div class="media-body">
                                                    <h5>Orchard House</h5>
                                                    <span>$7500 / <span>Month</span></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img src="{{ URL::asset('sheltos/assets/images/property/11.jpg')}}" class="img-fluid" alt="">
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
            </div>
        </div>
    </section>
    <!-- agent grid section end -->

@include('frontend.footer-orange')

@include('frontend.footer-script')

</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/agent-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:06 GMT -->
</html>
