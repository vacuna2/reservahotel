<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="120" height="120"></p>
        </div>
        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Registro Empleados</h1>
            <h5 class="text-center wenassub">Complete los campos porfavor...</h5>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Nacimiento</th>
                <th>Usuario</th>
                <th>Password</th>
                <th>Tipo de Usuario</th>
                <th class="text-center">OPCIONES</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->Listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->Nombre; ?></td>
                    <td><?php echo $r->Apellido; ?></td>
                    <td><?php echo $r->Correo; ?></td>
                    <td><?php echo $r->Telefono; ?></td>
                    <td><?php echo $r->FechaNacimiento; ?></td>
                    <td><?php echo $r->Usuario; ?></td>
                    <td><?php echo $r->Passwor; ?></td>
                    <td><?php
                        if ($r->TipoUsuario == 1) {
                            echo 'ADMINISTRADOR';
                        } elseif ($r->TipoUsuario == 2) {
                            echo 'GESTOR';
                        } else {
                            echo 'RECEPCIONISTA';
                        }
                        ?></td>
                    <td>
                        <a class="btn btn-warning p-1" href="?c=Empleado&e=Crud&id=<?php echo $r->id; ?>">MODIFICAR</a>
                        <a class="btn btn-danger p-1" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Empleado&e=Eliminar&id=<?php echo $r->id; ?>">ELIMINAR</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
        <div class="text-center">
            <a class="btn btn-success p-3" name="btnRegistroEmpleado" href="?c=Empleado&e=Crud">Nuevo Empleado</a>
        </div>
    </div>
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