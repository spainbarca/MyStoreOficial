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

          <h1>Productos</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>

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

              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarProducto">Agregar producto</button>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
                
                <thead>
                  
                  <tr>
                    
                    <th style="width:10px">#</th>
                    <th style="width:60px">Imagen</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Subcategoría</th>
                    <th>Etiquetas</th>
                    <th>Stock</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Agregado</th>
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


<!--=====================================
Modal Crear Producto
======================================-->

<div class="modal fade" id="modalAgregarProducto" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">
      
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Agregar producto</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">

           <!-- seleccionar la categoría -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fas fa-list-alt"></span>

            </div>

            <select class="form-control selectTipoProducto" name="nuevaCategoria" class="nuevaCategoria" required>

              <option value="">Seleccionar categoría</option>
              
              <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach($categorias as $key => $value){
                  echo '<option value="'.$value["id"].'">'.$value["tipo"].'</option>';
                }
              ?>

            </select>     

          </div>

         <!-- seleccionar la subcategoría -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fab fa-font-awesome-flag"></span>
            
            </div>

            <select class="form-control selectTemaProducto" name="nuevaSubcategoria" required>

              <option value="">Seleccionar subcategoría</option>

            </select>     

          </div>
          <input type="hidden" id="ruta" name="ruta">

          <!-- input código -->
          
          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-barcode"></span>

            </div>

            <input type="text" class="form-control" name="nuevoCodigo" class="nuevoCodigo" placeholder="Ingresar código" required>   

          </div>

          <!-- input descripción -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fab fa-product-hunt"></span>

            </div>

            <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar descripción" required>   

          </div>

          <!-- input stock -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-check-square"></span>

            </div>

            <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

          </div>


          
          <div class="form-group row">

            <!-- input preciocompra -->
            <div class="col-xs-12 col-sm-6">
              <div class="input-group mb-3">
                
                <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-angle-double-up"></span>

                </div>

                <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de compra" required>

              </div>
            </div>

            <!-- input precioventa -->
            <div class="col-xs-12 col-sm-6">
              <div class="input-group mb-3">
                
                <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-angle-double-down"></span>

                </div>

                <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>

              </div>

              <!-- Checkbox para porcentaje  -->
              <div class="col-xs-6">
                  <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal porcentaje" checked>
                      Utilizar porcentaje
                    </label>
                  </div>
                </div>

            <!-- Entrada para el porcentaje  -->
            <div class="col-xs-6" style="padding: 0">
              <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-percent"></span>

                </div>

                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="25" required>
              </div>
            </div>

            </div>

          </div>

          <hr class="pb-2">

          <p>Etiquetas del producto:</p>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Cama 2 x 2,fas fa-bed"> 
            <span class="badge badge-secondary"><i class="fas fa-bed"></i> Cama 2 x 2 </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="TV de 42 Pulg,fas fa-tv"> 
            <span class="badge badge-secondary"><i class="fas fa-tv"></i> TV de 42 Pulg </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Agua Caliente,fas fa-tint"> 
            <span class="badge badge-secondary"><i class="fas fa-tint"></i> Agua Caliente </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Jacuzzi,fas fa-water"> 
            <span class="badge badge-secondary"><i class="fas fa-water"></i> Jacuzzi </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Baño privado,fas fa-toilet">
            <span class="badge badge-secondary"><i class="fas fa-toilet"></i> Baño privado </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Sofá, fas fa-couch"> 
            <span class="badge badge-secondary"><i class="fas fa-couch"></i> Sofá </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Balcón,far fa-image"> 
            <span class="badge badge-secondary"><i class="far fa-image"></i> Balcón </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="checkbox" type="checkbox" class="ml-3" value="Servicio Wifi,fas fa-wifi"> 
            <span class="badge badge-secondary"><i class="fas fa-wifi"></i> Servicio Wifi </span>
            </label>
          </div>

          <input type="hidden" name="caracteristicasProducto">  

          <hr class="pb-2">

          Subir Foto

          <!-- Foto -->
          <div class="form-group">

            <div class="form-group my-2">

              <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip"></i> Adjuntar Imagen del Producto

                  <input type="file" name="nuevaImagen" id="nuevaImagen" class="nuevaImagen">
                 
              </div>

              <img class="previsualizarImagen img-fluid py-2" width="300px">

               <p class="help-block small">Dimensiones: 400px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>

            </div>

          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>


      </form>

      <?php
      
      $crearProducto = new ControladorProductos();
      $crearProducto -> ctrCrearProducto();
      ?>

    </div>

  </div>

</div>



<!--=====================================
Modal Editar Productos
======================================-->

<div class="modal fade" id="modalEditarProducto" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">
      
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar producto</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">

           <!-- seleccionar la categoría -->

           <input type="hidden" class="form-control" name="idProducto">

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fas fa-list-alt"></span>

            </div>

            <select class="form-control selectTipoProducto" name="editarCategoria" readonly required>

              <option id="editarCategoria"></option>

            </select>     

          </div>

         <!-- seleccionar la subcategoría -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              
              <span class="fab fa-font-awesome-flag"></span>
            
            </div>

            <select class="form-control selectTemaProducto" name="editarSubcategoria" readonly required>

              <option id="editarSubcategoria"></option>

            </select>     

          </div>
          <input type="hidden" id="ruta" name="ruta">

          <!-- input código -->
          
          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-barcode"></span>

            </div>

            <input type="text" class="form-control" name="editarCodigo" id="editarCodigo" readonly required>   

          </div>

          <!-- input descripción -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fab fa-product-hunt"></span>

            </div>

            <input type="text" class="form-control" name="editarDescripcion" id="editarDescripcion" required>   

          </div>

          <!-- input stock -->

          <div class="input-group mb-3">
             
            <div class="input-group-append input-group-text">
              
               <span class="fas fa-check-square"></span>

            </div>

            <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

          </div>


          
          <div class="form-group row">

            <!-- input preciocompra -->
            <div class="col-xs-12 col-sm-6">
              <div class="input-group mb-3">
                
                <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-angle-double-up"></span>

                </div>

                <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" step="any" required>

              </div>
            </div>

            <!-- input precioventa -->
            <div class="col-xs-12 col-sm-6">
              <div class="input-group mb-3">
                
                <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-angle-double-down"></span>

                </div>

                <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" step="any"  required>

              </div>

              <!-- Checkbox para porcentaje  -->
            <div class="col-xs-6">
              <div class="input-group mb-3">
                
                <label>
                  <input type="checkbox" class="minimal porcentaje" checked>
                  Utilizar porcentaje
                </label>

              </div>
            </div>

            <!-- Entrada para el porcentaje  -->
            <div class="col-xs-6" style="padding: 0">
              <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  
                  <span class="fas fa-percent"></span>

                </div>

                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="25" required name="editarPorcentaje" id="editarPorcentaje">
              </div>
            </div>

            </div>

          </div>

          <hr class="pb-2">

          <p>Etiquetas del producto:</p>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Cama 2 x 2,fas fa-bed"> 
            <span class="badge badge-secondary"><i class="fas fa-bed"></i> Cama 2 x 2 </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="TV de 42 Pulg,fas fa-tv"> 
            <span class="badge badge-secondary"><i class="fas fa-tv"></i> TV de 42 Pulg </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Agua Caliente,fas fa-tint"> 
            <span class="badge badge-secondary"><i class="fas fa-tint"></i> Agua Caliente </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Jacuzzi,fas fa-water"> 
            <span class="badge badge-secondary"><i class="fas fa-water"></i> Jacuzzi </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Baño privado,fas fa-toilet"> 
            <span class="badge badge-secondary"><i class="fas fa-toilet"></i> Baño privado </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Sofá,fas fa-couch"> 
            <span class="badge badge-secondary"><i class="fas fa-couch"></i> Sofá </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Balcón,far fa-image"> 
            <span class="badge badge-secondary"><i class="far fa-image"></i> Balcón </span>
            </label>
          </div>

          <div class="form-check">
            <label class="form-check-label">
            <input class="editarCheckbox" type="checkbox" class="ml-3" value="Servicio Wifi,fas fa-wifi"> 
            <span class="badge badge-secondary"><i class="fas fa-wifi"></i> Servicio Wifi </span>
            </label>
          </div>

          <input type="hidden" name="editarCaracteristicas">         

          <hr class="pb-2">

          Subir Foto

          <!-- Foto -->
          <div class="form-group">

            <div class="form-group my-2">

              <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip"></i> Adjuntar Imagen del Producto

                  <input type="file" name="editarImagen" id="#editarImagen" class="nuevaImagen">
                 
              </div>

              <img src="vistas/img/productos/default/product.jpg" class="previsualizarImagen img-fluid py-2" width="300px">

               <p class="help-block small">Dimensiones: 400px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>

               <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
             <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>

        </div>

      </form>

      <?php
        $editarProducto = new ControladorProductos();
        $editarProducto -> ctrEditarProducto();
      ?>

      <?php
        /* $editarProducto = new ControladorProductos();
        $editarProducto -> ctrEditarProducto(); */
      ?>          

    </div>

  </div>

</div>

