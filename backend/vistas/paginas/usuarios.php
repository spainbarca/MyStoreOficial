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

          <h1>Administrar clientes</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar clientes</li>

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

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            Agregar Cliente
              </button>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaClientes" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Fecha nacimiento</th>
                    <th>Total compras</th>
                    <th>Última compra</th>
                    <th>Ingreso al sistema</th>
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
 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Agregar Celular" data-inputmask="'mask':'(999) 999-999-999'" data-mask required>
 
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
 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Agregar Fecha Nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
 
            </div>


          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </form>     


    </div>
  </div>
</div>
