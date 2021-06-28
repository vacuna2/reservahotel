<section class="container">
       <div class="row mx-auto pt-lg-1">
           <div class="col-12 text-success">
               <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
           </div>

           <div class="col-12 text-success ">
               <h1 class="text-center wenas">Registro de Reservas</h1>
           </div>
       </div>
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
            <?php foreach ($this->modelR->ListarCli($_REQUEST['txtCodigo']) as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php 
                        
                        if($r->Habilitada == '1')
                        {
                            echo 'SI';
                        }
                        else
                        {
                            echo 'NO';
                        }
                         
                    ?></td>
                    <td><?php echo $r->FechaRegistro; ?></td>
                    <td><?php echo $r->FechaVencimiento; ?></td>
                    <td><?php                     
                        if($r->Aprobada == '2')
                        {
                            echo 'NO CONFIRMADA';
                        }
                        else
                        {
                            echo 'CONFIRMADA';
                        }
                    ?></td>
                    <td><?php echo $r->Codigo; ?></td>
                    <td><?php echo $r->Habitacion; ?></td>
                    <td><?php 
                        if($r->Empleado != null)
                        {
                            echo $r->Empleado;
                        }
                        else
                        {
                            echo 'EN ESPERA';
                        }
                    ?></td>
                    <td><?php echo $r->Cliente; ?></td>
                    <td>
                        <a class="btn btn-warning p-1" href="?c=Reserva&e=Crud&id=<?php echo $r->id; ?>">MODIFICAR</a>
                        <a class="btn btn-danger p-1" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Reserva&e=Eliminar&id=<?php echo $r->id; ?>">ELIMINAR</a>
                    </td>
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