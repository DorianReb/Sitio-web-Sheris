@extends('layouts.navbar_dashboard')

@section('content')
<div class="row">
    <!-- Contenido Principal -->
    <div class="col-8 p-5 border">
        <input type="text" class="form-control" placeholder="Buscar producto...">

        <!-- Inventario -->
        <div class="row p-4">
            <h3>Categorías</h3>
            <div class="col-2 p-3 md-3 card text-center shadow card-body bg-warning">
                <h6 class="text-light fw-bold"><i class="fa-solid fa-car"></i> Vehículos</h6>
                <p class="text-light fw-bold">10 productos</p>
            </div>
            <div class="col-2 p-3 ms-3 card text-center shadow card-body bg-success">
                <h6 class="text-light fw-bold"><i class="fa-solid fa-dog"></i> Peluches</h6>
                <p class="text-light fw-bold">30 productos</p>
            </div>
            <div class="col-2 p-3 ms-3 card text-center shadow card-body bg-danger">
                <h6 class="text-light fw-bold"><i class="fa-solid fa-puzzle-piece"></i> Juegos</h6>
                <p class="text-light fw-bold">15 productos</p>
            </div>
            <div class="col-2 p-3 ms-3 card text-center shadow card-body bg-info">
                <h6 class="text-light fw-bold"><i class="fa-solid fa-robot"></i> Electronic</h6>
                <p class="text-light fw-bold">5 productos</p>
            </div>
        </div>

        <!-- Botones de Acciones -->
        <div class="row p-4">
            <h3>Acciones</h3>
            <div class="col p-3 d-flex gap-2 mb-5 card p-2 shadow">
                <button type="button" class="btn">
                    <h6 class="text-warning-emphasis fw-bold"><i class="fa-solid fa-box"></i> Inventario</h6>
                </button>
            </div>
            <div class="col p-3 ms-2 d-flex gap-2 mb-5 card p-2 shadow">
                <button type="button" class="btn">
                    <h6 class="text-info fw-bold"><i class="fa-solid fa-users"></i> Usuarios</h6>
                </button>
            </div>
            <div class="col ms-2 d-flex gap-3 mb-5 card p-3 shadow">
                <button type="button" class="btn">
                    <h6 class="text-danger fw-bold"><i class="fa-solid fa-chart-line"></i> Ventas</h6>
                </button>
            </div>
            <div class="col ms-2 d-flex gap-3 mb-5 card p-3 shadow">
                <button type="button" class="btn">
                    <h6 class="text-custom-color fw-bold"><i class="fa-solid fa-clipboard-list"></i> Reportes</h6>
                </button>
            </div>
        </div>

        <!-- Tabla de Productos -->
        <div class="row p-auto">
            <h3>Proveedores</h3>
            <div class="col p-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fa-solid fa-cube text-warning-emphasis"></i> Producto</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Ventas</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><i class="fa-solid fa-car text-custom-color"></i> Carro de carreras</th>
                            <td>Vehículos</td>
                            <td>$250.00</td>
                            <td>20</td>
                            <td>15</td>
                            <td>
                                <button type="button" class="btn">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fa-solid fa-dog text-success"></i> Oso de peluche</th>
                            <td>Peluches</td>
                            <td>$180.00</td>
                            <td>15</td>
                            <td>25</td>
                            <td>
                                <button type="button" class="btn">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fa-solid fa-puzzle-piece text-danger"></i> Rompecabezas 3D</th>
                            <td>Juegos</td>
                            <td>$320.00</td>
                            <td>10</td>
                            <td>8</td>
                            <td>
                                <button type="button" class="btn">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Columnas para gráficas -->
    <div class="col-2 p-4">
        <h3>Ventas Recientes</h3>
        <canvas id="ventasChart" class="mx-auto d-block"></canvas>
        <h3>Resumen de Compras</h3>
        <canvas id="resumenVentasChart" class="mx-auto d-block"></canvas>
    </div>

    <!-- Gráficas -->
    <script>
    //Gráfica Circular de Ventas
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("ventasChart").getContext("2d");
        new Chart(ctx, {
            type: "doughnut", // Tipo de gráfico circular
            data: {
                labels: ["Vehiculos", "Peluches", "Juegos", "Electronicos"],
                datasets: [{
                    label: "Ventas por Producto",
                    data: [15, 25, 8, 7],
                    backgroundColor: ["#ffc107", "#198754", "#dc3545", "#007bff"],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' ventas';
                            }
                        }
                    }
                }
            }
        });

    
    // Gráfica de pastel para resumen de compras
     var resumenCtx = document.getElementById("resumenVentasChart").getContext("2d");
        new Chart(resumenCtx, {
            type: "pie", // Tipo de gráfico de pastel
            data: {
                labels: ["Clientes Nuevos", "Promociones", "Productos","Proveedores"],
                datasets: [{
                    label: "Ventas Resumidas",
                    data: [25, 5, 10, 15], // Ventas por producto
                    backgroundColor: ["#FF1493", "#800080", "#FFB6C1","#ff7f00"],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' ventas';
                            }
                        }
                    }
                }
            }
        });
    });
    </script>
</div>
@endsection