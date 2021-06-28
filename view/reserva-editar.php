<form id="frm-empleado" action="?c=Reserva&e=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $emp->id; ?>" />

    <div class="row mx-auto pt-lg-3 justify-content-center align-items-center pt-lg-4">
        <div class="col-12 col-sm-6 text-success ">
            <div class="form-group">
                <label>HABILITADA</label>
                <select name="txtHabilitada" class="form-control">
                    <option <?php echo $emp->Habilitada == 1 ? 'selected' : ''; ?> value="1">SI</option>
                    <option <?php echo $emp->Habilitada == 2 ? 'selected' : ''; ?> value="2">NO</option>
                </select>
            </div>
            <label>Fecha Registro</label>
            <p class="hola"><input type="date" name="txtFechaRegistro" value="<?php echo $emp->FechaRegistro; ?>" class="form-control" placeholder="Ingrese Fecha Registro" /></p>
            <label>Fecha Vencimiento</label>
            <p class="hola"><input type="date" name="txtFechaVencimiento" value="<?php echo $emp->FechaVencimiento; ?>" class="form-control" placeholder="Ingrese Fecha Vencimiento" /></p>
            
            <div class="form-group">
                <label>AROBADA</label>
                <select name="txtAprobada" class="form-control">
                    <option <?php echo $emp->Aprobada == 2 ? 'selected' : ''; ?> value="2">NO CONFIRMADA</option>
                    <option <?php echo $emp->Aprobada == 1 ? 'selected' : ''; ?> value="1">CONFIRMADA</option>
                </select>
            </div>
            <label>Codigo</label>
            <p class="hola"><input type="text" name="txtCodigo" value="<?php echo $emp->Codigo; ?>" class="form-control" placeholder="Ingrese Codigo" /></p>
            <label>Habitacion</label>
            <p class="hola"><input type="text" name="txtHabitacion" value="<?php echo $emp->Habitacion; ?>" class="form-control" placeholder="Ingrese Habitacion" /></p>
            <label>Empleado</label>
            <p class="hola"><input type="text" name="txtEmpleado" value="<?php echo $_SESSION['ID']; ?>" class="form-control" placeholder="Ingrese Empleado" /></p>
            <label>Cliente</label>
            <p class="hola"><input type="text" name="txtNombre" value="<?php echo $emp->Cliente; ?>" class="form-control" placeholder="Ingrese sus nombres" /></p>
        </div>
        <div class="text-center">
            <button class="btn btn-success p-3" name="btnGuardar">Guardar</button>
            <a class="btn btn-danger p-3" href="?c=Reserva">Cancelar</a></h6>
        </div>
</form>

<script>
    $(document).ready(function() {
        $("#frm-empleado").submit(function() {
            return $(this).validate();
        });
    })
</script>