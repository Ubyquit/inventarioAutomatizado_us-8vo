<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/sidevar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #da8b24;
            color: #faf1f7;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>

    <title>Dashboard de Inventario</title>
</head>

<body>
    <?php include './partials/sidevar.html'; ?>
    <div id="main">
        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        </div>

        <div class="w3-container">
            <h1>Reportes</h1>
            <div class="container">
                <h1 class="my-4">Dashboard de Inventario</h1>

                <?php
                include './php/connection.php';

                // Obtener el total de productos
                $sql = "SELECT COUNT(*) as total FROM productos";
                $result = $conn->query($sql);
                $totalProductos = $result->fetch_assoc()['total'];

                // Obtener el total de categorías
                $sql = "SELECT COUNT(*) as total FROM categorias";
                $result = $conn->query($sql);
                $totalCategorias = $result->fetch_assoc()['total'];

                // Obtener el total de productos en inventario
                $sql = "SELECT SUM(cantidad) as total FROM productos";
                $result = $conn->query($sql);
                $totalEnInventario = $result->fetch_assoc()['total'];

                // Obtener productos por categoría
                $sql = "SELECT categorias.nombre as categoria, COUNT(productos.id_producto) as total FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria GROUP BY categorias.nombre";
                $result = $conn->query($sql);
                $productosPorCategoria = [];
                while ($row = $result->fetch_assoc()) {
                    $productosPorCategoria[] = $row;
                }

                // Obtener valor total por categoría
                $sql = "SELECT categorias.nombre as categoria, SUM(productos.precio * productos.cantidad) as total FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria GROUP BY categorias.nombre";
                $result = $conn->query($sql);
                $valorPorCategoria = [];
                while ($row = $result->fetch_assoc()) {
                    $valorPorCategoria[] = $row;
                }

                // Obtener los detalles del inventario
                $sql = "SELECT id_producto, productos.nombre as producto, codigo, precio, cantidad, categorias.nombre as categoria FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria";
                $result = $conn->query($sql);
                $inventario = $result->fetch_all(MYSQLI_ASSOC);

                $conn->close();
                ?>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total de Productos</h5>
                                <p class="card-text"><?php echo $totalProductos; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card text-white bg-secondary">
                            <div class="card-body">
                                <h5 class="card-title">Total de Categorías</h5>
                                <p class="card-text"><?php echo $totalCategorias; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Total de Productos en Inventario</h5>
                                <p class="card-text"><?php echo $totalEnInventario; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="card" style="width: 20rem;">
                        <div class="card-header">
                            <h5 class="card-title">Estadísticas del Inventario</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="productosPorCategoria"></canvas>
                        </div>
                    </div>

                    <div class="card mx-5" style="width: 20rem;">
                        <div class="card-header">
                            <h5 class="card-title">Estadísticas del Inventario</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="valorPorCategoria"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="my-4">Detalles del Inventario</h2>
        <div class="table-responsive">
            <table id="inventoryTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $numero = 1;
                    $valorTotal = 0;

                    if (!empty($inventario)) {
                        foreach ($inventario as $row) {
                            echo "<tr>";
                            echo "<td>$numero</td>";
                            echo "<td>{$row['producto']}</td>";
                            echo "<td>{$row['codigo']}</td>";
                            echo "<td>\${$row['precio']}</td>";
                            echo "<td>{$row['cantidad']}</td>";
                            echo "<td>{$row['categoria']}</td>";
                            echo "</tr>";
                            $numero++;
                            $valorTotal += $row['precio'] * $row['cantidad'];
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Sin Productos</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#inventoryTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Datos de PHP
            var productosPorCategoria = <?php echo json_encode($productosPorCategoria); ?>;
            var valorPorCategoria = <?php echo json_encode($valorPorCategoria); ?>;

            // Productos por Categoría
            var ctx1 = document.getElementById('productosPorCategoria').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: productosPorCategoria.map(item => item.categoria),
                    datasets: [{
                        label: 'Total de Productos',
                        data: productosPorCategoria.map(item => item.total),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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

            // Valor por Categoría
            var ctx2 = document.getElementById('valorPorCategoria').getContext('2d');
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: valorPorCategoria.map(item => item.categoria),
                    datasets: [{
                        label: 'Valor Total',
                        data: valorPorCategoria.map(item => item.total),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += new Intl.NumberFormat('en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }).format(context.parsed);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>