@extends('layout.partials.master')
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
                                        <input type="text" class="form-control border-white" id="dash-daterange">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-blue border-blue text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                    <i class="mdi mdi-autorenew"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                    <i class="mdi mdi-filter-variant"></i>
                                </a>
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
                                    <i class="fe-heart font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1">$<span data-plugin="counterup">58,947</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Revenue</p>
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
                                    <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
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
                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                    <p class="text-muted mb-1 text-truncate">Conversion</p>
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
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                                    <p class="text-muted mb-1 text-truncate">Today's Visits</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
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
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Top 5 Users Balances</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">

                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="2">Profile</th>
                                        <th>Currency</th>
                                        <th>Balance</th>
                                        <th>Reserved in orders</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                        </td>

                                        <td>
                                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                        </td>

                                        <td>
                                            0.00816117 BTC
                                        </td>

                                        <td>
                                            0.00097036 BTC
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="assets/images/users/user-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">Erwin E. Brown</h5>
                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                        </td>

                                        <td>
                                            <i class="mdi mdi-currency-eth text-primary"></i> ETH
                                        </td>

                                        <td>
                                            3.16117008 ETH
                                        </td>

                                        <td>
                                            1.70360009 ETH
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="assets/images/users/user-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">Margeret V. Ligon</h5>
                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                        </td>

                                        <td>
                                            <i class="mdi mdi-currency-eur text-primary"></i> EUR
                                        </td>

                                        <td>
                                            25.08 EUR
                                        </td>

                                        <td>
                                            12.58 EUR
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="assets/images/users/user-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">Jose D. Delacruz</h5>
                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                        </td>

                                        <td>
                                            <i class="mdi mdi-currency-cny text-primary"></i> CNY
                                        </td>

                                        <td>
                                            82.00 CNY
                                        </td>

                                        <td>
                                            30.83 CNY
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="assets/images/users/user-6.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">Luke J. Sain</h5>
                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                        </td>

                                        <td>
                                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                        </td>

                                        <td>
                                            2.00816117 BTC
                                        </td>

                                        <td>
                                            1.00097036 BTC
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Revenue History</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">

                                <thead class="thead-light">
                                    <tr>
                                        <th>Marketplaces</th>
                                        <th>Date</th>
                                        <th>Payouts</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Themes Market</h5>
                                        </td>

                                        <td>
                                            Oct 15, 2018
                                        </td>

                                        <td>
                                            $5848.68
                                        </td>

                                        <td>
                                            <span class="badge bg-soft-warning text-warning shadow-none">Upcoming</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Freelance</h5>
                                        </td>

                                        <td>
                                            Oct 12, 2018
                                        </td>

                                        <td>
                                            $1247.25
                                        </td>

                                        <td>
                                            <span class="badge bg-soft-success text-success shadow-none">Paid</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Share Holding</h5>
                                        </td>

                                        <td>
                                            Oct 10, 2018
                                        </td>

                                        <td>
                                            $815.89
                                        </td>

                                        <td>
                                            <span class="badge bg-soft-success text-success shadow-none">Paid</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Envato's Affiliates</h5>
                                        </td>

                                        <td>
                                            Oct 03, 2018
                                        </td>

                                        <td>
                                            $248.75
                                        </td>

                                        <td>
                                            <span class="badge bg-soft-danger text-danger shadow-none">Overdue</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Marketing Revenue</h5>
                                        </td>

                                        <td>
                                            Sep 21, 2018
                                        </td>

                                        <td>
                                            $978.21
                                        </td>

                                        <td>
                                            <span class="badge bg-soft-warning text-warning shadow-none">Upcoming</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Advertise Revenue</h5>
                                        </td>

                                        <td>
                                            Sep 15, 2018
                                        </td>

                                        <td>
                                            $358.10
                                        </td>

                                        <td>
                                            <span class="badge bg-soft-success text-success shadow-none">Paid</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->
@endsection
