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

          <h1>Reportes de clientes</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Reportes de clientes</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

        

        <div class="col-12">

          <!-- Default box -->
          <div class="card card-info card-outline">

            <div class="card-header">
                
                <button type="button" class="btn btn-default" id="daterange-btn2">
                    <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>


                <?php
                 if(isset($_GET["fechaInicial"])){

                    echo '<a href="vistas/paginas/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';
                }else{
                    echo '<a href="vistas/paginas/descargar-reporte.php?reporte=reporte">';
                }    
                ?>
                <button class="btn btn-success float-right" style="margin-top:5px">Descargar reporte en Excel</button>
                </a>

            </div>
            <!-- /.card-header -->

            <div class="card-body">
              
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                    <?php
                        include "modulos/ventas.php";
                    ?>
                    </div>
                    
                    <div class="col-md-6 col-xs-12">
                    <?php
                     include "modulos/vendedores.php"; 
                    ?>
                    </div>

                    <div class="col-md-6 col-xs-12">
                    <?php
                     include "modulos/compradores.php"; 
                    ?>
                    </div>

                    <div class="col-md-6 col-xs-12">
                    <?php
                     include "modulos/clientes-fijos.php"; 
                    ?>
                    </div>

                    <div class="col-md-6 col-xs-12">
                    <?php
                     include "modulos/regalos.php"; 
                    ?>
                    </div>
                    
                </div>

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

        </div>


    </div>
    

  </section>
  <!-- /.content -->

</div>

