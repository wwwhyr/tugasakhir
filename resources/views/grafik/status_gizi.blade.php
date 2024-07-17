@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5>Persentase Balita Stunting dan Tidak Stunting</h5>
                        </div>
                        <div class="card-body">
                            <form id="filterForm">
                                <div class="col-lg-2">
                                    <label for="kecamatan">Pilih Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan" class="form-control custom-select">
                                        <option value="">Semua</option>
                                        @foreach($kecamatans as $kecamatan)
                                            <option value="{{ $kecamatan->kecamatan }}">{{ $kecamatan->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="desa">Pilih Desa</label>
                                    <select id="desa" name="desa" class="form-control custom-select">
                                        <option value="">Semua</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Filter</button>
                            </form>
                            <div id="stuntingChart" style="max-width: 300px; margin: 20px 0;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h5>Data Balita</h5>
                    <ul id="balita-list"></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let stuntingChart;

    $(document).ready(function() {
        $('#kecamatan').on('change', function() {
            let kecamatan = $(this).val();
            if (kecamatan) {
                $.ajax({
                    url: '{{ route('getDesa') }}',
                    type: 'GET',
                    data: { kecamatan: kecamatan },
                    success: function(response) {
                        $('#desa').empty();
                        $('#desa').append('<option value="">Semua</option>');
                        response.forEach(function(desa) {
                            $('#desa').append('<option value="' + desa.desa + '">' + desa.desa + '</option>');
                        });
                    }
                });
            } else {
                $('#desa').empty();
                $('#desa').append('<option value="">Semua</option>');
            }
        });

        $('#filterForm').on('submit', function(e) {
            e.preventDefault();
            fetchFilteredData();
        });

        function fetchFilteredData() {
            $.ajax({
                url: '{{ route('grafik.filter') }}',
                method: 'GET',
                data: $('#filterForm').serialize(),
                success: function(response) {
                    updateTable(response.data);
                    updateChart(response.stuntingCount, response.tidakStuntingCount);
                }
            });
        }

        function updateTable(data) {
            let list = $('#balita-list');
            list.empty();
            data.forEach(balita => {
                list.append(`
                    <li>
                        Nama: ${balita.nama}, Usia: ${balita.usia} bulan, Berat Badan: ${balita.berat_badan} kg, Tinggi Badan: ${balita.tinggi_badan} cm, Skor Stunting: ${balita.stunting_score}, Status: ${balita.status}
                    </li>
                `);
            });
        }

        function updateChart(stuntingCount, tidakStuntingCount) {
            if (stuntingChart) {
                stuntingChart.destroy();
            }

            var options = {
                series: [stuntingCount, tidakStuntingCount],
                chart: {
                    type: 'donut',
                    width: 500,
                    height: 500
                },
                labels: ['Stunting', 'Tidak Stunting'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 400,
                            height: 400
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#FF0000', '#008000']
            };

            stuntingChart = new ApexCharts(document.querySelector("#stuntingChart"), options);
            stuntingChart.render();
        }

        // Fetch initial data
        fetchFilteredData();
    });
</script>
@endsection
