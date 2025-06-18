document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan data dari window object
    const data = window.chartData; // Data dari PHP
    var bulan = [];
    var totalPendapatan = [];
    
    for (var key in data) {
        bulan.push(key);
        totalPendapatan.push(data[key]);
    }
    
    // Membalik urutan bulan dan total pendapatan
    bulan.reverse();
    totalPendapatan.reverse();
    
    const incomeChartEl = document.querySelector('#incomeChart'),
        config = {
            colors: {
                primary: '#7367F0'
            }
        },
        shadeColor = 'light',
        borderColor = '#EBEBEB',
        axisColor = '#B9B9C3',
        incomeChartConfig = {
            series: [
                {
                    name: 'Total Pendapatan',
                    data: totalPendapatan
                }
            ],
            chart: {
                height: 215,
                parentHeightOffset: 0,
                parentWidthOffset: 0,
                toolbar: {
                    show: false
                },
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            legend: {
                show: false
            },
            markers: {
                size: 6,
                colors: 'transparent',
                strokeColors: 'transparent',
                strokeWidth: 4,
                discrete: [
                    {
                        fillColor: config.colors.primary,
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        strokeColor: config.colors.primary,
                        strokeWidth: 2,
                        size: 6,
                        radius: 8
                    }
                ],
                hover: {
                    size: 7
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: shadeColor,
                    shadeIntensity: 0.6,
                    opacityFrom: 0.5,
                    opacityTo: 0.25,
                    stops: [0, 95, 100]
                }
            },
            grid: {
                borderColor: borderColor,
                strokeDashArray: 3,
                padding: {
                    top: -20,
                    bottom: -8,
                    left: -10,
                    right: 8
                }
            },
            xaxis: {
                categories: bulan,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: true,
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                },
                opposite: false
            },
            yaxis: {
                labels: {
                    show: false
                },
                min: 0,
                tickAmount: 4,
                title: {
                    text: 'Pendapatan'
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rp " + val.toLocaleString('id-ID'); // Format Rupiah pada tooltip
                    }
                }
            },
            title: {
                text: 'Grafik Total Pendapatan',
                align: 'center'
            }
        };

    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
        const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
        incomeChart.render();
    }
});
