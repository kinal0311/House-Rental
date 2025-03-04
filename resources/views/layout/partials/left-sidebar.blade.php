<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        @php
            $admin = Auth::guard('admin')->user();
        @endphp
        <ul class="metismenu" id="side-menu">
            @if($admin && $admin->role_id == 1)
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-chart-line"></i>
                        {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-shield"></i>
                        <span> Admins </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.admin.index') }}">Admin</a>
                            {{-- <a href="{{ route('admin.admin.index') }}">Admin</a> --}}
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.properties.index')}}">
                        <i class="fe-home"></i>
                        <span> Property Management </span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    {{-- <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="apps-kanbanboard.html">Kanban Board</a>
                        </li>
                        <li>
                            <a href="apps-calendar.html">Calendar</a>
                        </li>
                        <li>
                            <a href="apps-contacts.html">Contacts</a>
                        </li>
                        <li>
                            <a href="apps-projects.html">Projects</a>
                        </li>
                        <li>
                            <a href="apps-tickets.html">Tickets</a>
                        </li>
                        <li>
                            <a href="apps-companies.html">Companies</a>
                        </li>
                    </ul> --}}
                </li>

                <li>
                    <a href="{{ route('admin.user.index')}}">
                        <i class="fas fa-users-cog"></i>
                        <span> User Management </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('admin.property_image.index')}}">
                        <i class="fe-shopping-cart"></i>
                        <span> Property Image </span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.payment.index')}}">
                        <i class="fe-file-text"></i>
                        <span> Booking Order </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.agent.index')}}">
                        <i class="fas fa-user-tie"></i>
                        <span> Agent Management </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.review.index')}}">
                        <i class="fas fa-comments"></i>
                        <span> Feedback </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);">
                        <i class="fe-sidebar"></i>
                        <span class="badge badge-pink float-right">New</span>
                        <span> Portfolio </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-file-text"></i>
                        <span> Settings </span>
                    </a>
                </li> --}}
            @elseif($admin && $admin->role_id == 2)
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin.master') }}">
                        <i class="fas fa-chart-line"></i>
                        {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                        <span> Dashboards </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.properties.index')}}">
                        <i class="fe-home"></i>
                        <span> Property Management </span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    {{-- <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="apps-kanbanboard.html">Kanban Board</a>
                        </li>
                        <li>
                            <a href="apps-calendar.html">Calendar</a>
                        </li>
                        <li>
                            <a href="apps-contacts.html">Contacts</a>
                        </li>
                        <li>
                            <a href="apps-projects.html">Projects</a>
                        </li>
                        <li>
                            <a href="apps-tickets.html">Tickets</a>
                        </li>
                        <li>
                            <a href="apps-companies.html">Companies</a>
                        </li>
                    </ul> --}}
                </li>
        @endif
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
