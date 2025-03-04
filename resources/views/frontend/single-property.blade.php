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

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: left;
            gap: 10px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: gold;
        }

        /* Hover effect for text */
        .feature-item:hover .bottom-feature {
            opacity: 0.7 !important;
        }

        /* Smooth transition effect */
        .transition-opacity {
            transition: opacity 0.4s ease-in-out;
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
                            <div class="desc-box">
                                <div class="page-section">
                                    <h4 class="content-title">Reviews</h4>
                                    <div class="review">
                                        @if ($property->feedbacks && $property->feedbacks->count() > 0)
                                            @foreach ($property->feedbacks as $feedback)
                                                <div class="review-box">
                                                    <div class="media">
                                                        <img src="{{ asset($feedback->user->img) }}" class="img-70" alt="">
                                                        <div class="media-body">
                                                            <h6>{{ $feedback->user->name ?? 'Anonymous' }}</h6>
                                                            <p>{{ $feedback->created_at->format('M d, Y') }}</p>
                                                            <p class="mb-0">{{ $feedback->comment }}</p>
                                                        </div>
                                                        <div class="rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $feedback->rating)
                                                                    <i class="fas fa-star"></i>
                                                                @else
                                                                    <i class="far fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No reviews yet. Be the first to leave a review!</p>
                                        @endif
                                    </div>
                                    <hr />
                                    <h4 class="content-title">Write a Review</h4>
                                    <form class="review-form" action="{{ route('feedback.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{ auth('web')->check() ? auth('web')->user()->name : '' }}" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="{{ auth('web')->check() ? auth('web')->user()->email : '' }}" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <label>Rating:</label>
                                            <div class="rating">
                                                <input type="radio" name="rating" id="star5" value="5"><label for="star5">&#9733;</label>
                                                <input type="radio" name="rating" id="star4" value="4"><label for="star4">&#9733;</label>
                                                <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
                                                <input type="radio" name="rating" id="star2" value="2"><label for="star2">&#9733;</label>
                                                <input type="radio" name="rating" id="star1" value="1"><label for="star1">&#9733;</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" placeholder="Comment" required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-gradient color-2 btn-pill">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

                            {{-- <div class="advance-card">
                                <h6>Submit Your Feedback</h6>
                                <div class="category-property">
                                    <form id="feedbackForm" action="{{ route('feedback.store')}}" method="POST">
                                        @csrf
                                         <!-- Hidden field to send property_id -->
                                        <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                            value="{{ auth('web')->check() ? auth('web')->user()->name : '' }}" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                            value="{{ auth('web')->check() ? auth('web')->user()->email : '' }}" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <label>Rating:</label>
                                            <div class="rating">
                                                <input type="radio" name="rating" id="star5" value="5"><label for="star5">&#9733;</label>
                                                <input type="radio" name="rating" id="star4" value="4"><label for="star4">&#9733;</label>
                                                <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
                                                <input type="radio" name="rating" id="star2" value="2"><label for="star2">&#9733;</label>
                                                <input type="radio" name="rating" id="star1" value="1"><label for="star1">&#9733;</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="comment" placeholder="Your Feedback" name="comment" class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill">Submit Feedback</button>
                                    </form>
                                </div>
                            </div> --}}

                            <div class="advance-card feature-card">
                                <h6>Featured</h6>
                                <div class="feature-slider">
                                    @php
                                        // Get only one latest featured property
                                        $property = \App\Models\Property::where('property_status', 'featured')
                                            ->latest()
                                            ->first();

                                        // Fetch first image for that property
                                        $firstImage = $property ? \App\Models\PropertyImg::where('property_id', $property->id)->first() : null;
                                    @endphp

                                    @if($property)
                                        <div class="feature-item position-relative overflow-hidden">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset($firstImage?->image_url ?? 'assets/images/default.jpg') }}" class="bg-img w-100" alt="Property Image">
                                            </a>
                                            <div class="bottom-feature position-absolute bottom-0 start-0 w-100 bg-dark text-white text-center p-3 opacity-0 transition-opacity">
                                                <h5 class="mb-1">{{ $property->name }}</h5>
                                                <h6 class="mb-0">${{ number_format($property->price, 2) }} <small>/ start from</small></h6>
                                            </div>
                                        </div>
                                    @else
                                        <p>No featured property available.</p>
                                    @endif
                                </div>
                                <div class="labels-left">
                                    <span class="label label-success">featured</span>
                                </div>
                            </div>

                            <div class="advance-card">
                                <h6>Recently Added</h6>
                                <div class="recent-property">
                                    <ul>
                                        @php
                                            $latestProperties = \App\Models\Property::latest()->take(3)->with('images')->get();
                                        @endphp

                                        @foreach($latestProperties as $property)
                                            @php
                                                $firstImage = $property->images->first();
                                            @endphp
                                            <li>
                                                <div class="media">
                                                    <img src="{{ asset($firstImage?->image_url ?? 'assets/images/default.jpg') }}" class="img-fluid" alt="Property Image">
                                                    <div class="media-body">
                                                        <h5>{{ $property->property_type }}</h5>
                                                        <span>${{ number_format($property->price, 2) }} / <span>Month</span></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- single property end -->

    @include('frontend.footer-orange')
    <!-- customizer end -->

    @include('frontend.footer-script')
    @yield('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
//     $(document).ready(function(){
//     $('.feature-slider').slick({
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         autoplay: true,
//         autoplaySpeed: 3000,
//         arrows: false,
//         dots: true
//     });
// });

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
