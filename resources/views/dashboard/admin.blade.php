@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Dashboard</h2>
                </div>
                <div class="card-body">
                    Selamat datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang diinginkan.
                    <hr>
                    <h4>Statistik Penulis</h4>
                    <canvas id="chartPenulis" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script>
        new Chart(document.getElementById("chartPenulis").getContext("2d"), {
            type: 'bar',
            data: {
                labels: {!! json_encode($authors) !!},
                datasets: [{
                    label: 'Jumlah buku',
                    data: {!! json_encode($books) !!},
                }]
            }
        });
    </script>
@endsection