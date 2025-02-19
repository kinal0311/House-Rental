<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/list-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:45 GMT -->
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
                    <h2>Rent Properties</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rent Properties</li>
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
                                <form id="filter-form" method="GET">
                                    @csrf
                                    <div class="row gx-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">Status</option>
                                                    <option value="Sale">For Sale</option>
                                                    <option value="Rent">For Rent</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="property_type" id="property_type" placeholder="Property Type">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Property Location">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control" name="max_rooms" id="max_rooms">
                                                    <option value="">Max Rooms</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control" name="beds" id="beds">
                                                    <option value="">Bed</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control" name="baths" id="baths">
                                                    <option value="">Bath</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
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
                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <button type="submit" class="btn btn-gradient color-2 btn-pill" id="search-btn2">Search</button>
                                            <button type="button" class="btn btn-dashed color-2 btn-pill" id="reset-btn">Refresh</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="advance-card">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 property-grid-2">
                    <div class="filter-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Rent Properties</h2>
                                <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                            </div>
                            <ul class="grid-list-filter d-flex">
                                <li class="collection-grid-view">
                                    <ul>
                                        <li><img src="{{ URL::asset('sheltos/assets/images/icon/2.png')}}" alt="" class="product-2-layout-view"></li>
                                        <li><img src="{{ URL::asset('sheltos/assets/images/icon/3.png')}}" alt="" class="product-3-layout-view"></li>
                                        <li><img src="{{ URL::asset('sheltos/assets/images/icon/4.png')}}" alt="" class="product-4-layout-view"></li>
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
                    <div class="property-wrapper-grid list-view" id="rentProperty">
                        <div class="property-2 row column-sm zoom-gallery property-label property-grid list-view" id="rentProperties-item">
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
                                            <a href="javascript:void(0);" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="Wishlist" onclick="addToWishlist({{ $property->id }}, event)">
                                                <i data-feather="heart" class="heart-icon"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="property-details">
                                        <span class="font-roboto">{{ $property->city }}</span>
                                        <a>
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
                    {{-- <nav class="theme-pagination">
                        {{ $properties->links('pagination::bootstrap-5') }}
                        <ul class="pagination">
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
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- property grid end -->

@include('frontend.footer-orange')
    <!-- customizer end -->
    @yield('script')
@include('frontend.footer-script')
<script>
$('#search-btn2').click(function(event) {
    event.preventDefault();

    // var status = $('#status').val();
    var property_type = $('#property_type').val();
    var address = $('#address').val();
    var max_rooms = $('#max_rooms').val();
    var beds = $('#beds').val();
    var baths = $('#baths').val();
      // Extract price and area values
    var priceMin = $("#slider-range").slider("values", 0);
    var priceMax = $("#slider-range").slider("values", 1);
    var areaMin = $("#slider-range1").slider("values", 0);
    var areaMax = $("#slider-range1").slider("values", 1);

    var searchUrl = "{{ route('rentSearchProperties') }}";  // Your route name

    $.ajax({
        url: searchUrl,
        method: 'GET',
        data: {
            // status: status,
            property_type: property_type,
            address: address,
            max_rooms: max_rooms,
            beds: beds,
            baths: baths,
            price_min: priceMin,
            price_max: priceMax,
            area_min: areaMin,
            area_max: areaMax
        },
        success: function(response) {
            console.log("response::::::", response);

            // Check if the 'html' array in the response is not empty and contains valid properties
            if (Array.isArray(response.html) && response.html.length > 0) {
                $('#rentProperties-item').empty();

                response.html.forEach(function(property) {
                    console.log("rent-property::::::", property);

                        var statusClass = '';
                        if (property.status === 'Sale') {
                            statusClass = 'bg-info';
                        } else if (property.status === 'Sold') {
                            statusClass = 'bg-danger';
                        } else if (property.status === 'Rent') {
                            statusClass = 'bg-success';
                        }

                        var propertyHTML = `
                        <div class="col-xl-4 col-md-6 grid-item wow fadeInUp ${property.status}">
                            <div class="property-box">
                                <div class="property-image">
                                    <div class="property-slider">
                                        ${Array.isArray(property.images) && property.images.length > 0 ? property.images.map(function(image) {
                                            return `<a href="javascript:void(0)"><img src="${image.image_url}" class="bg-img" alt=""></a>`;
                                        }).join('') : '<p>No images available</p>'}
                                        </div>

                                        <div class="labels-left">
                                            <div>
                                                <span class="label label-shadow ${statusClass}">${property.status}</span>
                                                </div>
                                            </div>
                                            <div class="seen-data">
                                                <i data-feather="camera"></i>
                                                <span>${property.images.length}</span>
                                                </div>
                                                </div>

                                                <div class="property-details">
                                                    <span class="font-roboto">${property.city}</span>
                                                    <a href="single-property-8.html">
                                                        <h3>${property.address}</h3>
                                                        </a>
                                                        <h6>$${property.price}*</h6>
                                                        <p class="font-roboto">${property.description}</p>
                                                        <ul>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">Bed : ${property.beds}</li>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths : ${property.baths}</li>
                                                            <li><img src="https://themes.pixelstrap.com/sheltos/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">Sq Ft : ${property.area}</li>
                                                            </ul>
                                            <div class="property-btn d-flex">
                                                {{-- <span>August 4, 2022</span> --}}
                                                <a href='{{ route("single-property.show", $property->id) }}' class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;

                                // Append to DOM
                                $('#rentProperties-item').append(propertyHTML);

                                // Initialize Slick after appending the new property
                                $('.property-slider').not('.slick-initialized').slick({
                                    slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: true,
                                arrows: true,
                                autoplay: true,
                                autoplaySpeed: 3000,
                                infinite: true,
                                prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                                nextArrow: '<button type="button" class="slick-next">Next</button>',
                            });

                            feather.replace();

                        // Append the property HTML to the list
                        // $('#properties-item').append(propertyHTML);
                    // } else {
                    //     console.log('No images available for property', property.id);
                    // }
                });
            } else {
                $('#rentProperties-item').html('<p>No properties found.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});

function addToWishlist(propertyId, event) {
    event.preventDefault(); // Prevent default behavior (if inside a link)

    $.ajax({
        url: "{{ route('wishlist.add') }}", // Ensure this route is correctly set in web.php
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"), // CSRF Token
            property: { id: propertyId } // Send correct property ID
        },
        success: function(response) {
            if (response.status === "success") {
                if (response.added_to_wishlist) {
                    // Property was successfully added to the wishlist
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Property added to wishlist successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Update heart icon to filled
                    $(".effect-round.like[data-property-id='" + propertyId + "']").addClass('added'); // Mark as added
                    $(".effect-round.like[data-property-id='" + propertyId + "'] i").removeClass('feather-heart').addClass('feather-heart-fill'); // Change to filled heart
                } else {
                    // Property is already in the wishlist
                    Swal.fire({
                        icon: 'warning',
                        title: 'Property already in wishlist!',
                        text: 'This property is already added to your wishlist.',
                        showConfirmButton: true
                    });
                }

                // Update wishlist count dynamically (if needed)
                $("#wishlist-count").text(response.wishlist.length);

                // Update wishlist dropdown (if any)
                $("#wishlist-container").html(response.wishlistHTML);
            } else {
                if (response.message === 'This property is sold and cannot be added to the wishlist.') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Property Sold',
                        text: 'This property is sold and cannot be added to your wishlist.',
                        showConfirmButton: true
                    });
                } else {
                    // Show other errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Error occurred while adding to wishlist',
                        showConfirmButton: true
                    });
                }
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error occurred while adding to wishlist',
                showConfirmButton: true
            });
        }
    });
}

var originalContent = $("#rentProperties-item").html(); // Store original content

$("#reset-btn").click(function () {
    $("#filter-form")[0].reset(); // Reset the filter form
    $("#rentProperties-item").html(originalContent); // Restore original content

    // Reinitialize slider after a small delay
    $('.property-slider').not('.slick-initialized').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
    });

    feather.replace();

});



</script>

</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/list-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:45 GMT -->
</html>
