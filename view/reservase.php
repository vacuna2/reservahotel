<section class="container">
    <div class="row mx-auto pt-lg-1">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
        </div>

        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Registro de Reservas</h1>
            <h5 class="text wenassub">Busque la Reserva que desee....</h5>
        </div>
    </div>
    <nav class="navbar navbar-light bg-light">
        <div class="container buscar">
            <h9><strong class="form-gruop text-center" style="color: #651a00">RESERVAS</strong></h9>
            <form class="d-flex">
                <input class="form-control mark" type="text" name="txtBuscar">
                <input class="btn btn-dark" type="submit" value="Buscar">
            </form>
    </nav>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Habilitada</th>
                <th>FechaRegistro</th>
                <th>FechaVencimiento</th>
                <th>Aprobada</th>
                <th>Codigo</th>
                <th>Habitacion</th>
                <th>Empleado</th>
                <th>Cliente</th>
                <th class="text-center">OPCIONES</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->ListarHabilitados() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php

                        if ($r->Habilitada == '1') {
                            echo 'SI';
                        } else {
                            echo 'NO';
                        }

                        ?></td>
                    <td><?php echo $r->FechaRegistro; ?></td>
                    <td><?php echo $r->FechaVencimiento; ?></td>
                    <td><?php
                        if ($r->Aprobada == '2') {
                            echo 'NO CONFIRMADA';
                        } else {
                            echo 'CONFIRMADA';
                        }
                        ?></td>
                    <td><?php echo $r->Codigo; ?></td>
                    <td><?php echo $r->Habitacion; ?></td>
                    <td><?php
                        if ($r->Empleado != null) {
                            echo $r->Empleado;
                        } else {
                            echo 'EN ESPERA';
                        }
                        ?></td>
                    <td><?php echo $r->Cliente; ?></td>
                    <td>
                        <a class="btn btn-danger p-1" onclick="javascript:return confirm('¿Relizar Entrada de esta Reserva?');" href="?c=Reserva&e=Crude&id=<?php echo $r->id; ?>">REGISTRAR ENTRADA</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<!--NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
    <nav class="navbar navbar-light bg-light">
        <div class="container buscar">
            <h9><strong class="form-gruop text-center" style="color: #651a00">RESUMEN DE LAS ENTRADAS REGISTRADAS</strong></h9>
    </nav>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>SubTotal</th>
                <th>ServicioExtra</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Reserva</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->modele->Listar() as $r1) : ?>
                <tr>
                    <td><?php echo $r1->id; ?></td>
                    <td><?php echo $r1->Fecha?></td>
                    <td><?php echo $r1->SubTotal; ?></td>
                    <td><?php echo $r1->Servicio; ?></td>
                    <td><?php echo $r1->Cliente; ?></td>
                    <td><?php echo $r1->Empleado; ?></td>
                    <td><?php echo $r1->Reserva; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<br>
<br>
<br>
<br>
<br>
</div>