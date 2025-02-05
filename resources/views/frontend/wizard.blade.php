<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:06 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <img src="{{ asset ('sheltos/assets/images/logo/2.png') }}" alt="" class="img-fluid">
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
                                                <a href="javascript:void(0)" class="nav-link menu-title">Home</a>
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
                                            <a href="login.html">
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
        <img src="{{ asset('sheltos/assets/images/inner-background.jpg') }}" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Add property</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add property</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->


    <!-- submit property section start -->
    <section class="property-wizard">
        <div class="container">
            <div class="row wizard-box">
                <div class="col-sm-12">
                    <div class="wizard-step-container row">
                       <div class="col-xxl-3 col-lg-4">
                           <div class="theme-card">
                            <ul class="wizard-steps">
                                <li class="step-container step-1 active" data-step="1">
                                    <div class="media">
                                        <div class="step-icon">
                                            <i data-feather="chevron-right"></i>
                                            <span>1</span>
                                        </div>
                                        <div class="media-body">
                                            <h5>General</h5>
                                            <h6>Basic Information</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="step-container step-2" data-step="2">
                                    <div class="media">
                                        <div class="step-icon">
                                            <i data-feather="chevron-right"></i>
                                            <span>2</span>
                                        </div>
                                        <div class="media-body">
                                            <h5>Address</h5>
                                            <h6>Add your place</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="step-container step-3" data-step="3">
                                    <div class="media">
                                        <div class="step-icon">
                                            <i data-feather="chevron-right"></i>
                                            <span>3</span>
                                        </div>
                                        <div class="media-body">
                                            <h5>Gallery</h5>
                                            <h6>Add your media</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="step-container step-4" data-step="4">
                                    <div class="media">
                                        <div class="step-icon">
                                            <i data-feather="chevron-right"></i>
                                            <span>4</span>
                                        </div>
                                        <div class="media-body">
                                            <h5>Confirmation</h5>
                                            <h6>Complete details</h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                           </div>
                       </div>

                            <div class="wizard-form-details col-xxl-9 col-lg-8">
                                <div class="theme-card my-3">

                                        <div class="wizard-step wizard-step-1 d-block">
                                            <h2>General</h2>
                                            <p class="font-roboto">Basic information about property</p>
                                            <form class="row gx-3" action="" method="POST" id="basicForm" data-parsley-validate>
                                                @csrf
                                                <div class="form-group col-sm-4">
                                                    <label>Property Type<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="property_type" placeholder="Villa" required data-parsley-required-message="Property type is required">
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label>Property Status<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="property_status" required data-parsley-required-message="Select a property status">
                                                        <option value="">Status</option>
                                                        <option value="For Sale">For Sale</option>
                                                        <option value="For Rent">For Rent</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label>Property Price<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="property_price" placeholder="$2800" required data-parsley-type="number" data-parsley-required-message="Property price is required">
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label>Max Rooms<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="max_rooms" required data-parsley-required-message="Select the number of rooms">
                                                        <option value="">Max Rooms</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label>Beds<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="beds" required data-parsley-required-message="Select the number of beds">
                                                        <option value="">Beds</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label>Baths<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="baths" required data-parsley-required-message="Select the number of baths">
                                                        <option value="">Baths</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label>Area (sq ft)<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="area" placeholder="85" required data-parsley-type="number" data-parsley-required-message="Area is required">
                                                </div>

                                                {{-- <div class="form-group col-sm-4">
                                                    <label>Price<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="price" placeholder="$3000" required data-parsley-type="number" data-parsley-required-message="Price is required">
                                                </div> --}}


                                                <div class="form-group col-sm-4">
                                                    <label for="agent_id">Agent<span class="text-danger">*</span></label>
                                                    <select name="agent_id" id="agent_id" class="form-control p-2" required data-parsley-required-message="Please select an agent.">
                                                        <option value="" disabled selected>Select Agent</option>
                                                        @foreach($agents as $agent)
                                                            <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                                                                {{ $agent->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group col-sm-12">
                                                    <label>Description<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="4" name="description" required data-parsley-required-message="Description is required"></textarea>
                                                </div>

                                                <div class="text-end mt-3">
                                                    <button type="button" class="btn btn-gradient next1 color-2 btn-pill"  data-next-step="2">Next<i class="fas fa-arrow-right ms-2"></i></button>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="wizard-step wizard-step-2 d-none">
                                            <h2>Address</h2>
                                            <p class="font-roboto">Add your property Location</p>
                                            <form class="row gx-3" action="" method="POST" id="addressForm" data-parsley-validate>
                                                @csrf

                                                <!-- Address -->
                                                <div class="form-group col-sm-6">
                                                    <label>Address<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="address" placeholder="Address of your property" required
                                                        data-parsley-required-message="Address is required" data-parsley-maxlength="255">
                                                </div>

                                                <!-- Zip Code -->
                                                <div class="form-group col-sm-6">
                                                    <label>Zip code<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="zip_code" placeholder="39702" required
                                                        data-parsley-type="number" data-parsley-required-message="Zip code is required"
                                                        data-parsley-min="1" data-parsley-min-message="Zip code must be valid">
                                                </div>

                                                <!-- City -->

                                                <div class="form-group col-sm-6">
                                                    <label>City<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="city" placeholder="City" required
                                                        data-parsley-required-message="City is required" data-parsley-maxlength="255">
                                                </div>

                                                <!-- Google Maps iframe -->
                                                <div class="col-sm-12">
                                                    <iframe title="realestate location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                                                            allowfullscreen></iframe>
                                                </div>

                                                <!-- Submit Button -->
                                                {{-- <div class="text-end mt-3">
                                                    <button type="submit" class="btn btn-gradient color-2 btn-pill">Submit<i class="fas fa-arrow-right ms-2"></i></button>
                                                </div> --}}

                                                <div class="next-btn d-flex mt-3">
                                                    <button type="button" class="btn btn-dashed prev1 color-2 prev-btn btn-pill"  data-prev-step="1"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                    <button type="button" class="btn btn-gradient next2 color-2 btn-pill"  data-next-step="3">Next<i class="fas fa-arrow-right ms-2"></i></button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="wizard-step wizard-step-3 d-none">
                                            <h2>Gallery</h2>
                                            <p class="font-roboto">Add your property Media</p>
                                            <label>Media<span class="text-danger">*</span></label>
                                            {{-- <form class="dropzone" action="" method="POST" id="multiFileUpload" action="https://themes.pixelstrap.com/upload.php">
                                                <div class="dz-message needsclick">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <h6>Drop files here or click to upload.</h6>
                                                    <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                </div>
                                            </form> --}}

                                            <form id="galleryForm" class="row gx-3" data-parsley-validate>
                                                <div class="form-group col-sm-12">
                                                    <label>Additional features</label>
                                                    <div class="feature-checkbox">
                                                        <label for="chk-ani">
                                                            <input class="checkbox_animated color-2" id="chk-ani" type="checkbox" name="features[]" value="Emergency Exit" required data-parsley-required-message="Select at least one feature"> Emergency Exit
                                                        </label>
                                                        <label for="chk-ani1">
                                                            <input class="checkbox_animated color-2" id="chk-ani1" type="checkbox" name="features[]" value="CCTV" required data-parsley-required-message="Select at least one feature"> CCTV
                                                        </label>
                                                        <label for="chk-ani2">
                                                            <input class="checkbox_animated color-2" id="chk-ani2" type="checkbox" name="features[]" value="Free Wi-Fi" required data-parsley-required-message="Select at least one feature"> Free Wi-Fi
                                                        </label>
                                                        <label for="chk-ani3">
                                                            <input class="checkbox_animated color-2" id="chk-ani3" type="checkbox" name="features[]" value="Free Parking In The Area" required data-parsley-required-message="Select at least one feature"> Free Parking In The Area
                                                        </label>
                                                        <label for="chk-ani4">
                                                            <input class="checkbox_animated color-2" id="chk-ani4" type="checkbox" name="features[]" value="Air Conditioning" required data-parsley-required-message="Select at least one feature"> Air Conditioning
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="next-btn d-flex mt-3">
                                                    <button type="button" class="btn prev2 btn-dashed color-2 prev-btn btn-pill" data-prev-step="2"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                    <button type="button" class="btn next3 btn-gradient color-2 btn-pill"  data-next-step="4">Next<i class="fas fa-arrow-right ms-2"></i></button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Step 4: Confirmation -->
                                        <div class="wizard-step wizard-step-4 d-none">
                                            <form id="submitForm" action="" method="POST">
                                                @csrf
                                                <div class="complete-details">
                                                    <div>
                                                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/inner-pages/4.svg" class="img-fluid" alt="">
                                                        <h3>Thank you !!</h3>
                                                        <h6>Congratulations, your property has been submitted</h6>
                                                        <p class="font-roboto">
                                                            Residences can be classified by and how they are connected to neighbouring residences and land.
                                                            Different types of housing tenure can be used for the same physical type.
                                                        </p>
                                                        <button type="button" class="btn btn-gradient color-2 step-again btn-pill">Add new property</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- submit property section end -->

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
                                        <form data-parsley-validate>
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
                            <li><a href="layout-2.html">Home</a></li>
                            <li><a href="terms-conditions.html">Terms</a></li>
                            <li><a href="privacy-policy.html">Privacy policy</a></li>
                            <li><a href="contact-2.html">Contact</a></li>
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
    var submitPropertyeUrl = "{{ route('submit-property.store') }}";
    </script>
    {{-- wizardjs --}}
    {{-- <script src="{{ URL::asset('sheltos/assets/js/wizard.js/form-wizard.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('sheltos/assets/js/property-wizard.js') }}"></script> --}}

</body>

<!-- Mirrored from themes.pixelstrap.com/sheltos/main/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:06 GMT -->
</html>
