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

          <h1>Reportes de Empresa</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Reporte de empresa</li>

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
            

          </div>
          <!-- /.card-header -->
        </div>
        <!-- /.card -->
      </div>

    </div>

    <div class="container-fluid" style="min-height: 717px;">

      <div class="col-12">

        <!-- Default box -->
        <div class="card card-info card-outline">

          <div class="card-header">
            

          </div>
          <!-- /.card-header -->

          <div class="card-body">
              
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/2431_RC03/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem":[{"keyword":"/g/11vk8rz4c","geo":"PE","time":"today 3-m"}],"category":0,"property":""}, {"exploreQuery":"date=today%203-m&geo=PE&q=%2Fg%2F11vk8rz4c","guestPath":"https://trends.google.es:443/trends/embed/"}); </script> 
            </div>

            <div class="col-md-6 col-xs-12">
            <?php
                include "modulos/interes-subregion.php";
            ?>
            </div>

            <div class="col-md-6 col-xs-12">
            <?php
                include "modulos/interes-ciudad.php";
            ?>
            </div>

            <div class="col-md-6 col-xs-12">
            <?php
                include "modulos/temas-relacionados.php";
            ?>
            </div>

            <div class="col-md-6 col-xs-12">
            <?php
                include "modulos/consultas-relacionados.php";
            ?>
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



