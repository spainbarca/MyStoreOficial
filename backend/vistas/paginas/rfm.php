<?php 

  if($admin["perfil"] != "Administrador"){

    echo '<script>

      window.location = "banner";

    </script>';

    return;

  }

 ?>

<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Módulo RFM</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Módulo RFM</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <!-- Default box -->
          <div class="card card-info card-outline">

            <div class="card-header">
<!-- 
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            Agregar Cliente
              </button> -->

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaRfm" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Recencia</th>
                    <th>Frecuencia</th>
                    <th>Magnitud</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>

                </tbody>

              </table>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
       
            </div>
            <!-- /.card-footer-->

          </div>
          <!-- /.card -->

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>




<!-- MODAL AGREGAR CLIENTE -->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Agregar Cliente</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">

            <!-- input nombre -->
            <div class="input-group mb-3">
             
             <div class="input-group-append input-group-text">
               
                <span class="fas fa-user"></span>
 
             </div>
 
             <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Agregar nombre" required>  
 
            </div>

            <!-- input DNI -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-key"></span>
 
                </div>
 
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Agregar DNI" required> 
 
            </div>

            <!-- input Correo -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-envelope"></span>
 
                </div>
 
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Agregar E-mail" required>
 
            </div>

            <!-- input Telefono -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-phone"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Agregar Celular" data-inputmask="'mask':'(+51) 999-999-999'" data-mask im-insert="true" required>
 
            </div>

            <!-- input Dirección -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-map-marker-alt"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Agregar Dirección" required>
 
            </div>

             <!-- input Fecha nacimiento -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-calendar"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Agregar Fecha Nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"  data-mask im-insert="false" required>
 
            </div>


          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </form>   

      <?php
        //$crearCliente = new ControladorRfm();
        //$crearCliente -> ctrCrearCliente();
      ?>  
    </div>
  </div>
</div>



<!-- MODAL EDITAR CLIENTE -->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Cliente</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">

            <!-- input nombre -->
            <div class="input-group mb-3">
             
             <div class="input-group-append input-group-text">
               
                <span class="fas fa-user"></span>
 
             </div>
 
            <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
            <input type="hidden" id="idCliente" name="idCliente">
 
           </div>

            <!-- input DNI -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-key"></span>
 
                </div>
 
                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
 
            </div>

            <!-- input Correo -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-envelope"></span>
 
                </div>
 
                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
 
            </div>

            <!-- input Telefono -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-phone"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-999-999'" data-mask required>
 
            </div>

            <!-- input Dirección -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-map-marker-alt"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
 
            </div>

             <!-- input Fecha nacimiento -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-calendar"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"  data-mask im-insert="false" required>
 
            </div>


          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </form>     

      <?php 
        //$editarCliente = new ControladorClientes();
        //$editarCliente -> ctrEditarCliente();
      ?>

    </div>
  </div>
</div>

<?php 
  /* $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente(); */
?>