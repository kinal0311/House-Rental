<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.pixelstrap.com/sheltos/main/single-property-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:50 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Rental</title>
    @include('frontend.layoutcss')

    <style>
        .slick-slide {
            min-width: 100px !important;
            width: auto !important;
        }
        .slick-track {
            display: flex !important;
        }
        .slick-slide img {
            /* width: 100%; */
            /* height: auto; */
            display: block;
        }
        .gallery-for, .gallery-nav {
            max-width: 100%;
            overflow: hidden;
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
                        <div class="mt-2">
                            @if($property->status !== 'Sold')
                                <a href="javascript:void(0)" class="btn btn-gradient btn-pill color-2" onclick="checkAuth(event, {{ $property->id }})">
                                    <i class="fa-solid fa-bookmark"></i> Book Now
                                </a>
                            @endif
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
                                    {{-- <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#video">video</a>
                                    </li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#floor_plan">Floor
                                            plan</a></li> --}}
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

                                        <!-- Large Image Slider (Bootstrap Carousel) -->
                                        <div id="propertyGallery" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($property->images as $key => $image)
                                                    <div class="carousel-item @if($key == 0) active @endif" style="height: 500px; opacity: none;">
                                                        <img src="{{ asset($image->image_url) }}" class="d-block h-100 w-100" alt="Property Image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Carousel Controls -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#propertyGallery" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#propertyGallery" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                        <!-- Thumbnail Navigation -->
                                        <div class="mt-3 d-flex justify-content-center">
                                            @foreach($property->images as $key => $image)
                                                <img src="{{ asset($image->image_url) }}" class="img-thumbnail mx-1" style="width: 80px; cursor: pointer; opacity: 0.5;" alt="Thumbnail Image" onclick="changeSlide({{ $key }})">
                                            @endforeach
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
                                        <a href="#" class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search </a>
                                    </div>
                                </div>
                            </div> --}}
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



    <!-- video modal start -->
    {{-- <div class="modal fade video-modal" id="videomodal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×gffgd</span></button>
                    <iframe title="realestate" src="https://www.youtube.com/embed/Sz_1tkcU0Co" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- video modal end -->

@include('frontend.footer-orange')
    <!-- customizer end -->

    @include('frontend.footer-script')
    @yield('script')
{{-- <script>
  $(document).ready(function(){
    // Initialize Slick for large image slider
    $('.gallery-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true, // For fade effect between images
      asNavFor: '.gallery-nav' // Sync with the thumbnail slider
    });

    // Initialize Slick for thumbnail images slider
    $('.gallery-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.gallery-for',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      centerPadding: '0',
      arrows: true
    });
  });

</script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function changeSlide(index) {
        let carousel = document.querySelector('#propertyGallery');
        let items = carousel.querySelectorAll('.carousel-item');
        let thumbnails = document.querySelectorAll('.img-thumbnail');

        items.forEach((item, i) => {
            item.classList.remove('active');
            item.style.opacity = '0.5';
        });

        thumbnails.forEach((thumb) => {
            thumb.style.opacity = '0.5';
        });

        items[index].classList.add('active');
        items[index].style.opacity = '1';
        thumbnails[index].style.opacity = '1';
    }

    function checkAuth(event, propertyId) {
    event.preventDefault(); // Prevent default anchor action

    let isAuthenticated = "{{ auth()->check() }}" === "1"; // Check if the user is logged in

    if (isAuthenticated) {
        // ✅ Fix: Pass propertyId dynamically
        window.location.href = "{{ route('booking', ':id') }}".replace(':id', propertyId);
    } else {
        window.location.href = "{{ route('login-user') }}";
    }
}




</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/single-property-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:50 GMT -->
</html>
