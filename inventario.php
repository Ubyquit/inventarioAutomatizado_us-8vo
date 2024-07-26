<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./css/sidevar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <title>Inventario</title>
</head>

<body>
    <?php include './partials/sidevar.html'; ?>
    <div id="main">

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        </div>

        <div class="w3-container">
            <h1>Inventario</h1>
            <div class="container">
                <div class="row">
                    <table id="inventoryTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './php/connection.php';

                            $sql = "SELECT id_producto, productos.nombre as producto, codigo, precio, cantidad, categorias.nombre as categoria FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria";
                            $result = $conn->query($sql);
                            $numero = 1;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo  "<td>$numero</td>";
                                    echo "<td>$row[producto]</td>";
                                    echo "<td>$row[codigo]</td>";
                                    echo "<td>$$row[precio]</td>";
                                    echo "<td>$row[cantidad]</td>";
                                    echo "<td>$row[categoria]</td>";
                                    echo "<td>
                                        <a href='./php/productos/delete.php?id=$row[id_producto]'><i class='bi bi-trash3-fill' style='font-size: 1.2rem; color: red;'></i></a>
                                        <i class='bi bi-pencil-square'></i>
                                        </td>";
                                    echo "</tr>";
                                    $numero++;
                                }
                            } else {
                                echo "<div class='alert alert-info' role='alert'>Sin Productos</div>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.2/b-3.1.0/b-html5-3.1.0/b-print-3.1.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.2/b-3.1.0/b-html5-3.1.0/b-print-3.1.0/datatables.min.js"></script>
    <script src="./js/sidevar.js"></script>

    <script>
        $(document).ready(function() {
            $('#inventoryTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>

</html>