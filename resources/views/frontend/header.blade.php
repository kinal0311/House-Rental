<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themes.pixelstrap.com/sheltos/main/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 12:55:06 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>House Rental</title>
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
