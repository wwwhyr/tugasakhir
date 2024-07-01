@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5>Dashboard</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Grafik Stunting</h5>
                        </div>
                        <div class="card-body">
                            <div class="row" id="chartsContainer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .chart-div {
        margin-bottom: 20px;
        border: 1px solid #e1e5eb;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('{{ route('dashboard.stunting-data') }}')
            .then(response => response.json())
            .then(data => {
                console.log(data);  // Debugging data
                const chartsContainer = document.getElementById('chartsContainer');

                for (const [kecamatan, desaData] of Object.entries(data)) {
                    const categories = desaData.map(item => item.desa);
                    const totalData = desaData.map(item => item.total);
                    const stuntingData = desaData.map(item => item.stunting);

                    const chartDiv = document.createElement('div');
                    chartDiv.className = 'col-md-6 chart-div';
                    chartsContainer.appendChild(chartDiv);

                    var options = {
                        chart: {
                            type: 'bar',
                            height: 350,
                            toolbar: {
                                show: true
                            }
                        },
                        title: {
                            text: `Grafik Stunting Kecamatan ${kecamatan}`,
                            align: 'center'
                        },
                        series: [{
                            name: 'Total',
                            data: totalData
                        }, {
                            name: 'Stunting',
                            data: stuntingData
                        }, {

                        }],
                        plotOptions: {
                        bar: {
                            borderRadius: 4,
                            borderRadiusApplication: 'end',
                            horizontal: true,
                        }
                        },
                        xaxis: {
                            categories: categories
                        },
                        grid: {
                            row: {
                                colors: ['#f3f4f6', 'transparent'], // Warna baris grid
                                opacity: 0.5
                            }
                        },
                        colors: ['#5e72e4', '#f5365c'],
                        dataLabels: {
                            enabled: true,
                            style: {
                                colors: ['#fff']
                            },
                            formatter: function(val, opt) {
                                return opt.w.globals.labels[opt.dataPointIndex] + ": " + val;
                            },
                            offsetX: 0,
                            dropShadow: {
                                enabled: true
                            }
                        },
                        legend: {
                            position: 'bottom'
                        }
                    };

                    var chart = new ApexCharts(chartDiv, options);
                    chart.render();
                }
            })
            .catch(error => console.error('Error fetching data:', error));  // Handling fetch error
    });
</script>
@endsection
