<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <title>Clientes</title>
</head>

<body>
    <?php include './partials/sidevar.html'; ?>
    <div id="main">

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        </div>

        <div class="w3-container">
            <h1>Clientes</h1>
            <div class="row">
                <div class="col-3">
                    <form action="./php/clientes/insert.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label" class="form-label" for="register-name">Nombre:</label>
                            <input class="form-control" class="form-control" type="text" id="register-name" name="nombre" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" class="form-label" for="register-name">Correo electrónico:</label>
                            <input class="form-control" class="form-control" type="email" id="register-name" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="register-dob">teléfono:</label>
                            <input class="form-control" type="tel" minlength="10" maxlength="10" id="register-dob" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="register-username">Ubicación</label>
                            <textarea class="form-control" type="text" id="register-username" name="ubicacion" required></textarea>
                        </div>
                        <button type="submit" class="btn">Crear Cliente</button>
                    </form>
                </div>
                <div class="col-9">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './php/connection.php';

                            $sql = "SELECT * FROM clientes";
                            $result = $conn->query($sql);

                            $numero = 1;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo  "<td>$numero</td>";
                                    echo "<td>$row[nombre]</td>";
                                    echo "<td>$row[correo]</td>";
                                    echo "<td>$row[telefono]</td>";
                                    echo "<td>$row[ubicacion]</td>";
                                    echo "<td>
                                    <a href='./php/clientes/delete.php?id=$row[id_cliente]'><i class='bi bi-trash3-fill' style='font-size: 1.2rem; color: red;'></i></a>
                                    <i class='bi bi-pencil-square'></i>
                                    </td>";
                                    echo "</tr>";
                                    $numero++;
                                }
                            } else {
                                echo "<div class='alert alert-info' role='alert'>Sin clientes</div>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/sidevar.js"></script>
</body>

</html>