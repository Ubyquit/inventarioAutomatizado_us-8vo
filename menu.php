<!DOCTYPE html>
<html>

<head>
    <title>Menú</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/sidevar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php include './partials/sidevar.html'; ?>

    <div id="main">

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        </div>

        <div class="w3-container">
            <h1>Menú</h1>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card" style="height: 15rem; background-color:aqua">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 2.5rem">Administrador</h5>
                                <a href="./administradores.php" class="btn "><i class="bi bi-person-fill" style="font-size: 5rem; color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="height: 15rem; background-color:aqua">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 2.5rem">Clientes</h5>
                                <a href="#" class="btn "><i class="bi bi-people-fill" style="font-size: 5rem; color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="height: 15rem; background-color:aqua">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 2.5rem">Ventas</h5>
                                <a href="#" class="btn "><i class="bi bi-cart-fill" style="font-size: 5rem; color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <div class="card" style="height: 15rem; background-color:pink">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 2.5rem">Categorías</h5>
                                <a href="#" class="btn "><i class="bi bi-tag-fill" style="font-size: 5rem; color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="height: 15rem; background-color:pink">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 2.5rem">Productos</h5>
                                <a href="#" class="btn "><i class="bi bi-journal-album" style="font-size: 5rem; color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="height: 15rem; background-color:pink">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 2.5rem">Entregas</h5>
                                <a href="#" class="btn "><i class="bi bi-box-fill" style="font-size: 5rem; color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="./js/sidevar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>