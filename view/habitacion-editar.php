<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="120" height="120"></p>
        </div>

        <div class="col-12 text-success ">

            <h1 class="text-center wenas">
                <?php echo $emp->id != null ? "Habitacion: " . $emp->Nombre : 'Ingrese un Nuevo Registro'; ?>
            </h1>
            <h6 class="text-center wenassub">Complete los campos porfavor...</h6>

            <form id="frm-habitacion" action="?c=Habitacion&e=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $emp->id; ?>" />

                <div class="row mx-auto pt-lg-3 justify-content-center align-items-center pt-lg-4">
                    <div class="col-12 col-sm-6 text-success ">
                        <p class="hola"><input type="text" name="txtNombre" value="<?php echo $emp->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre" /></p>
                        <p class="hola"><input type="text" name="txtDescripcion" value="<?php echo $emp->Descripcion; ?>" class="form-control" placeholder="Ingrese Descripcion" /></p>
                        <p class="hola"><input type="text" name="txtTipo" value="<?php echo $emp->Tipo; ?>" class="form-control" placeholder="Tipo" /></p>
                        <p class="hola"><input type="text" name="txtNroCamas" value="<?php echo $emp->NroCamas; ?>" class="form-control" placeholder="Nro de Camas" /></p>
                        <p class="hola"><input type="text" name="txtPrecio" value="<?php echo $emp->Precio; ?>" class="form-control" placeholder="Ingrese el precio" /></p>
                        <div class="form-group">
                            <label>Tipo de Usuario</label>
                            <select name="txtHabilitada" class="form-control">
                                <option <?php echo $emp->Habilitada == 1 ? 'selected' : ''; ?> value="1">DESOCUPADO</option>
                                <option <?php echo $emp->Habilitada == 2 ? 'selected' : ''; ?> value="2">OCUPADO</option>
                                <option <?php echo $emp->Habilitada == 3 ? 'selected' : ''; ?> value="3">FALTA ORDENAR</option>
                            </select>
                        </div>
                        <label>Imagen</label>
                        <div class="col-12 col-sm-6 text-success ">
                            <input type="file" class="form-control-file" name="foto">
                        </div>

                    </div>
                    <div class="text-center">
                        <button class="btn btn-success p-3" name="btnGuardar">Guardar</button>
                        <a class="btn btn-danger p-3" href="?c=Habitacion">Cancelar</a></h6>
                    </div>
            </form>

            <script>
                $(document).ready(function() {
                    $("#frm-habitacion").submit(function() {
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