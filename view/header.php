<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Amancocay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="row mx-auto pt-lg-3">
            <div class="col-12 col-md-2 ">
                <a href="?c=Principal&e=Index"><img src="assets/images/Logo.jpeg" alt="Wenas" class="img-fluid"></a>
            </div>
            <div class="col-12 col-md-2">
            </div>
            <div class="col-12 col-md-2 pt-lg-2">
                <input type="submit" name="btnHabitaciones" value="Habitaciones" class="btn btn-light w-100 p-3 ">
            </div>
            <div class="col-12 col-md-2 pt-lg-2">
                <input type="submit" name="btnEmpleados" value="Empleados" class="btn btn-light w-100 p-3">
            </div>
            <div class="col-12 col-md-2 pt-lg-2">
                <input type="submit" name="btnMisionVision" value="Mision y Vision" class="btn btn-light w-100 p-3">
            </div>
            <div class="col-12 col-md-2 pt-lg-2">
                <a class="btn btn-light p-3 w-100" href="?c=Login&e=Index">
                <?php 

                    if($_SESSION AND $_SESSION['ID'] != '')
                    {
                        $nombre = $_SESSION['NOMBRE'];
                        echo $nombre;
                    }   
                    else
                    {
                        echo "Iniciar Sesion";
                    }
                ?>
                </a>
            </div>
        </div>
    </header>