<!-- Topbar Start -->
<div class="navbar-custom">
<ul class="list-unstyled topnav-menu float-right mb-0">

    <li class="d-none d-sm-block">
        <form class="app-search">
            <div class="app-search-box">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn" type="submit">
                            <i class="fe-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </li>


    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="{{ Auth::guard('admin')->user()->img ? asset(Auth::guard('admin')->user()->img) : asset('assets/images/users/1737714810.png') }}" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
               {{Auth::guard('admin')->user()->name ?? ""}}<i class="mdi mdi-chevron-down"></i>
               {{-- @dd(Auth::user()->email) --}}
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="{{ route('admin.account') }}" class="dropdown-item notify-item">
                <i class="fe-user"></i>
                <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-settings"></i>
                <span>Settings</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-lock"></i>
                <span>Lock Screen</span>
            </a>

            <div class="dropdown-divider"></div>

           <!-- Hidden Logout Form -->
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <!-- Visible Logout Button -->
            <a href="javascript:void(0);" id="logoutBtn" class="dropdown-item notify-item">
                <i class="fe-log-out"></i>
                <span>Logout</span>
            </a>
        </div>
    </li>
</ul>

<!-- LOGO -->
<div class="logo-box">
    <a href="index.html" class="logo text-center">
        <span class="logo-lg">
            <img src="{{ URL::asset('assets/images/logo-light.png')}}" alt="" height="18" >
            <!-- <span class="logo-lg-text-light">UBold</span> -->
        </span>
        <span class="logo-sm">
            <!-- <span class="logo-sm-text-dark">U</span> -->
            <img src="{{ URL::asset('assets/images/logo-sm.png')}}" alt="" height="24" >
        </span>
    </a>
</div>

<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
    <li>
        <button class="button-menu-mobile waves-effect waves-light">
            <i class="fe-menu"></i>
        </button>
    </li>

    <li class="dropdown d-none d-lg-block">
        <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            Create New
            <i class="mdi mdi-chevron-down"></i>
        </a>
        <div class="dropdown-menu">
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">
                <i class="fe-briefcase mr-1"></i>
                <span>New Projects</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">
                <i class="fe-user mr-1"></i>
                <span>Create Users</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">
                <i class="fe-bar-chart-line- mr-1"></i>
                <span>Revenue Report</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">
                <i class="fe-settings mr-1"></i>
                <span>Settings</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">
                <i class="fe-headphones mr-1"></i>
                <span>Help & Support</span>
            </a>

        </div>
    </li>

</ul>
</div>
<!-- end Topbar -->
@section('script')
<script>
    document.getElementById('logoutBtn').addEventListener('click', function () {
        document.getElementById('logoutForm').submit();
    });
</script>
@endsection
