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

          <h1>Administrar etiquetas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar etiquetas</li>

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

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEtiqueta">
            Agregar Etiqueta
              </button>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaEtiquetas" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Valor</th>
                    <th>Destino</th>
                    <th>Representación</th>
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




<!-- MODAL AGREGAR ETIQUETA -->

<div id="modalAgregarEtiqueta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Agregar Etiqueta</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">

            <!-- input nombre -->
            <div class="input-group mb-3">
             
             <div class="input-group-append input-group-text">
               
                <span class="fas fa-file-archive"></span>
 
             </div>
 
             <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Agregar nombre" required>  
 
            </div>

            <!-- input codigo -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-code"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Agregar código" required> 
 
            </div>
            <div class="alert alert-warning" role="alert">
              <p>Recuerda quitar los caracteres de código</p>
              <p>Ejm: <strong>< i class="fas fa-sun">< /i></strong> a ---> <strong>fas fa-sun</strong> </p> <a href="https://mdbootstrap.com/docs/jquery/content/icons-list/" class="alert-link" target="_blank"><button type="button" class="btn btn-dark">Íconos</button></a>. Clic aquí para escoger tu ícono personalizado.
            </div>

            <!-- input Correo -->
            <div class="input-group mb-3" >
                
                <div class="input-group-append input-group-text">
                
                    <span class="fas fa-folder-open"></span>
    
                </div>
    
                <select class="form-control" id="seleccionarDestino" name="seleccionarDestino" required>
                    <option value="">Seleccionar destino</option>
                    <option value="Categorías">Categorías</option>
                    <option value="Productos">Productos</option>
                </select>
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
        $crearCliente = new ControladorEtiquetas();
        $crearCliente -> ctrCrearEtiqueta();
      ?>  


    </div>
  </div>
</div>



<!-- MODAL EDITAR ETIQUETA -->

<div id="modalEditarEtiqueta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar Etiqueta</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">

            <!-- input nombre -->
            <div class="input-group mb-3">
             
             <div class="input-group-append input-group-text">
               
              <span class="fas fa-file-archive"></span>
 
             </div>
 
            <input type="text" class="form-control input-lg" name="editarEtiqueta" id="editarEtiqueta" required>
            <input type="hidden" id="idEtiqueta" name="idEtiqueta">
 
           </div>

            <!-- input codigo -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-code"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required>
            </div>
            <div class="alert alert-warning" role="alert">
              <strong>Recuerda cambiar las comillas dobles a comillas simples</strong> <a href="https://mdbootstrap.com/docs/jquery/content/icons-list/" class="alert-link" target="_blank"><button type="button" class="btn btn-dark">Íconos</button></a>. Clic aquí para escoger tu ícono personalizado.
            </div>

            <!-- input destino -->
            <div class="input-group mb-3">
             
              <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-folder-open"></span>

              </div>

              <select class="form-control" id="editarDestino" name="editarDestino" required>
                  <option value="">Seleccionar destino</option>
                  <option value="Categorías">Categorías</option>
                  <option value="Productos">Productos</option>
              </select>
 
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar etiqueta</button>
        </div>
      </form>     

      <?php 
        $editarEtiqueta = new ControladorEtiquetas();
        $editarEtiqueta -> ctrEditarEtiqueta();
      ?>

    </div>
  </div>
</div>

<?php 
  /* $eliminarEtiqueta = new ControladorEtiquetas();
  $eliminarEtiqueta -> ctrEliminarEtiqueta(); */
?>