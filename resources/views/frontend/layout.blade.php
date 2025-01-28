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
        @include('frontend.property-section')
    </section>
    <!-- property section end -->

    <!-- feature section start -->
    <section class="feature-section banner-4">
        @include('frontend.feature-section')
    </section>
    <!-- feature section end -->

    <!-- property section start -->
    <section class="property-section property-color-6">
        @include('frontend.property-section2')
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
        @include('frontend.about-section')
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


<!-- Mirrored from themes.pixelstrap.com/sheltos/main/layout-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:54:02 GMT -->
</html>
