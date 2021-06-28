<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
        </div>

        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Reserva de Habitaciones</h1>
            <h5 class="text-center wenassub">Bienvenido Para realizar su reserva Complete los campos porfavor.</h5>
        </div>
    </div>
    </div>
    <form id="frm-principal" action="?c=Principal&e=ConfirmarReserva&idh=<?php echo $habt->id; ?> " method="post" enctype="multipart/form-data">
        <div class="row mx-auto pt-lg-3">
            <p>
            <div class="col-12  text-success ">
                <p class="hola">Tipo de Documento<input type="text" name="txtTipoDcoumento" class="form-control" placeholder="Tipo de Documento" /></p>
                <p class="hola">Documento<input type="text" name="txtDocumento" class="form-control" placeholder="Documento" /></p>
                <p class="hola">DATOS PERSONALES:</p>
                <p class="hola"><input type="text" name="txtNombre" class="form-control" placeholder="Nombre" /></p>
                <p class="hola"><input type="text" name="txtApellidos" class="form-control" placeholder="Apellidos" /></p>
                <p class="hola"><input type="text" name="txtCorreo" class="form-control" placeholder="Correo" /></p>
                <p class="hola"><input type="text" name="txtTelefono" class="form-control" placeholder="Telefono" /></p>
                <p class="hola"><input type="text" name="txtFechaNacimiento" class="form-control" placeholder="Fecha de Nacimiento" /></p>
            </div>
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NombreHabitacion</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th>NroCamas</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="success"><?php echo $habt->id; ?></td>
                        <td><?php echo $habt->Nombre; ?></td>
                        <td><?php echo $habt->Descripcion; ?></td>
                        <td><?php echo $habt->Tipo; ?></td>
                        <td><?php echo $habt->NroCamas; ?></td>
                        <td> S/. <?php echo $habt->Precio; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        <h1>SubtTotal S/. <?php echo $habt->Precio; ?></h1>
        <br>
        <div class="col-12">
            <p class="text-center">
                <button class="btn btn-success p-3" name="btnGuardar" >Confirmar Reserva</button>
                <a class="btn btn-danger p-3" href="?c=Principal">Cancelar</a>
            </p>
        </div>
    </form>

    <br>
    <br>
</section>