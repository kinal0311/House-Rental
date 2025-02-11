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

    <style>
        .agent-slider .agent-item {
            padding: 25px; /* Adds padding inside each agent card */
        }

        .slick-slide {
            margin: 0 10px; /* Space between two agents */
        }

        .slick-list {
            margin: 0 -10px; /* Balances spacing so layout stays aligned */
        }
    </style>
    {{-- All CSS --}}
    @include('frontend.layoutcss')

</head>

<body>
@include('frontend.header')

    <!-- home section start -->
    <section class="home-section layout-1 layout-6">
        <div class="home-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="container">
                            <div class="home-left">
                                <div>
                                    <div class="home-slider-1 arrow-light slick-shadow">
                                        <div>
                                            <div class="home-content">
                                                <div>
                                                    <img src="{{ URL::asset('sheltos/assets/images/signature/2.png') }}" class="img-fluid m-0"
                                                        alt="">
                                                    <h6>Want to buy or rent Home ?</h6>
                                                    <h1>Reality Properties solve your problems</h1>
                                                    <a href="{{ route('submit-property')}}"
                                                        class="btn btn-gradient color-6">submit
                                                        property</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="home-content">
                                                <div>
                                                    <img src="{{ URL::asset('sheltos/assets/images/signature/2.png') }}" class="img-fluid m-0"
                                                        alt="">
                                                    <h6>Want to buy or sell Land ?</h6>
                                                    <h1>Elegant retreat in quiet Coral Gables</h1>
                                                    <a href="{{ route('submit-property')}}"
                                                        class="btn btn-gradient color-6">submit
                                                        property</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="looking-icons">
                                        <h5>What are you looking for?</h5>
                                        <ul>
                                            <li>
                                                <div  class="looking-icon d-flex flex-column align-items-center">
                                                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="800px" height="800px" viewBox="0 0 70.873 70.873"
                                                    xml:space="preserve"><g>
                                                        <g>
                                                            <path d="M70.27,39.589L56.453,25.771v-9.112c0-1.135-0.922-2.057-2.057-2.057c-1.138,0-2.057,0.922-2.057,2.057v5.002
                                                                l-9.749-9.748c-0.803-0.803-2.104-0.803-2.903,0L27.252,24.347c-0.423,1.854-1.881,3.312-3.734,3.735
                                                                c-0.356,0.082-0.725,0.129-1.105,0.129c-2.74,0-4.969-2.229-4.969-4.969c0-1.938-1.574-3.511-3.51-3.511s-3.511,1.573-3.511,3.511
                                                                v10.523h7.411h5.813l17.492-17.492l26.225,26.223c0.397,0.399,0.928,0.604,1.453,0.604c0.522,0,1.053-0.199,1.453-0.604
                                                                C71.074,41.693,71.074,40.392,70.27,39.589z"/>
                                                            <path d="M64.389,41.948L42.594,20.153c-0.385-0.388-0.908-0.604-1.453-0.604s-1.068,0.216-1.453,0.604l-13.95,13.948
                                                                c2.266,0.8,3.895,2.955,3.895,5.49v15.659c0,1.709-0.744,3.244-1.92,4.312h5.129c1.378,0,2.706-0.581,3.645-1.598
                                                                c0.854-0.923,1.324-2.119,1.324-3.373V46.78c0-1.897,1.453-3.479,3.33-3.659c1.877,0.18,3.33,1.762,3.33,3.659v7.812
                                                                c0,1.254,0.471,2.45,1.324,3.373c0.939,1.014,2.268,1.596,3.645,1.596h10.642c2.735,0,4.969-2.229,4.969-4.969V43.955
                                                                c0-0.312-0.028-0.628-0.092-0.941C64.877,42.61,64.68,42.239,64.389,41.948z"/>
                                                            <path d="M23.807,36.68H7.51V23.242c0-3.542,2.882-6.424,6.424-6.424c3.543,0,6.424,2.882,6.424,6.424
                                                                c0,1.135,0.92,2.056,2.055,2.056c1.135,0,2.056-0.921,2.056-2.056c0-5.81-4.726-10.534-10.534-10.534
                                                                C8.127,12.708,3.4,17.434,3.4,23.242V36.68H2.914C1.305,36.68,0,37.984,0,39.593v15.658c0,1.609,1.305,2.913,2.914,2.913h20.895
                                                                c1.608,0,2.913-1.304,2.913-2.913V39.594C26.72,37.984,25.416,36.68,23.807,36.68z M15.352,48.506v2.256
                                                                c0,1.104-0.891,1.991-1.991,1.991s-1.991-0.891-1.991-1.991v-2.256c-0.92-0.636-1.525-1.695-1.525-2.896
                                                                c0-1.94,1.574-3.519,3.517-3.519c1.94,0,3.517,1.575,3.517,3.519C16.877,46.808,16.272,47.87,15.352,48.506z"/>
                                                            <path d="M13.36,45.006c-0.333,0-0.604,0.271-0.604,0.604c0,0.282,0.186,0.44,0.266,0.496l0.339,0.231l0.338-0.231
                                                                c0.078-0.056,0.264-0.215,0.264-0.499C13.963,45.275,13.692,45.006,13.36,45.006z"/>
                                                        </g>
                                                    </g></svg>
                                                    <h6 class="mt-2">House</h6>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="looking-icon">
                                                   <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                   <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                   viewBox="0 0 512.001 512.001" xml:space="preserve">
                                               <g>
                                                   <g>
                                                       <path d="M475.433,274.983L265.716,85.746c-5.518-4.982-13.907-4.982-19.426,0l-75.954,68.536v-3.604
                                                           c0-8.006-6.491-14.499-14.499-14.499H95.771c-8.008,0-14.499,6.493-14.499,14.499v83.969L36.57,274.984
                                                           c-4.454,4.018-5.974,10.367-3.82,15.968c2.153,5.599,7.534,9.295,13.533,9.295h38.439v197.256c0,8.006,6.491,14.499,14.499,14.499
                                                           h313.558c8.006,0,14.499-6.493,14.499-14.499V300.245h38.441c6,0,11.38-3.696,13.533-9.295
                                                           C481.405,285.351,479.887,279.002,475.433,274.983z M110.27,165.177h31.067v15.269l-31.067,28.034V165.177z M412.78,271.248
                                                           c-8.006,0-14.499,6.493-14.499,14.499v197.256H113.721V300.193h204.098c8.006,0,14.499-6.493,14.499-14.499
                                                           s-6.493-14.499-14.499-14.499H98.43c-0.351,0-0.693,0.028-1.037,0.052h-13.4l172.007-155.209l172.007,155.209H412.78z"/>
                                                   </g>
                                               </g>
                                               <g>
                                                   <g>
                                                       <path d="M376.891,282.866c-0.189-0.929-0.464-1.843-0.826-2.727c-0.362-0.87-0.812-1.711-1.334-2.494
                                                           c-0.536-0.797-1.145-1.537-1.812-2.204c-3.364-3.364-8.38-4.917-13.078-3.958c-0.929,0.174-1.843,0.464-2.711,0.826
                                                           c-0.884,0.362-1.725,0.812-2.508,1.334c-0.797,0.522-1.537,1.131-2.204,1.798c-0.667,0.667-1.276,1.406-1.798,2.204
                                                           c-0.522,0.783-0.971,1.624-1.334,2.494c-0.362,0.884-0.638,1.798-0.826,2.727c-0.188,0.928-0.29,1.885-0.29,2.826
                                                           c0,0.942,0.102,1.901,0.29,2.827s0.465,1.844,0.828,2.727c0.362,0.871,0.812,1.712,1.334,2.495
                                                           c0.522,0.797,1.131,1.537,1.798,2.204c0.667,0.667,1.406,1.276,2.204,1.798c0.783,0.52,1.624,0.971,2.508,1.334
                                                           c0.87,0.362,1.782,0.652,2.711,0.841c0.928,0.188,1.885,0.274,2.826,0.274c3.815,0,7.555-1.55,10.251-4.248
                                                           c0.667-0.667,1.276-1.406,1.798-2.204c0.522-0.783,0.971-1.624,1.334-2.495c0.362-0.883,0.652-1.798,0.841-2.726
                                                           c0.188-0.928,0.274-1.885,0.274-2.827C377.165,284.751,377.078,283.792,376.891,282.866z"/>
                                                   </g>
                                               </g>
                                               <g>
                                                   <g>
                                                       <path d="M342.731,370.053c-1.463-30.5-24.19-54.39-51.744-54.39c-14.452,0-26.672,6.192-34.832,11.863
                                                           c-8.057-5.707-20.208-11.863-35.139-11.863c-6.888,0-13.475,1.493-19.502,4.209c-18.084,8.148-31.142,27.306-32.238,50.181
                                                           c-0.86,17.964,5.366,30.764,10.123,38.828c10.291,17.446,50.616,45.151,65.149,54.783c1.504,0.996,2.732,1.799,3.62,2.378
                                                           c2.402,1.56,5.151,2.34,7.9,2.34c2.748,0,5.497-0.78,7.898-2.339c9.458-6.142,57.226-37.77,68.649-57.175
                                                           C337.367,400.792,343.587,387.981,342.731,370.053z M313.778,374.889c-0.104,3.049-0.58,5.94-1.45,8.843
                                                           c-1.006,3.355-2.53,6.736-4.705,10.429c-3.726,6.33-18.122,18.229-33.55,29.592c-0.671,0.494-1.344,0.987-2.017,1.479
                                                           c-1.348,0.983-2.7,1.96-4.051,2.927c-4.054,2.9-8.09,5.71-11.941,8.321c-2.127-1.44-4.267-2.913-6.406-4.405
                                                           c-20.665-14.428-41.043-30.735-45.286-37.926c-4.682-7.937-6.516-14.727-6.134-22.707c0.708-14.767,10.925-26.781,22.776-26.781
                                                           c13.498,0,24.116,11.413,24.151,11.448c2.703,3.04,6.556,4.805,10.625,4.864c0.071,0.001,0.142,0.001,0.212,0.001
                                                           c0.106,0,0.209-0.014,0.315-0.016c3.884-0.044,7.567-1.705,10.236-4.537c0.11-0.117,11.661-11.761,24.435-11.761
                                                           c11.853,0,22.07,12.014,22.778,26.779c0.048,1.009,0.062,1.994,0.042,2.962C313.804,374.568,313.784,374.725,313.778,374.889z"/>
                                                   </g>
                                               </g>
                                               <g>
                                                   <g>
                                                       <path d="M192.796,43.302C191.634,19.021,173.377,0,151.234,0c-10.194,0-18.959,3.854-25.3,7.844
                                                           C119.641,3.832,110.884,0,100.375,0c-22.144,0-40.4,19.021-41.564,43.302c-0.676,14.116,4.187,24.126,7.903,30.424
                                                           c8.486,14.384,41.364,36.437,51.238,42.854c2.402,1.56,5.151,2.34,7.9,2.34c2.748,0,5.495-0.78,7.896-2.339
                                                           c9.843-6.391,42.618-28.371,51.152-42.867C188.613,67.405,193.471,57.391,192.796,43.302z M159.91,59.003
                                                           c-2.914,4.954-18.638,17.374-34.058,27.976C110.364,76.335,94.584,63.899,91.69,58.993c-3.02-5.121-4.155-9.265-3.913-14.303
                                                           c0.407-8.507,6.177-15.692,12.598-15.692c6.568,0,12.726,5.02,14.635,7.039c2.669,3.109,6.43,4.825,10.529,4.93
                                                           c4.151,0.107,7.987-1.666,10.815-4.666c1.366-1.45,8.309-7.305,14.879-7.305c6.422,0,12.192,7.186,12.598,15.692
                                                           C164.071,49.715,162.935,53.862,159.91,59.003z"/>
                                                   </g>
                                               </g>
                                               </svg>
                                                    <h6>Booking</h6>
                                            </div>
                                            </li>
                                            <li>
                                                <div class="looking-icon">
                                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M160.00244,12A84.06494,84.06494,0,0,0,79.37939,119.65234l-55.8623,55.86231A12.00282,12.00282,0,0,0,20.00244,184v40a11.99934,11.99934,0,0,0,12,12h40a11.99934,11.99934,0,0,0,12-12V212h12a11.99934,11.99934,0,0,0,12-12V188h12a12.00282,12.00282,0,0,0,8.48535-3.51465l7.86231-7.8623A84.00932,84.00932,0,1,0,160.00244,12Zm0,144a59.70987,59.70987,0,0,1-22.10449-4.19922,12.01272,12.01272,0,0,0-13.21289,2.5459L115.03174,164H96.00244a11.99934,11.99934,0,0,0-12,12v12h-12a11.99934,11.99934,0,0,0-12,12v12h-16V188.9707l57.65332-57.65332a12.005,12.005,0,0,0,2.54688-13.21093A60.01234,60.01234,0,1,1,160.00244,156Zm35.99707-80a16,16,0,1,1-16-16A16.01833,16.01833,0,0,1,195.99951,76Z"/>
                                                      </svg>
                                                    <h6>Garage</h6>
                                                    </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="home-search-6">
                            <div class="vertical-search">
                                <div class="left-sidebar">
                                    <div class="row gx-3">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Property Status</label>
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle font-rubik"
                                                        data-bs-toggle="dropdown"><span>Property Status</span> <i
                                                            class="fas fa-angle-down"></i></span>
                                                    <div class="dropdown-menu text-start">
                                                        <a class="dropdown-item" href="javascript:void(0)">Property
                                                            Status</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">For Rent</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">For Sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Property Type</label>
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
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Rooms</label>
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
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Bed</label>
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
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Bath</label>
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
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Agencies</label>
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
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="price-range">
                                                    <label for="amount">Price : </label>
                                                    <input type="text" id="amount" readonly>
                                                    <div id="slider-range" class="theme-range-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="price-range">
                                                    <label for="amount">Area : </label>
                                                    <input type="text" id="amount1" readonly>
                                                    <div id="slider-range1" class="theme-range-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{ route('listing') }}" id="search-btn" class="btn btn-gradient color-6 mt-3">Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        @foreach($properties->take(3) as $property)
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
                                            <a href="{{ route('single-property.show', $property->id) }}">
                                            <button type="button" class="btn btn-gradient color-6 mt-3">Details</button>
                                            </a>
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
                                                            <a href="{{ route('single-property.show', $property->id) }}" class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
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
                        @foreach($properties->take(6) as $property)
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
                                        <span>{{ $property->images->count() }}</span>
                                    </div>
                                    <div class="overlay-property-box">
                                        <a class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="Wishlist">
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
                                        <a href="{{ route('single-property.show', $property->id) }}" class="btn btn-dashed btn-pill color-6" tabindex="0">Details</a>
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 text-white">
                        <span class="label label-gradient color-6">New Offer</span>
                        <h2>Our New Offer</h2>
                        <hr>
                    </div>
                    <div class="offer-slider">
                        <div>
                            <div class="offer-wrapper">
                                <div class="media">
                                    <div class="offer-icon">
                                        <img src="{{ URL::asset('sheltos/assets/images/others/icon-1.png') }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6>Sheltos</h6>
                                        <h3>Looking for the new home?</h3>
                                        <p>10 new offers every day. 350 offers on site, trusted
                                            by a community of thousands of users.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="offer-wrapper">
                                <div class="media">
                                    <div class="offer-icon">
                                        <img src="{{ URL::asset('sheltos/assets/images/others/icon-2.png') }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6>Sheltos</h6>
                                        <h3>Are you looking for home?</h3>
                                        <p>350 offers on site, trusted by a community of thousands of users. 10 new offers every day. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="offer-wrapper">
                                <div class="media">
                                    <div class="offer-icon">
                                        <img src="{{ URL::asset('sheltos/assets/images/others/icon-1.png') }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6>Sheltos</h6>
                                        <h3>Looking for the new Office?</h3>
                                        <p>10 new offers every day. 350 offers on site, trusted
                                            by a community of thousands of users.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our new offer section end -->

    <!-- find properties section start -->
    <section class="my-gallery gallery-6">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 color-6">
                        <span class="label label-gradient color-6">city</span>
                        <h2>Find Properties in These Cities</h2>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach($cities->take(8) as $city)
                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 wow fadeInUp">
                                <div class="find-cities bg-size">
                                    @php
                                        // Get the first property image for the first property in the city
                                        $firstImage = $properties->firstWhere('city', $city->city)->images->first()->image_url ?? 'banner-3.png';
                                    @endphp

                                    <!-- Display the image -->
                                    <img src="{{ URL::asset($firstImage) }}" class="bg-img" alt="{{ $city->city }}">

                                    <div class="citi-overlay">
                                        <div>
                                            <h4>{{ $city->property_count }}+ Property</h4>
                                            <h2>{{ $city->city }}</h2>
                                            <h6 class="font-roboto">Many Properties in this city</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- find properties section end -->

    <!-- banner section start -->
    <section class="banner-section banner-4 parallax-image">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 color-6">
                        <span class="label label-gradient color-6">Buy or sell</span>
                    </div>
                    <div class="light-bg banner-1">
                        <span class="big-gradient">*</span>
                        <span class="small-white">*</span>
                        <h6>Sheltos real estate</h6>
                        <h2>Looking to Buy a new property or Sell an existing one?
                            Real Homes provides an easy solution!</h2>
                        <div class="button-banner">
                            <a href="{{ route('submit-property') }}" class="btn btn-gradient color-6">Submit property</a>
                            <a href="{{ route('listing') }}" class="btn btn-white color-6"> <span>Browse property</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- about section start -->
    <section class="about-section about-color6">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-1 color-6 text-center">
                        <span class="label label-gradient color-6">Agent</span>
                        <h2>Meet our Agents</h2>
                        <hr>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="about-1 about-wrap arrow-white color-6">
                                <div class="agent-slider">
                                    @foreach ($agents->take(6) as $agent)
                                    <div class="agent-item">
                                        <div class="about-content d-flex align-items-center w-100">
                                            <!-- Image Section -->
                                            <div class="about-image position-relative">
                                                <img src="{{ URL::asset($agent->img ?: 'path/to/default/image.jpg') }}" class="img-fluid" alt="" style="height: 300px; width: 900px; object-fit: cover;">
                                                <div class="about-overlay"></div>
                                                <div class="overlay-content">
                                                    <ul>
                                                        <li><a href="https://accounts.google.com/"><img src="{{ URL::asset('sheltos/assets/images/about/icon-1.png') }}" alt=""></a></li>
                                                        <li><a href="https://twitter.com/"><img src="{{ URL::asset('sheltos/assets/images/about/icon-2.png') }}" alt=""></a></li>
                                                        <li><a href="https://www.facebook.com/"><img src="{{ URL::asset('sheltos/assets/images/about/icon-3.png') }}" alt=""></a></li>
                                                    </ul>
                                                    <span>Connect</span>
                                                </div>
                                            </div>

                                            <!-- Details Section -->
                                            <div class="our-details text-center p-4" style="height: 300px; width: 500px;">
                                                <a href="agent-profile.html">
                                                    <h6 class="d-flex justify-content-center">{{ $agent->name }}
                                                        <span class="label-heart color-6 ms-2">
                                                            <i data-feather="heart"></i>
                                                        </span>
                                                    </h6>
                                                </a>
                                                <h3>Communicating with..</h3>
                                                <span class="font-roboto"><i data-feather="mail" class="me-1"></i>{{ $agent->email }}</span>
                                                <p class="font-roboto">{{ $agent->description }}</p>
                                                <a href="{{ route('agent-profile', $agent->id) }}" class="btn btn-gradient btn-pill color-6 mt-2">
                                                    <i data-feather="eye"></i> View Portfolio
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-1 text-white">
                        <span class="label label-gradient color-6">Our</span>
                        <h2>Happy clients</h2>
                        <hr>
                    </div>
                    <div class="testimonial-2 arrow-light">
                        <div>
                            <div class="client-slider light-bg">
                                <ul class="user-list">
                                    <li><img src="{{ URL::asset('sheltos/assets/images/testimonial/2.png') }}" alt=""></li>
                                    <li>
                                        <img src="{{ URL::asset('sheltos/assets/images/testimonial/1.png') }}" alt="">
                                        <div class="heart-bg">
                                        </div>
                                        <img src="{{ URL::asset('sheltos/assets/images/testimonial/heart.png') }}" alt="" class="heart-icon">
                                    </li>
                                    <li><img src="{{ URL::asset('sheltos/assets/images/testimonial/3.png') }}" alt=""></li>
                                </ul>
                                    <p>Surveyors make precise measurements of property boundaries. Many industries, including construction, rely on these measurements</p>
                                <h6>real estate</h6>
                                <ul class="client-rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="label label-white label-lg"><span class="gradient-1 color-6">Mark
                                        Andry</span></span>
                            </div>
                        </div>
                        <div>
                            <div class="client-slider light-bg">
                                <ul class="user-list">
                                    <li><img src="{{ URL::asset('sheltos/assets/images/testimonial/1.png') }}" alt=""></li>
                                    <li>
                                        <img src="{{ URL::asset('sheltos/assets/images/testimonial/2.png') }}" alt="">
                                        <div class="heart-bg">
                                        </div>
                                        <img src="{{ URL::asset('sheltos/assets/images/testimonial/heart.png') }}" alt="" class="heart-icon">
                                    </li>
                                    <li><img src="{{ URL::asset('sheltos/assets/images/testimonial/3.png') }}" alt=""></li>
                                </ul>
                                <p>Residences can be classified by and connected to residences. Different types of housing  can be use same physical type.</p>
                                <h6>real estate</h6>
                                <ul class="client-rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="label label-white label-lg"><span class="gradient-1 color-6">John
                                        David</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->

    <!-- brand 2 start -->
    <section class="small-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-1 brand-slider">
                        <div>
                            <a href="javascript:void(0)" class="logo-box">
                                <img src="{{ URL::asset('sheltos/assets/images/brand/17.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="logo-box">
                                <img src="{{ URL::asset('sheltos/assets/images/brand/18.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="logo-box">
                                <img src="{{ URL::asset('sheltos/assets/images/brand/19.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="logo-box">
                                <img src="{{ URL::asset('sheltos/assets/images/brand/20.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="logo-box">
                                <img src="{{ URL::asset('sheltos/assets/images/brand/21.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="logo-box">
                                <img src="{{ URL::asset('sheltos/assets/images/brand/18.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brand 2 end -->

   @include('frontend.footer')

{{-- All js --}}
@include('frontend.footer-script')

</body>
@yield('script')

<script src="{{asset('assets/js/pages/frontend/layout.js')}}"></script>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/layout-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:02 GMT -->
</html>
