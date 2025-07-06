<!doctype html>
@include('admin.main.html')

<head>
    <meta charset="utf-8" />
    <title>BZNS BOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
    <style>
        #datable_1_filter,#datable_11_filter {
            float: right;
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active" >
        @include('admin.main.sidebar')
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            {{-- @include('admin.main.topbar') --}}
                            @include('admin.sections.home.topbar')
                            @include('admin.sections.home.dashboard')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
    <script>
        function submitForm() {
            alert  ('submitting');
            $('#dateFilterForm').submit();
        }
    </script>
    <script>
        $('input[name="datetimes"]').daterangepicker({
            timePicker: false,
            startDate: moment('{{"$startDate"}}'),
            endDate:  moment('{{"$endDate"}}'),
            "cancelClass": "btn-secondary",
            locale: {
                format: 'M/DD hh:mm A'
            }
        }, function(start, end) {
            $('#start_date').val(start.format('YYYY-MM-DD HH:mm:ss'));
            $('#end_date').val(end.format('YYYY-MM-DD HH:mm:ss'));
            $('#dateFilterForm').submit();
        });
        var options1 = {
                series: [{{ $total_lost_deals }},{{ $total_won_deals }},{{ $total_pending_deals }}],
                chart: {
                    width: 380,
                    type: 'donut',
                },
                colors: ['#3e3e3e', '#007d0a', '#000'],
                fill: {
                    type: 'gradient',
                    },
                labels: ['Lost', 'Won','Pending'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
        var chart1 = new ApexCharts(document.querySelector("#pie_chart_1"), options1);
        chart1.render();
        /*Gradient Chart*/
        var options2 = {
            series: [{{ $paid_deals }}*100/({{ $paid_deals + $unpaid_deals? $paid_deals + $unpaid_deals : 1 }})],
            chart: {
                height: 250,
                type: 'radialBar',
                toolbar: {
                    show: true
                }
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: '70%',
                        background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: '#fff',
                        strokeWidth: '67%',
                        margin: 0,
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: '#888',
                            fontSize: '17px'
                        },
                        value: {
                            formatter: function(val) {
                            return parseInt(val) + '%';
                            },
                            color: '#111',
                            fontSize: '36px',
                            show: true,
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'horizontal',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#3e3e3e'],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Paid Deals',],
            colors: ['#000000'],

        };
        var chart2 = new ApexCharts(document.querySelector("#radial_chart_4"), options2);
        chart2.render();


    </script>
</body>

</html>
