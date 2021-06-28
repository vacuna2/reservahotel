  <section class="container">
      <div class="row mx-auto pt-lg-3">
          <div class="col-12 text-success">
              <p class="text-center"><img src="assets/images/pacaEm2.png" alt="Wenas" class="img-fluid" width="180" height="180"></p>
          </div>


          <form id="frm-empleado" action="?c=Principal&e=Reservas" method="POST" enctype="multipart/form-data">
              <p class="hola">Verificar Reserva<input type="text" name="txtCodigo" class="form-control" placeholder="CODIGO DE RESERVA" /></p>
              <P><button class="btn btn-success p-3" VALUE="VERIFICAR RESERVA">VERIFICAR RESERVA</button></P>
              <br>
          </form>

          <div class="col-12 text-success ">
              <h1 class="text-center wenas">Catalogo de Habitaciones Disponibles</h1>
          </div>


          <table class="table">
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Tipo</th>
                      <th>NroCamas</th>
                      <th>Precio</th>
                      <th>Imagen</th>
                      <th class="text-center">OPCIONES</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($this->modelH->ListarCatalogo() as $r) : ?>
                      <tr>
                          <td><?php echo $r->Nombre; ?></td>
                          <td><?php echo $r->Descripcion; ?></td>
                          <td><?php echo $r->Tipo; ?></td>
                          <td><?php echo $r->NroCamas; ?></td>
                          <td><?php echo $r->Precio; ?></td>
                          <td>
                            <img width="200" src="data:image/jpeg;base64,<?php echo base64_encode($r->Imagen); ?>">
                        </td>
                          <td>
                              <a class="btn btn-success p-3" href="?c=Principal&e=Reservar&id=<?php echo $r->id; ?>">RESERVAR</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
  </section>