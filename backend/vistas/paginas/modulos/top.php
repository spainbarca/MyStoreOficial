<?php

    $item = null;
    $valor = null;
    $orden = "id";

    $ventas = ControladorVentas::ctrSumaTotalVentas();

    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
    $totalCategorias = count($categorias);

    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
    $totalClientes = count($clientes);

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
    $totalProductos = count($productos);

    $totalTestimonios = ControladorTestimonios::ctrMostrarTestimonios(null, null);

?>

<!--=====================================
Sumar ventas
======================================-->

<div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box bg-info">

    <div class="inner">

      <h3>$ <span><?php echo number_format($ventas["total"],2); ?></span></h3>

      <p class="text-uppercase">Ventas Totales</p>

    </div>

    <div class="icon">

      <i class="fas fa-dollar-sign"></i>

    </div>

    <a href="ventas" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<!--=====================================
Total Reservas
======================================-->

<div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box bg-primary">

    <div class="inner">

      <h3><?php echo number_format($totalCategorias); ?></h3>

      <p class="text-uppercase">Categorías</p>

    </div>

    <div class="icon">

      <i class="far fa-calendar-alt"></i>

    </div>

    <a href="categorias" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<!--=====================================
Total Usuarios
======================================-->

<div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box bg-green">

    <div class="inner">

      <h3><?php echo number_format($totalClientes); ?></h3>

      <p class="text-uppercase">Clientes</p>

    </div>

    <div class="icon">

      <i class="fas fa-users"></i>

    </div>

    <a href="clientes" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<!--=====================================
Total Testimonios
======================================-->

<div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box bg-red">

    <div class="inner">

      <h3><?php echo number_format($totalProductos); ?></h3>

      <p class="text-uppercase">Productos</p>

    </div>

    <div class="icon">

      <i class="fas fa-user-check"></i>

    </div>

    <a href="productos" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div> 

<!--=====================================
Total Testimonios
======================================-->

<!-- <div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box bg-secondary">

    <div class="inner">

      <h3><?php echo count($totalTestimonios); ?></h3>

      <p class="text-uppercase">Testimonios</p>

    </div>

    <div class="icon">

      <i class="fas fa-user-check"></i>

    </div>

    <a href="testimonios" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div> 
 -->
