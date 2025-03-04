@extends('layout.partials.master')
<!-- Include Flatpickr CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Flatpickr Theme for Material Design -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
<style>
    .dtp>.dtp-content {
        background: #ffffff !important;
        border-radius: 10px;
    }
    .dtp table.dtp-picker-days tr>td>a.selected {
        background: #3f51b5 !important;
    }
    .dtp .dtp-header {
        background: #3f51b5 !important;
    }
</style>
@section('content')
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <form class="form-inline">
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <!-- Date Input Field -->
                                        <input type="text" class="form-control border-white" id="dash-daterange" readonly>
                                        <div class="input-group-append">
                                            <!-- Calendar Icon -->
                                            <span class="input-group-text bg-blue border-blue text-white" id="datepicker-icon" style="cursor: pointer;">
                                                <i class="mdi mdi-calendar-range font-13"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                    <i class="mdi mdi-autorenew"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                    <i class="mdi mdi-filter-variant"></i>
                                </a> --}}
                            </form>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-primary border-primary border">
                                    <i class="fe-users font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $totalCustomers }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Customers</p>
                                </div>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-success border-success border">
                                    <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $todaySales }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Today's Sales</p>
                                </div>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-info border-info border">
                                    <i class="fe-user-check font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $totalAgents }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Agents</p>
                                </div>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-warning border-warning border">
                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $todayVisits }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Today's Visits</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            {{-- <div class="row">
                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Total Revenue</h4>

                        <div class="widget-chart text-center" dir="ltr">
                            <input data-plugin="knob" data-width="160" data-height="160" data-linecap=round data-fgColor="#f1556c" value="60" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>
                            <h5 class="text-muted mt-3">Total sales made today</h5>
                            <h2>$178</h2>

                            <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>$7.8k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success mr-1"></i>$1.4k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>$15k</h4>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col-->

                <div class="col-xl-8">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Sales Analytics</h4>

                        <div id="sales-analytics" class="flot-chart mt-4 pt-1" style="height: 375px;"></div>
                    </div> <!-- end card-box -->
                </div> <!-- end col-->
            </div>
            <!-- end row --> --}}

            <div class="row">
                <!-- Feedback Section -->
                <div class="col-xl-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">User Feedback</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Feedback</th>
                                        <th>Rating</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($feedbacks as $feedback)
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">{{ $feedback->user->name }}</h5>
                                        </td>
                                        <td>
                                            {{ Str::limit($feedback->comment, 50) }}
                                        </td>
                                        <td>
                                            ⭐ {{ $feedback->rating }}/5
                                        </td>
                                        <td>
                                            {{ $feedback->created_at->format('M d, Y') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Last 6 Payment Records -->
                <div class="col-xl-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Last 6 Payment Records</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Payouts</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">{{ $payment->user->name }}</h5>
                                        </td>
                                        <td>
                                            {{ optional($payment->created_at)->format('M d, Y') ?? 'N/A' }}
                                        </td>

                                        <td>
                                            ${{ number_format($payment->amount, 2) }}
                                        </td>
                                        <td>
                                            <span class="badge
                                                @if($payment->payment_status == 1) bg-soft-warning text-warning
                                                @elseif($payment->payment_status == 2) bg-soft-success text-success
                                                @else bg-soft-danger text-danger
                                                @endif
                                                shadow-none">
                                                @if($payment->payment_status == 1)
                                                    Pending
                                                @elseif($payment->payment_status == 2)
                                                    Completed
                                                @else
                                                    Failed
                                                @endif
                                            </span>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->

        </div> <!-- container -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
 document.addEventListener("DOMContentLoaded", function () {
        // Initialize Flatpickr
        let datepicker = flatpickr("#dash-daterange", {
            dateFormat: "F d, Y", // Example: February 26, 2025
            defaultDate: new Date(), // Auto-set today's date
            theme: "material_blue", // Match Material UI theme
        });

        // Open calendar when clicking the icon
        document.getElementById("datepicker-icon").addEventListener("click", function () {
            datepicker.open();
        });
    });
</script>
@endsection
