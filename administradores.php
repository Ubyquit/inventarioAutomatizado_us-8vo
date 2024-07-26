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
    <title>Document</title>
</head>

<body>
    <?php include './partials/sidevar.html'; ?>
    <div id="main">

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        </div>

        <div class="w3-container">
            <h1>Administradores</h1>
            <div class="row">
                <div class="col-3">
                    <form action="./php/administradores/insert.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label" class="form-label" for="register-name">Nombre:</label>
                            <input class="form-control" class="form-control" type="text" id="register-name" name="nombre" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="register-gender">Sexo:</label>
                            <select class="form-control" id="register-gender" name="sexo" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="register-dob">Fecha de Nacimiento:</label>
                            <input class="form-control" type="date" id="register-dob" name="fecha_nacimiento" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="register-username">Nombre de Usuario:</label>
                            <input class="form-control" type="text" id="register-username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="register-password">Contraseña:</label>
                            <input class="form-control" type="password" id="register-password" name="password" minlength="8" required>
                        </div>
                        <button type="submit" class="btn">Crear Cuenta</button>
                    </form>
                </div>
                <div class="col-9">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Nombre de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './php/connection.php';

                            $sql = "SELECT * FROM usuarios";
                            $result = $conn->query($sql);
                            $numero = 1;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo  "<td>$numero</td>";
                                    echo "<td>$row[nombre]</td>";
                                    echo "<td>$row[sexo]</td>";
                                    echo "<td>$row[fecha_nacimiento]</td>";
                                    echo "<td>$row[username]</td>";
                                    echo "<td>
                                    <a href='./php/administradores/delete.php?id=$row[id]'><i class='bi bi-trash3-fill' style='font-size: 1.2rem; color: red;'></i></a>
                                    <i class='bi bi-pencil-square'></i>
                                    </td>";
                                    echo "</tr>";
                                    $numero++;
                                }
                            } else {
                                echo "Sin usuarios";
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