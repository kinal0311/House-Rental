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
                    <h2>Listing</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Listing</li>
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
            <div class="row ratio_55">
                <div class="col-12 property-grid-3">
                    <div class="filter-panel tab-top-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Properties Listing</h2>
                                <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                            </div>
                            <ul class="grid-list-filter">
                                <li>
                                    <div class="filter-bottom-title">
                                        <h6 class="mb-0 font-roboto">Advance search <i data-feather="align-center"
                                                class="float-end ms-2"></i></h6>
                                    </div>
                                </li>
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
                            </ul>
                        </div>
                    </div>
                    <div class="left-sidebar filter-bottom-content">
                        <form id="filter-form" method="GET">
                            @csrf
                            <h6 class="d-lg-none d-block text-end"><a href="javascript:void(0)"
                                class="close-filter-bottom">Close filter</a></h6>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control" name="status" id="status">
                                                <option value="">Status</option>
                                                <option value="Sale">For Sale</option>
                                                <option value="Rent">For Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="property_type" id="property_type" style="color: #878787; " placeholder="Property Type">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Property Location">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
                                        <div class="price-range">
                                            <label for="amount">Price : </label>
                                            <input type="text" id="amount" name="price" readonly>
                                            <div id="slider-range" class="theme-range-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="price-range">
                                            <label for="amount">Area : </label>
                                            <input type="text" id="amount1" name="area" readonly>
                                            <div id="slider-range1" class="theme-range-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="mt-3 btn btn-gradient color-2 btn-pill" id="search-btn">Search Property</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    {{-- <div class="property-2 column-sm zoom-gallery property-label property-grid row grid" id="property-item">
                        <div id="properties-list">
                            <!-- The property items will be loaded here after AJAX search -->
                            @foreach($properties as $property)
                                <div class="property-item">
                                    <h5>{{ $property->status }}</h5>
                                    <p>{{ $property->property_type }}</p>
                                    <p>{{ $property->address }}</p>
                                    <p>{{ $property->max_rooms }}</p>
                                    <span>{{ $property->beds }}</span>
                                    <span>{{ $property->baths }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

                    <!-- This is the container where the filtered properties will be loaded via AJAX -->
                    {{-- <div id="properties-list"></div> --}}


                    <div class="property-2 column-sm zoom-gallery property-label property-grid row grid" id="properties-item">
                        @if($properties->isEmpty())
                            <p>No properties found.</p>
                        @else
                        @foreach($properties as $property)
                        <div class="col-xl-4 col-md-6 grid-item wow fadeInUp {{ $property->status }}">
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
                                                @if($property->status == 'Sale') bg-info
                                                @elseif($property->status == 'Sold') bg-danger
                                                @elseif($property->status == 'Rent') bg-success
                                                @endif
                                            ">{{ $property->status }}</span>
                                        </div>
                                    </div>
                                    <div class="seen-data">
                                        <i data-feather="camera"></i>
                                        <span>{{ $property->images->count() }}</span>
                                    </div>
                                    <div class="overlay-property-box">
                                        <a href="javascript:void(0);" class="effect-round" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"
                                        onclick="addToCart({{ $property->id }}, event)">
                                            <i data-feather="shopping-cart"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="Wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="property-details">
                                    <span class="font-roboto">{{ $property->city }}</span>
                                    <a href="#">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- property grid end -->

@include('frontend.footer-orange')

@include('frontend.footer-script')
@yield('script')
<script src="https://unpkg.com/feather-icons"></script>
<script>


// $('#search-btn').click(function() {
//     // console.log('btn click...');
//     // Collect filter values
//     var status = $('#status').val();
//     var property_type = $('#property_type').val();
//     var address = $('#address').val();
//     var max_rooms = $('#max_rooms').val();
//     var beds = $('#beds').val();
//     var baths = $('#baths').val();
//     // var price_range = $('#slider-range').slider("value"); // Assuming the slider range
//     // var area_range = $('#slider-range1').slider("value");
//     var searchUrl="{{ route('searchProperties') }}";
//     // alert(searchUrl);
//     // Send AJAX request
//     $.ajax({
//         url: searchUrl, // Your route
//         method: 'GET', // Or POST if needed
//         data: {
//             status: status,
//             property_type: property_type,
//             address: address,
//             max_rooms: max_rooms,
//             beds: beds,
//             baths: baths,
//             // price_range: price_range,
//             // area_range: area_range
//         },
//         success: function(response) {
//             // Assuming `response` contains the filtered properties in HTML format
//             $('#properties-list').html(response);
//         },
//         error: function(xhr, status, error) {
//             console.log(error);
//         }
//     });
// });
/* $('#search-btn').click(function(event) {
    event.preventDefault();  // Prevent page reload

    var status = $('#status').val();
    var property_type = $('#property_type').val();
    var address = $('#address').val();
    var max_rooms = $('#max_rooms').val();
    var beds = $('#beds').val();
    var baths = $('#baths').val();

    var searchUrl = "{{ route('searchProperties') }}";  // Your route name

    $.ajax({
        url: searchUrl,
        method: 'GET',
        data: {
            status: status,
            property_type: property_type,
            address: address,
            max_rooms: max_rooms,
            beds: beds,
            baths: baths
        },
        success: function(response) {
            console.log("response:::::::", response);
            return false;

            // Empty the properties list before appending new results
            $('#properties-list').empty().append(response.html);  // Update the list with search results
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}); */

$('#search-btn').click(function(event) {
    event.preventDefault();

    var status = $('#status').val();
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

    var searchUrl = "{{ route('searchProperties') }}";  // Your route name

    $.ajax({
        url: searchUrl,
        method: 'GET',
        data: {
            status: status,
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
                $('#properties-item').empty();

                response.html.forEach(function(property) {
                    console.log("property::::::", property);

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
                                $('#properties-item').append(propertyHTML);

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
                $('#properties-item').html('<p>No properties found.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});

function addToCart(propertyId, event) {
    event.preventDefault(); // Prevent default behavior (if inside a link)

    $.ajax({
        url: "{{ route('cart.add') }}", // Ensure this route is correctly set in web.php
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"), // CSRF Token
            property: { id: propertyId } // Send correct property ID
        },
        success: function(response) {
            if (response.status === "success") {
                if (response.added_to_cart) {
                    // Property was successfully added to the cart
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Property added to cart successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    // Property is already in the cart
                    Swal.fire({
                        icon: 'warning',
                        title: 'Property already in cart!',
                        text: 'This property is already added to your cart.',
                        showConfirmButton: true
                    });
                }

                // Update cart count dynamically
                $("#cart-count").text(response.cart.length);

                // Update cart dropdown (if any)
                $("#cart-container").html(response.cartHTML);
            } else {
                if (response.message === 'This property is sold and cannot be added to the cart.') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Property Sold',
                        text: 'This property is sold and cannot be added to your cart.',
                        showConfirmButton: true
                    });
                } else {
                    // Show other errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Error occurred while adding to cart',
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
                text: 'Error occurred while adding to cart',
                showConfirmButton: true
            });
        }
    });
}



</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/tab-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:46 GMT -->
</html>
