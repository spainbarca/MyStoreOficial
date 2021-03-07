<?php
    $item = null;
    $valor = null;
    $orden = "id";

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
?>


<div class="card card-dark card-outline">

  <div class="card-header">

    <h3 class="card-title">Productos agregados recientemente</h3>

  </div>
  <!-- /.card-header -->

  <div class="card-body p-0">
    <ul class="products-list product-list-in-card pl-2 pr-2">

      <?php foreach (limit($productos, 3) as $key => $value): ?>

        <?php if ($value["imagen"] != ""){

          $foto = $value["imagen"];

        }else{

          $foto = "vistas/img/productos/default/product.jpg";

        }

        ?>

       <li class="item">
        <div class="product-img">
            <img src="<?php echo $foto?>" alt="Product Image" class="img-size-50 rounded-circle">
        </div>
        <div class="product-info">
          <h6 class="product-title"><?php echo $value["precio_venta"]." - ".$value["precio_venta"]; ?></h6>
            <span class="product-description">
              <?php echo $value["descripcion"]; ?>
            </span>
          </div>
        </li>

      <?php endforeach ?>

      </ul>
  </div>
      <!-- /.card-body -->
  <div class="card-footer text-right">
    <a href="productos" class="btn btn-dark mt-3">Ver todos los productos</a>
  </div>
      <!-- /.card-footer -->
</div>