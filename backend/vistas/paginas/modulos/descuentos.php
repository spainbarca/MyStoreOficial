<?php
    $item = null;
    $valor = null;
    $orden = "ventas";

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

    $colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");
    $informe = array("Si hay descuento","No hay descuento");

    $tipo = array("Si","No");

    $descuento = ControladorVentas::ctrMostrarDescuento($item,$valor);
    $totalDescuento = count($descuento);
    

    $ventas = ControladorVentas::ctrMostrarVentas($item,$valor);
    $totalventas = count($ventas);

    $contadesc = array($descuento["descuento"], ($totalventas-$descuento["descuento"]))
?>


<!-- solid sales graph -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Porcentaje de ventas con descuento</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
            <div id="donut-desc"></div>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">

            <?php
              for($i = 0; $i < 2; $i++){

              echo ' <li><i class="far fa-square text-'.$colores[$i].'"></i> '.$informe[$i].'</li>';
              }
          ?>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
  <!-- /.footer -->
</div>
<!-- /.card -->

<script>
/*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Donut({
  element: 'donut-desc',
  colors:['red','green'],
  data: [ 
    {label: 'Si', value: <?php echo number_format(round(($totalventas-$totalDescuento)*100/$totalventas),2); ?>},
    {label: 'No', value: <?php echo number_format(round($totalDescuento*100/$totalventas),2); ?>},  
  ]
  
});

</script>