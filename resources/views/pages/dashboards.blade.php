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

        <section id="dashboard-analytics" align="right">
            <!-- Website Analytics Starts -->
            <div class="col-md-12 col-sm-12">
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
                                    <h3 class="mt-1 ml-50" id="userCount">{{ $userCounts }}</h3>
                                    <!-- Placeholder for dynamic data -->
                                </div>
                            </div>
                            <div class="sessions-analytics mr-2">
                                <i class="bx bx-trending-up align-middle mr-25"></i>
                                <span class="align-middle text-muted">Sessions</span>
                                <div class="d-flex">
                                    <div id="radial-warning-chart"></div>
                                    <h3 class="mt-1 ml-50" id="sessionCount">{{ $sessionCounts }}</h3>
                                    <!-- Placeholder for dynamic data -->
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
                        <!-- This will render the dynamic chart -->
                    </div>
                </div>
            </div>
            <div id="sessionsChart" class="my-75"></div>
            <div style="width: 100%; max-width: 800px; margin: 0 auto;">
                <canvas id="visitChart"></canvas>
            </div>
            <div class="row">


                <!-- Website Analytics Ends -->


                {{-- <div class="col-xl-3 col-md-12 col-sm-12">
                    <div class="row">
                        <!-- Conversion Chart Starts-->

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
                                                    <h5 class="mb-0">{{ $userCounts }}</h5>
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
                </div> --}}
                <div class="col-xl-4 col-md-8 col-sm-12 dashboard-referral-impression">
                    <div class="row">
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
            fetch('{{ route('pages.dashboards') }}')
                .then(response => response.json())
                .then(data => {
                    // Update users, sessions, and bounce rate dynamically
                    document.getElementById('userCounts').textContent = data.users;
                    document.getElementById('sessionCounts').textContent = data.sessions;
                    document.getElementById('bounceRates').textContent = data.bounce_rate + '%';

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
            fetch('{{ route('pages.dashboards') }}')
                .then(response => response.json())
                .then(data => {
                    // Update users, sessions, and bounce rate
                    document.getElementById('userCounts').textContent = data.users;
                    document.getElementById('sessionCounts').textContent = data.sessions;
                    document.getElementById('bounceRate').textContent = data.visitData + '%';

                    // Render charts dynamically using ApexCharts
                    var options1 = {
                        chart: {
                            height: 150,
                            type: 'radialBar'
                        },
                        series: [data.users_percentage],
                        colors: ['#28C76F'],
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: '70%'
                                }
                            }
                        }
                    };
                    var chart1 = new ApexCharts(document.querySelector("#radial-success-chart"), options1);
                    chart1.render();

                    var options2 = {
                        chart: {
                            height: 150,
                            type: 'radialBar'
                        },
                        series: [data.sessions_percentage],
                        colors: ['#FF9F43'],
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: '70%'
                                }
                            }
                        }
                    };
                    var chart2 = new ApexCharts(document.querySelector("#radial-warning-chart"), options2);
                    chart2.render();

                    var options3 = {
                        chart: {
                            height: 150,
                            type: 'radialBar'
                        },
                        series: [data.bounce_rate],
                        colors: ['#EA5455'],
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: '70%'
                                }
                            }
                        }
                    };
                    var chart3 = new ApexCharts(document.querySelector("#radial-danger-chart"), options3);
                    chart3.render();

                    // Render line chart for sessions over time
                    var sessionOptions = {
                        chart: {
                            type: 'line',
                            height: 200
                        },
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
                series: [{{ $serviceCounts }}, {{ $postCounts }}, {{ $bannerCounts }}],
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
                        formatter: function(val) {
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
                type: 'line', // Define the chart type
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
