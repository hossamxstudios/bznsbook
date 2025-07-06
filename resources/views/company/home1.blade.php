<!doctype html>
@include('company.main.html')

<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('company.main.meta')
    <style>
        #datable_1_filter,#datable_11_filter {
            float: right;
        }
    </style>
</head>

<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active" >
        @include('company.main.sidebar')
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">
                            @include('company.sections.home.topbar')
                            @include('company.sections.home.dashboard')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('company.main.scripts')

    <script>
        $('input[name="datetimes"]').daterangepicker({
            timePicker: false,
            startDate: moment('{{ $startDate }}'),
            endDate: moment('{{ $endDate }}'),
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
            series: [{{ $all_candidates }}, {{ $all_applications }}, {{ $all_jobs }}],
            chart: {
            width: 380,
            type: 'donut',
            },
            colors: ['#3e3e3e', '#007d0a', '#000'],
            fill: {
            type: 'gradient',
            },
            labels: ['Candidates', 'Applications', 'Jobs'],
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

        var options2 = {
            series: [{{ $total_candidates }}],
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
            labels: ['Total Candidates'],
            colors: ['#000000'],
        };
        var chart2 = new ApexCharts(document.querySelector("#radial_chart_4"), options2);
        chart2.render();


    </script>
</body>

</html>
