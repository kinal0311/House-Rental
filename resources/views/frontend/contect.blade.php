<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/contact-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:07 GMT -->
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
                    <h2>Contact us</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- Get in touch section start -->
    <section class="small-section get-in-touch">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 contact-img">
                    <img src="{{ URL::asset('sheltos/assets/images/inner-pages/1.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="log-in">
                        <div class="mb-4 text-start">
                            <h2>Let's Get In Touch</h2>
                        </div>
                        <form class="row gx-3">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your name" required="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="phone"></i>
                                        </div>
                                    </div>
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
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i data-feather="mail"></i>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control" placeholder="email address" required="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">Write here something
                                </textarea>
                            </div>
                            <div class="col-md-12 submit-btn">
                                <button class="btn btn-gradient color-2 btn-pill" type="submit">Send Your Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get in touch section end -->

    <!-- contact details section start -->
    <section class="small-section contact_section pt-0 contact_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="contact_wrap">
                        <i data-feather="map-pin"></i>
                        <h4>Where ?</h4>
                        <p class="font-roboto">549 Sulphur Springs Road <br>
                            Downers Grove, IL 60515 <br>
                            +91 361264100
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="contact_wrap">
                        <i data-feather="map-pin"></i>
                        <h4>Second branch</h4>
                        <p class="font-roboto">5415 Spring garden Road <br>
                            Halifax, IL 97230 <br>
                            +91 187230014
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="contact_wrap">
                        <i data-feather="mail"></i>
                        <h4>Online service</h4>
                        <ul>
                            <li>Inquiries: sheltos@.in</li>
                            <li>Support: help@.in</li>
                            <li>+86 163 - 451 - 7894</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact details section end -->

@include('frontend.footer-orange')

@yield('script')
@include('frontend.footer-script')

</body>


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/contact-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:07 GMT -->
</html>
