<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>House Rental</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Plugins css -->
            <link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

            <!-- App css -->
            <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ URL::asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

            <!-- Font awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

            <!-- Parsley CSS -->
            {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css"> --}}
            <!-- Plugin js-->
            <script src="{{ URL::asset('assets/libs/parsleyjs/parsley.css')}}"></script>

            <!-- Notiflix -->
            <link href="{{asset('assets\libs\notiflix\notiflix-2.1.2.css')}}" rel="stylesheet" type="text/css" />

            <!-- DataTable CSS -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
            <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />



    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('layout.partials.navbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layout.partials.left-sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end row -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('layout.partials.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        @include('layout.partials.right-sidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
                <!--JQuery-->
<!-- jQuery must be first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Vendor and essential plugins -->
<script src="{{ URL::asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- App scripts -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

<!-- Validation and form plugins -->
<script src="https://cdn.jsdelivr.net/npm/parsleyjs/dist/parsley.min.js"></script>
<script src="{{ URL::asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

<!-- Ensure validation script runs only after jQuery -->
{{-- <script defer src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script> --}}

<!-- DataTables and dependencies -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>

<!-- CSRF Token for AJAX -->
<script>
    var csrfToken = "{{ csrf_token() }}";
</script>

@yield('script')


    </body>
</html>
