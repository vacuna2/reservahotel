<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
        </div>

        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Resumen de Reserva</h1>
        </div>
    </div>

    <div class="row mx-auto pt-lg-3">
        <div class="col-12 col-sm-2 text-success ">

        </div>
        <div class="col-12 col-sm-5 text-success ">
            <p class="hola">Nombre del reservante</p>
            <p class="holi"><?php echo $Nombre ?></p>
            <p class="hola">Apellidos</p>
            <p class="holi"><?php echo $Apellidos ?></p>
            <p class="hola">Fecha de reserva </p>
            <p class="holi"><?php echo $FechaRegistro ?></p>
        </div>
        <div class="col-12 col-sm-5 text-success ">
            <p class="hola">Tipo de habitacion </p>
            <p class="holi"><?php echo $HabitacionN ?></p>
            <p class="hola">Precio Total</p>
            <p class="holi"><?php echo $Precio ?></p>
        </div>
        <div class="col-12 col-sm-5 text-success ">
        <p class="hola"><h1>CODIGO: <?php echo $Codigo?></h1></p>
        </div>
        <div class="col-12 col-sm-5 text-success ">

        </div>
        <div class="col-12 col-sm-5 text-success ">

        </div>
        <div class="col-12 col-sm-5 text-success ">
            <p><h2 class="hola">Precio Total:</h2></p>
            <p><h2 class="holi"><b><?php echo $Precio ?></h2> </p>
        </div>
    </div>
    </div>
</section>