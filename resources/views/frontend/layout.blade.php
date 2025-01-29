<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="description" content="Sheltos - Filter search with slider home page">
    <meta name="keywords" content="sheltos">
    <meta name="author" content="sheltos"> --}}
    {{-- <link rel="icon" href="../assets2/images/favicon.png" type="image/x-icon" /> --}}
    <title>House Rental</title>

    {{-- All CSS --}}
    @include('frontend.layoutcss')

</head>

<body>

    <!-- Loader start -->
    <div class="loader-wrapper">
        <div class="row loader-text">
            <div class="col-12">
                <img src="{{ URL::asset('sheltos/assets/images/loader/loader.gif') }}" class="img-fluid" alt="">
            </div>
            <div class="col-12">
                <div>
                    <h3 class="mb-0">Please wait Real estate Template loading...</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Loader end -->

    <!-- header start -->
    <header class="header-1 header-6">
        @include('frontend.header')
    </header>
    <!--  header end -->

    <!-- home section start -->
    <section class="home-section layout-1 layout-6">
        @include('frontend.home-section')
    </section>
    <!-- home section end -->

    <!-- property section start -->
    <section class="property-section slick-between slick-shadow property-color-6">
        <div class="container">
            <div class="row ratio_landscape">
                <div class="col">
                    <div class="title-1 color-6">
                        <span class="label label-gradient color-6">Sale</span>
                        <h2>Latest For Sale</h2>
                        <hr>
                    </div>

                    <div class="listing-hover-property row">
                        @foreach($properties as $property)
                        <div class="col-xl-4 col-md-6 wow fadeInUp">
                            <div class="property-box">
                                  <!-- Get the first image related to the current property -->
                                @php
                                $firstImage = $property->images->first();
                                @endphp

                                @if($firstImage)

                                <div class="property-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ URL::asset($firstImage->image_url) }}" class="bg-img" alt="">
                                        <div class="labels-left">
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
                                    </a>

                                    <div class="bottom-property">
                                        <div class="d-flex">
                                            <div>
                                                <h5><a href="single-property-6.html">{{ $property->city }}</a></h5>
                                                <h6>{{ $property->price }}<small>/ start from</small></h6>
                                            </div>
                                            <button type="button" class="btn btn-gradient color-6 mt-3" onclick="document.location='single-property-8.html'">Details</button>
                                        </div>
                                        <div class="overlay-option">
                                            <ul>
                                                <li>
                                                    <span>Beds</span>
                                                    <h6>{{ $property->beds }}</h6>
                                                </li>
                                                <li>
                                                    <span>Baths</span>
                                                    <h6>{{ $property->baths }}</h6>
                                                </li>
                                                <li>
                                                    <span>Rooms</span>
                                                    <h6>{{ $property->max_rooms }}</h6>
                                                </li>
                                                <li>
                                                    <span>Area</span>
                                                    <h6>{{ $property->area }}m<sup>2</sup></h6>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- property section end -->

    <!-- feature section start -->
    <section class="feature-section banner-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 text-white">
                        <span class="label label-gradient color-6">Our</span>
                        <h2>Featured Property</h2>
                        <hr>
                    </div>
                    <div class="feature-1 arrow-light">
                        <div>
                            <div class="feature-wrapper">
                                @foreach ($properties as $property)
                                    @if ($property->property_type == 'family house') <!-- Only show Family Home -->
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-3">
                                                <div class="feature-left">
                                                    <div class="property-details">
                                                        <span class="font-roboto">{{ $property->city }}</span>
                                                        <a href="single-property-8.html">
                                                            <h3 class="d-flex">{{ $property->address }}
                                                                <span>
                                                                    <span class="label label-dark label-pill">{{ $property->property_type }}</span>
                                                                </span>
                                                            </h3>
                                                        </a>
                                                        <h6 class="color-6">${{ number_format($property->price, 2) }}*</h6>
                                                        <p class="font-roboto">
                                                            {{ $property->description }}
                                                        </p>
                                                        <ul>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : {{ $property->beds }}</li>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : {{ $property->baths }}</li>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : {{ $property->area }}</li>
                                                        </ul>
                                                        <a href="user-favourites.html">
                                                            <span class="round-half color-6">
                                                                <i data-feather="heart"></i>
                                                            </span>
                                                        </a>
                                                        <div class="property-btn">
                                                            <a href="single-property-8.html" class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-8 col-lg-9 order-md">
                                                @php
                                                    $firstImage = $property->images->first();
                                                @endphp

                                                @if($firstImage)
                                                <div class="feature-image">
                                                    <img src="{{ URL::asset($firstImage->image_url) }}" alt="" class="bg-img">
                                                    <h4>FAMILY HOME</h4>
                                                    <span class="box-color"></span>
                                                    <span class="signature">
                                                        <img src="{{ URL::asset('sheltos/assets/images/signature/1.png') }}" alt="">
                                                    </span>
                                                    <span class="label label-white label-lg color-6">Featured</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- feature section end -->

    <!-- property section start -->
    <section class="property-section property-color-6">
        <div class="container">
            <div class="row ratio_55">
                <div class="col">
                    <div class="title-1 color-6">
                        <span class="label label-gradient color-6">Rent</span>
                        <h2>Latest For Rent</h2>
                        <hr>
                    </div>

                    <div class="property-2 row column-space color-6">
                        @foreach($properties as $property)
                        <div class="col-xl-4 col-md-6 wow fadeInUp">
                            <div class="property-box">
                                <div class="property-image">
                                    <div class="property-slider color-6">
                                        @foreach($property->images as $image) <!-- Loop through the property images -->
                                        <a href="javascript:void(0)">
                                            <img src="{{ URL::asset($image->image_url) }}" class="bg-img" alt="Property Image">
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
                                    <span class="font-roboto">{{ $property->city }}</span>
                                    <a href="single-property-8.html">
                                        <h3>{{ $property->address }}</h3>
                                    </a>
                                    <h6 class="color-6">${{ $property->price }}*</h6>
                                    <p class="font-roboto">{{ $property->description }}</p>
                                    <ul>
                                        <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : {{ $property->beds }}</li>
                                        <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : {{ $property->baths }}</li>
                                        <li><img src="https://themes.pixelstrap.com/sheltos/assets2/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : {{ $property->area }}m<sup>2</sup></li>
                                    </ul>
                                    <div class="property-btn d-flex">
                                        {{-- <span>{{ $property->created_at }}</span>    --}}
                                        <button type="button"  onclick="document.location='single-property-8.html'" class="btn btn-dashed btn-pill color-6">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <!-- property section end -->

    <!--our new offer section start -->
    <section class="offer-section banner-section banner-4 slick-between ">
        @include('frontend.offer-section')
    </section>
    <!--our new offer section end -->

    <!-- find properties section start -->
    <section class="my-gallery gallery-6">
        @include('frontend.my-gallery')
    </section>
    <!-- find properties section end -->

    <!-- banner section start -->
    <section class="banner-section banner-4 parallax-image">
        @include('frontend.banner-section')
    </section>
    <!-- banner section end -->

    <!-- about section start -->
    <section class="about-section slick-between about-color6">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 color-6">
                        <span class="label label-gradient color-6">Agent</span>
                        <h2>Meet our Agent</h2>
                        <hr>
                    </div>
                    <div class="about-1 about-wrap arrow-white color-6">
                        <div>
                            <div class="about-content row">
                                @foreach ($agents as $agent)
                                <div class="col-xl-6">
                                    <div class="about-image">
                                        <img src="{{ URL::asset($agent->profile_image ?: 'path/to/default/image.jpg') }}" class="img-fluid" alt="">
                                        <div class="about-overlay"></div>
                                        <div class="overlay-content">
                                            <ul>
                                                <li><a href="https://accounts.google.com/"><img
                                                            src="{{ URL::asset('sheltos/assets/images/about/icon-1.png') }}" alt=""></a>
                                                </li>
                                                <li><a href="https://twitter.com/"><img
                                                            src="{{ URL::asset('sheltos/assets/images/about/icon-2.png') }}" alt=""></a>
                                                </li>
                                                <li><a href="https://www.facebook.com/"><img
                                                            src="{{ URL::asset('sheltos/assets/images/about/icon-3.png') }}" alt=""></a>
                                                </li>
                                            </ul>
                                            <span>Connect</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="our-details">
                                        <a href="agent-profile.html"><h6 class="d-flex">{{ $agent->name }}  <span class="label-heart color-6 ms-2"><i
                                                    data-feather="heart"></i></span></h6></a>
                                        <h3>Communicating with..</h3>
                                        <span class="font-roboto"><i data-feather="mail" class="me-1"></i>Leeva@inspirythemes.com</span>
                                        <p class="font-roboto">{{ $agent->description }} </p>
                                        <a href="agent-profile.html" class="btn btn-gradient btn-pill color-6 mt-2"><i data-feather="eye"></i>View Portfolio</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- testimonial section start -->
    <section class="testimonial-bg testimonial-layout6">
        @include('frontend.testimonial-section')
    </section>
    <!-- testimonial section end -->

    <!-- brand 2 start -->
    <section class="small-section">
        @include('frontend.small-section')
    </section>
    <!-- brand 2 end -->

    <!-- footer start -->
    <footer class="footer-brown">
        @include('frontend.footer')
    </footer>
    <!-- footer end -->

    <!-- tap to top start -->
    <div class="tap-top color-6">
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
                    <h6 class="color-6">Layout type</h6>
                </div>
                <div class="option-setting">
                    <span>Light</span>
                    <label class="switch">
                        <input type="checkbox" name="chk1" value="option" class="setting-check"><span
                            class="switch-state"></span>
                    </label>
                    <span>Dark</span>
                </div>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-6">Layout Direction</h6>
                </div>
                <div class="option-setting">
                    <span>LTR</span>
                    <label class="switch">
                        <input type="checkbox" name="chk2" value="option" class="setting-check1"><span
                            class="switch-state"></span>
                    </label>
                    <span>RTL</span>
                </div>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-6">Unlimited Color</h6>
                </div>
                <div class="option-setting unlimited-color-layout">
                    <input id="ColorPicker8" type="color" value="#2c2e97" name="Default">
                    <input id="ColorPicker9" type="color" value="#4b55c4" name="Default">
                </div>
            </div>
        </div>
    </div>
    <!-- customizer end -->

{{-- All js --}}
@include('frontend.footer-script')

</body>
@yield('script')

<script src="{{asset('assets/js/pages/frontend/layout.js')}}"></script>

<!-- Mirrored from themes.pixelstrap.com/sheltos/main/layout-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:02 GMT -->
</html>
