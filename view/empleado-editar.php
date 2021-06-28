<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="120" height="120"></p>
        </div>

        <div class="col-12 text-success ">

            <h1 class="text-center wenas">
                <?php echo $emp->id != null ? $emp->Nombre : 'Ingrese un Nuevo Registro'; ?>
            </h1>
            <h6 class="text-center wenassub">Complete los campos porfavor...</h6>

            <form id="frm-empleado" action="?c=Empleado&e=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $emp->id; ?>" />

                <div class="row mx-auto pt-lg-3 justify-content-center align-items-center pt-lg-4">
                    <div class="col-12 col-sm-6 text-success ">
                        <p class="hola"><input type="text" name="txtNombre" value="<?php echo $emp->Nombre; ?>" class="form-control" placeholder="Ingrese sus nombres" /></p>
                        <p class="hola"><input type="text" name="txtApellido" value="<?php echo $emp->Apellido; ?>" class="form-control" placeholder="Ingrese sus apellidos" /></p>
                        <p class="hola"><input type="text" name="txtCorreo" value="<?php echo $emp->Correo; ?>" class="form-control" placeholder="Ingrese su correo electronico" /></p>
                        <p class="hola"><input type="text" name="txtTelefono" value="<?php echo $emp->Telefono; ?>" class="form-control" placeholder="Ingrese su numero telefonico" /></p>
                        <p class="hola"><input type="date" name="txtFechaNacimiento" value="<?php echo $emp->FechaNacimiento; ?>" class="form-control" placeholder="Ingrese su Fecha de N" /></p>
                        <p class="hola"><input type="text" name="txtUsuario" value="<?php echo $emp->Usuario; ?>" class="form-control" placeholder="Ingrese su usuario" /></p>
                        <p class="hola"><input type="password" name="txtPasswor" value="<?php echo $emp->Passwor; ?>" class="form-control" placeholder="Ingrese su contraseña" /></p>
                        <div class="form-group">
                            <label>Tipo de Usuario</label>
                            <select name="txtTipoUsuario" class="form-control">
                                <option <?php echo $emp->TipoUsuario == 1 ? 'selected' : ''; ?> value="1">ADMINISTRADOR</option>
                                <option <?php echo $emp->TipoUsuario == 2 ? 'selected' : ''; ?> value="2">GESTOR</option>
                                <option <?php echo $emp->TipoUsuario == 3 ? 'selected' : ''; ?> value="3">RECEPCIONSITA</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success p-3" name="btnGuardar">Guardar</button>
                        <a class="btn btn-danger p-3" href="?c=Empleado">Cancelar</a></h6>
                    </div>
            </form>

            <script>
                $(document).ready(function() {
                    $("#frm-empleado").submit(function() {
                        return $(this).validate();
                    });
                })
            </script>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
</section>