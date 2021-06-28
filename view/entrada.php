<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="120" height="120"></p>
        </div>

        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Registro de entrada</h1>
            <h5 class="text-center wenassub">Complete los campos porfavor...</h5>
        </div>
    </div>
    <?php
    $date = date('Y-m-d H:i:s');
    $idhab = $reses->Habitacion;
    $subtotal = $habaux->Obtener($idhab);
    ?>
    <form id="frm-empleado" action="?c=Entrada&e=Guardar" method="post" enctype="multipart/form-data">
        <div class="row mx-auto pt-lg-3 justify-content-center align-items-center pt-lg-4">
            <div class="col-12 col-sm-6 text-success ">
                <p class="hola"><input type="text" name="txtId" class="form-control" placeholder="Ingrese su Id" value="<?php echo '0'; ?>" /></p>
            </div>
        </div>
        <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
            <div class="col-12 col-sm-6 text-success ">
                <p class="hola"><input type="datetime" name="dateREntrada" class="form-control" value="<?php echo $date; ?>" /></p>
            </div>
        </div>
        <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
            <div class="col-12 col-sm-6 text-success ">
                <p class="hola"><input type="text" name="txtSubTotal" class="form-control" placeholder="Ingrese sub total" value="<?php echo $subtotal->Precio ?>" /></p>
            </div>
        </div>
        <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
            <div class="col-12 col-sm-6 text-success ">
                <p class="hola"><input type="text" name="txtCliente" class="form-control" placeholder="Ingrese cliente" value="<?php echo $reses->Cliente ?>" /></p>
            </div>
        </div>
        <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
            <div class="col-12 col-sm-6 text-success ">
                <p class="hola"><input type="text" name="txtEmpleado" class="form-control" placeholder="Ingrese Empleado" value="<?php echo $_SESSION['ID'] ?>" /></p>
            </div>
        </div>
        <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
            <div class="col-12 col-sm-6 text-success ">
                <p class="hola"><input type="text" name="txtReserva" class="form-control" placeholder="Ingrese Reserva" value="<?php echo $reses->id ?>" /></p>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-success p-3" name="btnGuardar">Registrar Entrada</button>
            <a class="btn btn-danger p-3" href="?c=Reserva&e=Indexe">Cancelar</a></h6>
        </div>
    </form>