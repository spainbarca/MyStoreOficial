<?php
    $item = null;
    $valor = null;
    $orden = "ventas";

    $calificacion = ControladorVentas::ctrMostrarCalificacion($item,$valor);
    $totalCalificacion = count($calificacion);

    $ventas = ControladorVentas::ctrMostrarVentas($item,$valor);
    $totalventas = count($ventas);
?>


<!-- solid sales graph -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Calificación de las ventas</h3>

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
      <div class="col-md-12">
        <div class="chart-responsive">
            <div id="bar-rate"></div>
        </div>
        <!-- ./chart-responsive -->
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
Morris.Bar({
  element: 'bar-rate',
  gridTextColor:['black'],
  data: [
    /* { y: '2006', a: 100},
    { y: '2007', a: 75},
    { y: '2008', a: 50 },
    { y: '2009', a: 75 },
    { y: '2010', a: 100} */

    <?php

          for($i = 0; $i < 5; $i++){

            echo "{ y: '".$calificacion[$i]["calificacion"]."', a: ".number_format($calificacion[$i]["contador"])." },";

          }
    ?>
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Total']
});

</script>