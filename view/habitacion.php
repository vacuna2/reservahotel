<section class="container">
    <div class="row mx-auto pt-lg-3">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
        </div>

        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Habitaciones</h1>
        </div>
    </div>

    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>NroCamas</th>
                <th>Precio</th>
                <th>Habilitada</th>
                <th>Imagen</th>
                <th class="text-center">OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->Listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->Nombre; ?></td>
                    <td><?php echo $r->Descripcion; ?></td>
                    <td><?php echo $r->Tipo; ?></td>
                    <td><?php echo $r->NroCamas; ?></td>
                    <td><?php echo $r->Precio; ?></td>
                    <td>
                        <?php 
                            if ($r->Habilitada == 1) {
                                echo 'DESOCUPADA';
                            } elseif ($r->Habilitada == 2) {
                                echo 'OCUPADA';
                            } else {
                                echo 'FALTA ORDENAR';
                            }
                        ?>
                    </td>
                    <td>
                            <img width="100" src="data:image/jpeg;base64,<?php echo base64_encode($r->Imagen); ?>">
                        </td>
                    <td>
                        <a class="btn btn-warning p-1" href="?c=Habitacion&e=Crud&id=<?php echo $r->id; ?>">MODIFICAR</a>
                        <a class="btn btn-danger p-1" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Habitacion&e=Eliminar&id=<?php echo $r->id; ?>">ELIMINAR</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="row mx-auto pt-lg-2 justify-content-center align-items-center pt-lg-4">
        <div class="text-center">
            <a class="btn btn-success p-3" name="btnRegistroEmpleado" href="?c=Habitacion&e=Crud">Nueva Habitacion</a>
        </div>
    </div>


</section>