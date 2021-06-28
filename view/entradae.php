<section class="container">
    <div class="row mx-auto pt-lg-1">
        <div class="col-12 text-success">
            <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
        </div>

        <div class="col-12 text-success ">
            <h1 class="text-center wenas">Registro de Entradas</h1>
        </div>
    </div>
    <br>

    <nav class="navbar navbar-light bg-light">
        <div class="container buscar">
            <h9><strong class="form-gruop text-center" style="color: #651a00">ENTRADAS REGISTRADAS</strong></h9>
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
            <?php foreach ($this->modele->ListarE() as $r1) : ?>
                <tr>
                    <td><?php echo $r1->id; ?></td>
                    <td><?php echo $r1->Fecha?></td>
                    <td><?php echo $r1->SubTotal; ?></td>
                    <td><?php echo $r1->Servicio; ?></td>
                    <td><?php echo $r1->Cliente; ?></td>
                    <td><?php echo $r1->Empleado; ?></td>
                    <td><?php echo $r1->Reserva; ?></td>
                    <td>
                        <a class="btn btn-danger p-1" onclick="javascript:return confirm('¿Relizar La salida de esta Entrada?');" href="?c=Salida&e=Crud&id=<?php echo $r1->id; ?>">REGISTRAR ENTRADA</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<!--NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
<nav class="navbar navbar-light bg-light">
        <div class="container buscar">
            <h9><strong class="form-gruop text-center" style="color: #651a00">SALIDAS REGISTRADAS</strong></h9>
    </nav>

<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Precio Total</th>
                <th>Entrada</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->model->Listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->PrecioTotal; ?></td>
                    <td><?php echo $r->Entrada; ?></td>
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