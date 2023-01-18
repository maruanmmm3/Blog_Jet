@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Graficos de Barra</h1>
@stop

@section('content')

    <div class="container">

        <div class="row row-cols-2">
            {{-- @if (user->auth()->)
                
            @else
                
            @endif --}}
          {{-- Hacer que los ususarios bloguer no vean los graficos de barra --}}
            @can('admin.home')
                <div class="col 6">
                    <canvas id="myChart"></canvas>
                </div>
            @endcan
                
            @can('admin.home')
                <div class="col 6">
                    <canvas id="myChart2"></canvas>
                </div>
            @endcan
        </div>
        
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var cantusers = <?php echo json_encode($users); ?>;
        var categoriesNombre = <?php echo json_encode($categoriesNombre); ?>;
        var postR = <?php echo json_encode($postR); ?>;

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categoriesNombre,
            datasets: [{
            label: 'Cantidad de Post por Categoria',
            data: postR,
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        var postspublic = <?php echo json_encode($postspublic); ?>;
        var postseraser = <?php echo json_encode($postseraser); ?>;

        const ctx2 = document.getElementById('myChart2');
        new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Post publicados','Post en Borrador'],
            datasets: [{
            label: 'Cantidad de Post por Categoria',
            data: [postspublic , postseraser],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

    </script>
@stop