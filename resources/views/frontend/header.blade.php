
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ URL::asset('sheltos/assets/images/logo/6.png')}}" alt="" class="img-fluid">
                            </a>
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
                                            <a href="{{ route('home') }}" class="nav-link menu-title">Home</a>
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
                                        {{-- <li class="dropdown">
                                            <a href="{{ route('contect') }}" class="nav-link menu-title">Contact</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <ul class="header-right">
                            <li class="right-menu color-6">
                                <ul class="nav-menu">
                                    <li class="dropdown">
                                        <a href="{{ route('wishlist.show')}}" title="Wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown cart">
                                        <a href="{{ auth()->check() ? route('cart.show') : route('login-user') }}" title="Add To Cart">
                                            <i data-feather="shopping-cart"></i>
                                        </a>
                                        {{-- <ul class="nav-submenu">
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
                                        </ul> --}}
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ auth()->check() ? route('myprofile') : route('login-user') }}" title="My Profile">
                                            <i data-feather="user"></i>
                                        </a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="{{ route('login-user')}}" title="User Login">
                                            <i data-feather="log-in"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('login')}}" title="Dashboard">
                                            <i class="fa-solid fa-desktop" style="color: #ffffff;"></i>
                                        </a>
                                    </li>
                                    {{-- <li class="dropdown">
                                        @if(auth()->check())
                                            <a href="{{ route('myprofile') }}">
                                                @if(auth()->user()->img)

                                                    <img src="{{ Auth::guard('web')->user()->img ? asset(Auth::guard('web')->user()->img) : asset('assets/images/users/1737714810.png') }}" alt="user-image" class="rounded-circle w-25 h-25">
                                                @else
                                                    <i data-feather="user"></i>
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('login-user') }}">
                                                <i data-feather="user"></i>
                                            </a>
                                        @endif
                                    </li> --}}
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--  header end -->
