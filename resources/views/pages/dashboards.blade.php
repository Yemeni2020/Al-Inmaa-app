@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title', 'Dashboard Analytics')
{{-- venodr style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/dragula.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/widgets.css') }}">
    <style>
        <style>
        /* Make the canvas responsive */
        #visitChart {
            max-width: 100%;
            height: auto;
        }
    </style>
    </style>
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    @if (auth()->user()->userHasRole('Admin'))
        <section id="dashboard-analytics">
            <div class="row">
                <!-- Website Analytics Starts-->
                {{-- <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">{{ __('locale.Website Analytics') }}</h4>
                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                        </div>
                        <div class="card-body pb-1">
                            <div class="d-flex justify-content-around align-items-center flex-wrap">
                                <div class="user-analytics mr-2">
                                    <i class="bx bx-user mr-25 align-middle"></i>
                                    <span class="align-middle text-muted">Users</span>
                                    <div class="d-flex">
                                        <div id="radial-success-chart"></div>
                                        <h3 class="mt-1 ml-50">61K</h3>
                                    </div>
                                </div>
                                <div class="sessions-analytics mr-2">
                                    <i class="bx bx-trending-up align-middle mr-25"></i>
                                    <span class="align-middle text-muted">Sessions</span>
                                    <div class="d-flex">
                                        <div id="radial-warning-chart"></div>
                                        <h3 class="mt-1 ml-50">92K</h3>
                                    </div>
                                </div>
                                <div class="bounce-rate-analytics">
                                    <i class="bx bx-pie-chart-alt align-middle mr-25"></i>
                                    <span class="align-middle text-muted">Bounce Rate</span>
                                    <div class="d-flex">
                                        <div id="radial-danger-chart"></div>
                                        <h3 class="mt-1 ml-50">72.6%</h3>
                                    </div>
                                </div>
                            </div>
                            <div id="sessionsChart" class="my-75"></div>
                        </div>
                    </div>

                </div> --}}
                <!-- Website Analytics Starts -->
<div class="col-md-6 col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">{{ __('locale.Website Analytics') }}</h4>
            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body pb-1">
            <div class="d-flex justify-content-around align-items-center flex-wrap">
                <div class="user-analytics mr-2">
                    <i class="bx bx-user mr-25 align-middle"></i>
                    <span class="align-middle text-muted">Users</span>
                    <div class="d-flex">
                        <div id="radial-success-chart"></div>
                        <h3 class="mt-1 ml-50" id="userCount">0</h3> <!-- Placeholder for dynamic data -->
                    </div>
                </div>
                <div class="sessions-analytics mr-2">
                    <i class="bx bx-trending-up align-middle mr-25"></i>
                    <span class="align-middle text-muted">Sessions</span>
                    <div class="d-flex">
                        <div id="radial-warning-chart"></div>
                        <h3 class="mt-1 ml-50" id="sessionCount">0</h3> <!-- Placeholder for dynamic data -->
                    </div>
                </div>
                <div class="bounce-rate-analytics">
                    <i class="bx bx-pie-chart-alt align-middle mr-25"></i>
                    <span class="align-middle text-muted">Bounce Rate</span>
                    <div class="d-flex">
                        <div id="radial-danger-chart"></div>
                        <h3 class="mt-1 ml-50" id="bounceRate">0%</h3> <!-- Placeholder for dynamic data -->
                    </div>
                </div>
            </div>
            <div id="sessionsChart" class="my-75"></div> <!-- This will render the dynamic chart -->
        </div>
    </div>
</div>
<!-- Website Analytics Ends -->
                <div style="width: 100%; max-width: 800px; margin: 0 auto;">
                    <canvas id="visitChart"></canvas>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 dashboard-referral-impression">
                    <div class="row">
                        <!-- Referral Chart Starts-->
                        <div class="col-xl-12 col-12">
                            <div class="card">
                                <div class="card-body text-center pb-0">
                                    <h2>$32,690</h2>
                                    <span class="text-muted">Referral 40%</span>
                                    <div id="success-line-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Impression Radial Chart Starts-->
                        <div class="col-xl-12 col-12">
                            <div class="card">
                                <div class="card-body donut-chart-wrapper">
                                    <div id="donut-chart" class="d-flex justify-content-center"></div>
                                    <ul class="list-inline d-flex justify-content-around mb-0">
                                        <li> <span class="bullet bullet-xs bullet-primary mr-50"></span>Services</li>
                                        <li> <span class="bullet bullet-xs bullet-info mr-50"></span>Products</li>
                                        <li> <span class="bullet bullet-xs bullet-warning mr-50"></span>Search</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12 col-sm-12">
                    <div class="row">
                        <!-- Conversion Chart Starts-->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-xl-0 pt-xl-1">
                                    <div class="conversion-title">
                                        <h4 class="card-title">Conversion</h4>
                                        <p>60%
                                            <i
                                                class="bx bx-trending-up text-success font-size-small align-middle mr-25"></i>
                                        </p>
                                    </div>
                                    <div class="conversion-rate">
                                        <h2>89k</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div id="bar-negative-chart" class="negative-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-user text-primary font-medium-2"></i>
                                                    </div>
                                                </div>
                                                <div class="total-amount">
                                                    <h5 class="mb-0">$38,566</h5>
                                                    <small class="text-muted">Conversion</small>
                                                </div>
                                            </div>
                                            <div id="primary-line-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                                                    <div class="avatar-content">
                                                        <i class="bx bx-user text-primary font-medium-2"></i>
                                                    </div>
                                                </div>
                                                <div class="total-amount">
                                                    <h5 class="mb-0">{{$userCounts}}</h5>
                                                    <small class="text-muted">Users</small>
                                                </div>
                                            </div>
                                            <div id="warning-line-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Activity Card Starts-->
                <div class="col-xl-3 col-md-6 col-12 activity-card">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Activity</h4>
                        </div>
                        <div class="card-body pt-1">
                            <div class="d-flex activity-content">
                                <div class="avatar bg-rgba-primary m-0 mr-75">
                                    <div class="avatar-content">
                                        <i class="bx bx-bar-chart-alt-2 text-primary"></i>
                                    </div>
                                </div>
                                <div class="activity-progress flex-grow-1">
                                    <small class="text-muted d-inline-block mb-50">Total Sales</small>
                                    <small class="float-right">$8,125</small>
                                    <div class="progress progress-bar-primary progress-sm">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            style="width:50%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex activity-content">
                                <div class="avatar bg-rgba-success m-0 mr-75">
                                    <div class="avatar-content">
                                        <i class="bx bx-dollar text-success"></i>
                                    </div>
                                </div>
                                <div class="activity-progress flex-grow-1">
                                    <small class="text-muted d-inline-block mb-50">Income Amount</small>
                                    <small class="float-right">$18,963</small>
                                    <div class="progress progress-bar-success progress-sm">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                            style="width:80%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex activity-content">
                                <div class="avatar bg-rgba-warning m-0 mr-75">
                                    <div class="avatar-content">
                                        <i class="bx bx-stats text-warning"></i>
                                    </div>
                                </div>
                                <div class="activity-progress flex-grow-1">
                                    <small class="text-muted d-inline-block mb-50">Total Budget</small>
                                    <small class="float-right">$14,150</small>
                                    <div class="progress progress-bar-warning progress-sm">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                            style="width:60%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-75">
                                <div class="avatar bg-rgba-danger m-0 mr-75">
                                    <div class="avatar-content">
                                        <i class="bx bx-check text-danger"></i>
                                    </div>
                                </div>
                                <div class="activity-progress flex-grow-1">
                                    <small class="text-muted d-inline-block mb-50">Completed Tasks</small>
                                    <small class="float-right">106</small>
                                    <div class="progress progress-bar-danger progress-sm">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="30"
                                            style="width:30%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profit Report Card Starts-->
                <div class="col-xl-3 col-md-6 col-12 profit-report-card">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Profit Report</h4>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-body d-flex justify-content-around">
                                    <div class="d-inline-flex mr-xl-2">
                                        <div id="profit-primary-chart"></div>
                                        <div class="profit-content ml-50 mt-50">
                                            <h5 class="mb-0">$12k</h5>
                                            <small class="text-muted">2020</small>
                                        </div>
                                    </div>
                                    <div class="d-inline-flex">
                                        <div id="profit-info-chart"></div>
                                        <div class="profit-content ml-50 mt-50">
                                            <h5 class="mb-0">$64k</h5>
                                            <small class="text-muted">2019</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Registrations</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-end justify-content-around">
                                        <div class="registration-content mr-xl-1">
                                            <h4 class="mb-0">56.3k</h4>
                                            <i class="bx bx-trending-up success align-middle"></i>
                                            <span class="text-success">12.8%</span>
                                        </div>
                                        <div id="registration-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sales Chart Starts-->
                <div class="col-xl-3 col-md-6 col-12 sales-card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title-content">
                                <h4 class="card-title">Sales</h4>
                                <small class="text-muted">Calculated in last 7 days</small>
                            </div>
                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                        </div>
                        <div class="card-body">
                            <div id="sales-chart" class="mb-2"></div>
                            <div class="d-flex justify-content-between my-1">
                                <div class="sales-info d-flex align-items-center">
                                    <i class='bx bx-up-arrow-circle text-primary font-medium-5 mr-50'></i>
                                    <div class="sales-info-content">
                                        <h6 class="mb-0">Best Selling</h6>
                                        <small class="text-muted">Sunday</small>
                                    </div>
                                </div>
                                <h6 class="mb-0">28.6k</h6>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="sales-info d-flex align-items-center">
                                    <i class='bx bx-down-arrow-circle icon-light font-medium-5 mr-50'></i>
                                    <div class="sales-info-content">
                                        <h6 class="mb-0">Lowest Selling</h6>
                                        <small class="text-muted">Thursday</small>
                                    </div>
                                </div>
                                <h6 class="mb-0">986k</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Growth Chart Starts-->
                <div class="col-xl-3 col-md-6 col-12 growth-card">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButtonSec" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    2020
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                                    <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                    <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    <a class="dropdown-item" href="javascript:void(0);">2018</a>
                                </div>
                            </div>
                            <div id="growth-Chart"></div>
                            <h6 class="mt-2"> 62% Growth in 2020</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Task Card Starts -->
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="card widget-todo">
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap">
                                    <h4 class="card-title d-flex mb-25 mb-sm-0">
                                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Tasks
                                    </h4>
                                    <ul class="list-inline d-flex mb-25 mb-sm-0">
                                        <li class="d-flex align-items-center">
                                            <i class='bx bx-filter font-medium-3 mr-50'></i>
                                            <div class="dropdown">
                                                <div class="dropdown-toggle mr-1 cursor-pointer" role="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Filter</div>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="javascript:void(0);">My Tasks</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Due this week</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Due next week</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Custom Filter</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class='bx bx-sort mr-50 font-medium-3'></i>
                                            <div class="dropdown">
                                                <div class="dropdown-toggle cursor-pointer" role="button"
                                                    id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Sort</div>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="javascript:void(0);">None</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Alphabetical</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Due Date</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Assignee</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body px-0 py-1">
                                    <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                                                    <div class="checkbox checkbox-shadow">
                                                        <input type="checkbox" class="checkbox__input" id="checkbox1">
                                                        <label for="checkbox1"></label>
                                                    </div>
                                                    <span class="widget-todo-title ml-50">Add SCSS and JS files if
                                                        required</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <div class="badge badge-pill badge-light-success mr-1">frontend</div>
                                                    <div class="avatar bg-rgba-primary m-0 mr-50">
                                                        <div class="avatar-content">
                                                            <span class="font-size-base text-primary">RA</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                Details</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Duplicate
                                                                Task</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete
                                                                Task</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                                                    <div class="checkbox checkbox-shadow">
                                                        <input type="checkbox" class="checkbox__input" id="checkbox2">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                    <span class="widget-todo-title ml-50">Check your changes, before
                                                        commiting</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <div class="badge badge-pill badge-light-danger mr-1">backend</div>
                                                    <div class="avatar m-0 mr-50">
                                                        <img src="{{ asset('images/profile/user-uploads/social-2.jpg') }}"
                                                            alt="img placeholder" height="32" width="32">
                                                    </div>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                Details</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Duplicate
                                                                Task</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete
                                                                Task</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="widget-todo-item completed">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                                                    <div class="checkbox checkbox-shadow">
                                                        <input type="checkbox" class="checkbox__input" id="checkbox3"
                                                            checked>
                                                        <label for="checkbox3"></label>
                                                    </div>
                                                    <span class="widget-todo-title ml-50">Dribble, Behance, UpLabs &
                                                        Pinterest
                                                        Post</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <div class="badge badge-pill badge-light-primary mr-1">UI/UX</div>
                                                    <div class="avatar bg-rgba-primary m-0 mr-50">
                                                        <div class="avatar-content">
                                                            <span class="font-size-base text-primary">JP</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                Details</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Duplicate
                                                                Task</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete
                                                                Task</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                                                    <div class="checkbox checkbox-shadow">
                                                        <input type="checkbox" class="checkbox__input" id="checkbox4">
                                                        <label for="checkbox4"></label>
                                                    </div>
                                                    <span class="widget-todo-title ml-50">Fresh Design Web & Responsive
                                                        Miracle</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <div class="badge badge-pill badge-light-info mr-1">Design</div>
                                                    <div class="avatar m-0 mr-50">
                                                        <img src="{{ asset('images/profile/user-uploads/user-05.jpg') }}"
                                                            alt="img placeholder" height="32" width="32">
                                                    </div>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                Details</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Duplicate
                                                                Task</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete
                                                                Task</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                                                    <div class="checkbox checkbox-shadow">
                                                        <input type="checkbox" class="checkbox__input" id="checkbox5">
                                                        <label for="checkbox5"></label>
                                                    </div>
                                                    <span class="widget-todo-title ml-50">Add Calendar page, source and
                                                        credit
                                                        page in
                                                        documentation</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <div class="badge badge-pill badge-light-warning mr-1">Javascript</div>
                                                    <div class="avatar bg-rgba-primary m-0 mr-50">
                                                        <div class="avatar-content">
                                                            <span class="font-size-base text-primary">AK</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                Details</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Duplicate
                                                                Task</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete
                                                                Task</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <i class='bx bx-grid-vertical mr-25 font-medium-4 cursor-move'></i>
                                                    <div class="checkbox checkbox-shadow">
                                                        <input type="checkbox" class="checkbox__input" id="checkbox6">
                                                        <label for="checkbox6"></label>
                                                    </div>
                                                    <span class="widget-todo-title ml-50">Add Angular Starter-kit</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <div class="badge badge-pill badge-light-primary mr-1">UI/UX</div>
                                                    <div class="avatar m-0 mr-50">
                                                        <img src="{{ asset('images/profile/user-uploads/user-05.jpg') }}"
                                                            alt="img placeholder" height="32" width="32">
                                                    </div>
                                                    <div class="dropdown">
                                                        <span
                                                            class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                Details</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Duplicate
                                                                Task</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete
                                                                Task</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Daily Financials Card Starts -->
                <div class="col-lg-5">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">
                                Order Timeline
                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="timeline mb-0">
                                <li class="timeline-item timeline-icon-primary active">
                                    <div class="timeline-time">September, 16</div>
                                    <h6 class="timeline-title">1983, orders, $4220</h6>
                                    <p class="timeline-text">2 hours ago</p>
                                    <div class="timeline-content">
                                        <img src="{{ asset('images/icon/pdf.png') }}" alt="document" height="23"
                                            width="19" class="mr-50">New
                                        Order.pdf
                                    </div>
                                </li>
                                <li class="timeline-item timeline-icon-primary active">
                                    <div class="timeline-time">September, 17</div>
                                    <h6 class="timeline-title">12 Invoices have been paid</h6>
                                    <p class="timeline-text">25 minutes ago</p>
                                    <div class="timeline-content">
                                        <img src="{{ asset('images/icon/pdf.png') }}" alt="document" height="23"
                                            width="19" class="mr-50">Invoices.pdf
                                    </div>
                                </li>
                                <li class="timeline-item timeline-icon-primary active pb-0">
                                    <div class="timeline-time">September, 18</div>
                                    <h6 class="timeline-title">Order #37745 from September</h6>
                                    <p class="timeline-text">4 minutes ago</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <h2>Website Analytics - Sessions Over the Last 7 Days</h2> --}}

<canvas id="sessionsChart" width="400" height="200"></canvas>
        </section>
        <!-- Dashboard Analytics end -->
    @endif


@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{ asset('vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/dragula.min.js') }}"></script>
@endsection

@section('page-scripts')
    {{-- <script src="{{ asset('js/scripts/pages/dashboard-analytics.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // Fetch dynamic data using AJAX
        function fetchAnalyticsData() {
            fetch('{{ route("pages.dashboards") }}')
                .then(response => response.json())
                .then(data => {
                    // Update users, sessions, and bounce rate dynamically
                    document.getElementById('userCount').textContent = data.users;
                    document.getElementById('sessionCount').textContent = data.sessions;
                    document.getElementById('bounceRate').textContent = data.bounce_rate + '%';

                    // Render charts with dynamic data using ApexCharts or Chart.js (as before)
                    // ...
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Call function to fetch data on page load
        fetchAnalyticsData();
    </script>

    <script>
        // Fetch dynamic data using AJAX
        function fetchAnalyticsData() {
            fetch('{{ route("pages.dashboards") }}')
                .then(response => response.json())
                .then(data => {
                    // Update users, sessions, and bounce rate
                    document.getElementById('userCount').textContent = data.users;
                    document.getElementById('sessionCount').textContent = data.sessions;
                    document.getElementById('bounceRate').textContent = data.visitData + '%';

                    // Render charts dynamically using ApexCharts
                    var options1 = {
                        chart: { height: 150, type: 'radialBar' },
                        series: [data.users_percentage],
                        colors: ['#28C76F'],
                        plotOptions: { radialBar: { hollow: { size: '70%' } } }
                    };
                    var chart1 = new ApexCharts(document.querySelector("#radial-success-chart"), options1);
                    chart1.render();

                    var options2 = {
                        chart: { height: 150, type: 'radialBar' },
                        series: [data.sessions_percentage],
                        colors: ['#FF9F43'],
                        plotOptions: { radialBar: { hollow: { size: '70%' } } }
                    };
                    var chart2 = new ApexCharts(document.querySelector("#radial-warning-chart"), options2);
                    chart2.render();

                    var options3 = {
                        chart: { height: 150, type: 'radialBar' },
                        series: [data.bounce_rate],
                        colors: ['#EA5455'],
                        plotOptions: { radialBar: { hollow: { size: '70%' } } }
                    };
                    var chart3 = new ApexCharts(document.querySelector("#radial-danger-chart"), options3);
                    chart3.render();

                    // Render line chart for sessions over time
                    var sessionOptions = {
                        chart: { type: 'line', height: 200 },
                        series: [{
                            name: 'Sessions',
                            data: data.sessions_chart_data
                        }],
                        xaxis: {
                            categories: data.sessions_chart_labels
                        }
                    };
                    var sessionChart = new ApexCharts(document.querySelector("#sessionsChart"), sessionOptions);
                    sessionChart.render();
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Call function to fetch data on page load
        fetchAnalyticsData();
    </script>
    <script>
        $(window).on("load", function() {

            var $primary = '#5A8DEE';
            var $success = '#39DA8A';
            var $danger = '#FF5B5C';
            var $warning = '#FDAC41';
            var $info = '#00CFDD';
            var $label_color = '#475f7b';
            var $primary_light = '#E2ECFF';
            var $danger_light = '#ffeed9';
            var $gray_light = '#828D99';
            var $sub_label_color = "#596778";
            var $radial_bg = "#e7edf3";

            // Donut Chart
            // ---------------------
            var donutChartOption = {
                chart: {
                    width: 180,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false
                },
                series: [{{$serviceCounts}}, {{$postCounts}}, {{$bannerCounts}}],
                labels: ["Social", "Posts", "Banners"],
                stroke: {
                    width: 0,
                    lineCap: 'round',
                },
                colors: [$primary, $info, $warning],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '90%',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '15px',
                                    colors: $sub_label_color,
                                    offsetY: 20,
                                    fontFamily: 'IBM Plex Sans',
                                },
                                value: {
                                    show: true,
                                    fontSize: '26px',
                                    fontFamily: 'Rubik',
                                    color: $label_color,
                                    offsetY: -20,
                                    formatter: function(val) {
                                        return val
                                    }
                                },
                                total: {
                                    show: true,
                                    label: 'Impression',
                                    color: $gray_light,
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce(function(a, b) {
                                            return a + b
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                legend: {
                    show: false
                }
            }

            var donutChart = new ApexCharts(
                document.querySelector("#donut-chart"),
                donutChartOption
            );

            donutChart.render();

            // Bar Chart
  // ---------
  var analyticsBarChartOptions = {
    chart: {
      height: 260,
      type: 'bar',
      toolbar: {
        show: false
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '20%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    colors: [$primary, '#B6CDF8'],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'light',
        type: "vertical",
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 70, 100]
      },
    },
    series: [{
      name: '2020',
      data: [80, 95, 150, 210, 140, 230, 300, 280, 130]
    }, {
      name: '2019',
      data: [50, 70, 130, 180, 90, 180, 270, 220, 110]
    }],
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        style: {
          colors: $gray_light
        }
      }
    },
    yaxis: {
      min: 0,
      max: 300,
      tickAmount: 3,
      labels: {
        style: {
          color: $gray_light
        }
      }
    },
    legend: {
      show: false
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
  }

  var analyticsBarChart = new ApexCharts(
    document.querySelector("#analytics-bar-chart"),
    analyticsBarChartOptions
  );

  analyticsBarChart.render();




  ////////////*******************////////////////

  // Data passed from the controller
  const dates = @json($dates);
    const sessionCounts = @json($sessionCounts);

    const ctx = document.getElementById('sessionsChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',  // Define the chart type
        data: {
            labels: dates, // The labels are the dates
            datasets: [{
                label: 'Number of Sessions',
                data: sessionCounts, // Data for sessions per day
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


});
    </script>
    <script>
       // Data from the backend
       var visitData = @json($visitData->pluck('count'));
        var labels = @json($visitData->pluck('date'));

        // Dynamic gradient color
        var ctx = document.getElementById('visitChart').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(75, 192, 192, 0.5)');
        gradient.addColorStop(1, 'rgba(153, 102, 255, 0.5)');

        // Create the chart
        var chart = new Chart(ctx, {
            type: 'line', // You can change to 'bar' or 'pie' for flexibility
            data: {
                labels: labels, // X-axis labels (dates)
                datasets: [{
                    label: 'Number of Visits',
                    data: visitData, // Y-axis data (visit counts)
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: gradient, // Apply gradient background
                    borderWidth: 2, // Thicker border for clarity
                    fill: true, // Enable fill under the line
                    tension: 0.4, // Rounded line edges for a modern look
                }]
            },
            options: {
                responsive: true, // Enable responsiveness
                maintainAspectRatio: false, // Let it scale
                interaction: {
                    mode: 'index',
                    intersect: false, // Tooltip will display when hovering between points
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                // Format tooltip text
                                return context.dataset.label + ': ' + context.raw + ' visits';
                            }
                        }
                    },
                    legend: {
                        display: true, // Show the dataset legend
                        position: 'top',
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date',
                        }
                    },
                    y: {
                        beginAtZero: true, // Start Y-axis at 0
                        title: {
                            display: true,
                            text: 'Visits',
                        }
                    }
                }
            }
        });
    </script>
@endsection
