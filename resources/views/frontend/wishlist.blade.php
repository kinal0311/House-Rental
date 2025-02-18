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

@include('frontend.header-orange')

<!-- breadcrumb start -->
<section class="breadcrumb-section p-0">
    <img src="{{ URL::asset('sheltos/assets/images/inner-background.jpg')}}" class="bg-img img-fluid" alt="">
    <div class="container">
        <div class="breadcrumb-content">
            <div>
                <h2>Wishlist</h2>
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
{{-- <h1>HELLO</h1> --}}

<section class="property-section">
    <div class="container">
        <div class="row ratio_55">
            <div class="col-12 property-grid-3">
                <div class="filter-panel tab-top-panel">
                    <div class="top-panel">
                        <div>
                            <h2>Wishlist Property</h2>
                            <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                        </div>
                    </div>
                </div>
                <div class="property-2 column-sm zoom-gallery property-label property-grid row justify-content-start" id="properties-item">
                    @if($wishlist->isEmpty())
                        <h3>No properties in Wishlist.</h3>
                    @else
                        @foreach($wishlist as $item)
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
                                        <button type="button" class="btn btn-dashed btn-pill color-2" onclick="removeFromWishlist({{ $item->id }})">Remove</button>
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

@include('frontend.footer-orange')

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

function removeFromWishlist(wishlistItemId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to remove this property from your wishlist.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('wishlist.remove') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    wishlist_item_id: wishlistItemId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Removed from Wishlist',
                            text: 'Property successfully removed from your wishlist!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Dynamically remove the specific wishlist item
                        $('#wishlist-item-' + wishlistItemId).remove();

                        // Update the wishlist count
                        $('#wishlist-count').text(response.wishlistCount);

                        // Update only the 'properties-item' section with the new wishlist items
                        $('#properties-wishlist').html(response.wishlistHTML);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error removing property from wishlist',
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error occurred while removing from wishlist',
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

