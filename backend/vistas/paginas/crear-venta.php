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

          <h1>Crear Venta</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Venta</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-5 col-xs-12">

          <!-- Default box -->
          <div class="card card-success card-outline">

            <div class="card-header">

            </div>
            <!-- /.card-header -->

            <form role="form" method="post" class="formularioVenta">

            <div class="card-body">
              
                <!-- input nombre -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-user"></span>
        
                    </div>
        
                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $admin["nombre"]; ?>" readonly> 

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["idBackend"]; ?>"> 
    
                </div>

                <!-- input codigo de venta -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-key"></span>
        
                    </div>
        
                    <?php
                        $item = null;
                        $valor = null;
    
                        $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                        if(!$ventas){

                          echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                      
                        }else{
    
                          foreach ($ventas as $key => $value) {
                            
                          }
    
                          $codigo = $value["codigo"] + 1;

                          echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                        }  
                    ?>
    
                </div>

                <!-- input jalador -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-users"></span>
        
                    </div>
        
                    <select class="form-control" id="seleccionarJalador" name="seleccionarJalador" required>
                        <option value="0">Seleccionar jalador</option>

                        <?php
                          $item = "descripcion";
                          $valor = "Jalador";

                          $jalador = ControladorRestaurante::ctrMostrarJaladores($item, $valor);

                          foreach ($jalador as $key => $value) {

                            echo '<option value="'.$value["id"].'">'.$value["responsable"].'</option>';
                          }
                        ?>
                    </select>
                </div>

                <!-- input cliente -->
                <div class="input-group mb-3" >
                    
                    <div class="input-group-append input-group-text">
                    
                        <span class="fas fa-users"></span>
        
                    </div>
        
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                        <option value="">Seleccionar cliente</option>

                        <?php
                          $item = null;
                          $valor = null;

                          $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                          foreach ($categorias as $key => $value) {

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          }
                        ?>
                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>
                </div>

                <!-- input agregar producto -->
                <div class="input-group row nuevoProducto mb-3" >
                    
                </div>

                  <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- botón para agregar producto -->
                  <!-- <button type="button" class="btn btn-default hidden btnAgregarProducto">Agregar producto</button> -->

                <hr class="pb-2">

                <div class="row">

                    <!-- Entrada impuestos y total -->
                    <div class="col-xs-8 pull-right">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Descuento</th>
                            <th>Total</th>
                          </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td style="width:50%">
                              <!-- <div class="input-group">
                                <input type="number" class="form-control input-lg" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" min="0" placeholder="0" required>

                                <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>
                                <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                              </div> -->

                              <div class="input-group mb-3">
                                <input type="number" class="form-control input-lg" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" min="0" placeholder="0" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">%</span>
                                </div>

                                <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>
                                <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>
                              </div>
                            </td>

                            <td style="width:50%">
                              <!-- <div class="input-group mb-3">
                                
                                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              
                                <input type="number" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0000" readonly required>

                                <input type="hidden" name="totalVenta" id="totalVenta">

                              </div> -->

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">S/.</span>
                                </div>
                                <input type="number" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0000" readonly required>

                                <input type="hidden" name="totalVenta" id="totalVenta">
                              </div>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>

                <hr class="pb-2">

                <!-- seleccionar la subcategoría -->
                <div class="form-group row">
                    <div class="col-xs-6" style="padding-right:0px">
                      <div class="input-group mb-3">

                      <div class="input-group-append input-group-text">
                                        
                       <span class="fas fa-money-bill-wave"></span>

                        </div>
                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                          <option value="">Seleccione método de pago</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="TC">Tarjeta Crédito</option>
                          <option value="TD">Tarjeta Débito</option>
                        </select>
                      </div>
                    </div>

                    <div class="cajasMetodoPago"></div>
                    <input type="hidden" name="listaMetodoPago" id="listaMetodoPago" required>
                </div>

                <div class="col-xs-8 pull-right">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Modalidad de Venta</th>
                            <th>Regalo</th>
                          </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td style="width:50%">

                              <div class="input-group mb-3">
                                <select class="form-control" id="seleccionarModalidad" name="seleccionarModalidad" required>
                                  <option value="">Elige opción</option>
                                  <option value="Presencial">Presencial</option>
                                  <option value="Delivery">Delivery</option>
                                </select>
                                <div class="input-group-append">
                                  <label class="input-group-text" for="seleccionarModalidad">Atención</label>
                                </div>
                              </div>
                            </td>

                            <td style="width:50%">

                              <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                  <div class="form-check mr-sm-2">
                                    <input type="checkbox" class="checkbox" class="ml-3">
                                    <label class="form-check-label" for="customControlAutosizing">Ofrecer yapa</label>
                                  </div>
                                </div>
                                
                                <div class="col-auto my-1">
                                  
                                  <select class="custom-select mr-sm-2" id="seleccionarRegalo" name="seleccionarRegalo">
                                    <option value="No">Seleccione regalo</option>
                                    <option value="Tela">Muestra de tela</option>
                                    <option value="Prenda">Prenda</option>
                                    <option value="Accesorio">Accesorio</option>
                                    <option value="Otro">Otro</option>
                                  </select>
                                </div>
                              </div>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>

                <div class="card-footer">

                <span class="my-rating-9"></span>
                <span class="live-rating"></span>

                <input type="hidden" name="rate" id="rate">


                <button type="submit" class="btn btn-primary float-right">Guardar venta</button>
       
              </div>


            </div>
            <!-- /.card-body -->
            </form>

            <?php

              $guardarVenta = new ControladorVentas();
              $guardarVenta -> ctrCrearVenta();
            ?>


          </div>
          <!-- /.card -->

        </div>

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

          <!-- Default box -->
            <div class="card card-warning card-outline">
            
                <div class="card-header">

                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    
                    <table class="table table-bordered table-striped dt-responsive tablaVentas">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Imagen</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
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
 
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Agregar DNI"> 
 
            </div>

            <!-- input Correo -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-envelope"></span>
 
                </div>
 
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Agregar E-mail">
 
            </div>

            <!-- input Telefono -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-phone"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Agregar Celular" data-inputmask="'mask':'(999) 999-999-999'" data-mask >
 
            </div>

            <!-- input Dirección -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-map-marker-alt"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Agregar Dirección" >
 
            </div>

             <!-- input Fecha nacimiento -->
            <div class="input-group mb-3">
             
                <div class="input-group-append input-group-text">
               
                <span class="fas fa-calendar"></span>
 
                </div>
 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Agregar Fecha Nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask >
 
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
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();
      ?>

    </div>
  </div>
</div>
