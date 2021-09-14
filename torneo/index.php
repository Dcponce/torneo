<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrar Torneo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../assets/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Administrar <b>Torneo</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addArbitroModal">
                            <i class="material-icons">&#xE147;</i>
                            <span>Agregar nuevo arbitro</span></a>
                    </div>
                </div>
            </div>
            <div class='col-sm-4 float-end'>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control" placeholder="Buscar..." id="q" onkeyup="load(1);" />
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="load(1);">
                                <span class="bi bi-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class='clearfix'></div>
            <hr>
            <div id="loader"></div><!-- Carga de datos ajax aqui -->
            <div id="resultados"></div><!-- Carga de datos ajax aqui -->
            <div class='outer_div'></div><!-- Carga de datos ajax aqui -->


        </div>
    </div>
    <!-- Edit Modal HTML -->
    <?php include("html/modal_add.php"); ?>
    <!-- Edit Modal HTML -->
    <?php include("html/modal_edit.php"); ?>
    <!-- Delete Modal HTML -->
    <?php include("html/modal_delete.php"); ?>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>