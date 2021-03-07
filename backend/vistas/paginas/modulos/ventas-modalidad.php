<?php

    error_reporting(0);

    $item = null;
    $valor = null;

    $grupo = ControladorVentas::ctrMostrarVentasGrupo($item,$valor);
    $totalgrupo = count($grupo);

    $modalidad = ControladorVentas::ctrMostrarModalidadGrupo($item,$valor);

    $ventas = ControladorVentas::ctrMostrarVentas($item,$valor);
    $totalventas = count($ventas);


    $arrayFechas = array();
    $arrayVentas = array();
    $sumaPagosMes = array();

   /*  $intmod = array(11,1);
    $totalfrecuencia = array_sum($intmod);

    $modalidad = array("Presencial","Delivery");
     */
    foreach ($respuesta as $key => $value) {

        #Capturamos sólo el año y el mes
        $fecha = substr($value["fecha"],0,7);
        //var_dump($fecha);

        #Introducir las fechas en arrayFechas
        array_push($arrayFechas, $fecha);

        #Capturamos las ventas
        $arrayVentas = array($fecha => $value["total"]);

        #Sumamos los pagos que ocurrieron el mismo mes
        foreach ($arrayVentas as $key => $value) {
            
            $sumaPagosMes[$key] += $value;
        } 
    }
    //var_dump($sumaPagosMes);
    $noRepetirFechas = array_unique($arrayFechas);
    //var_dump($noRepetirFechas);
?>


<!-- solid sales graph -->
<div class="card text-white bg-primary mb-3">
    <div class="card-header border-0">
    <h3 class="card-title">
        <i class="fas fa-th mr-1"></i>
        Modalidad de Ventas por Mes
    </h3>

    <div class="card-tools">
        <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn bg-primary btn-sm" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
    </div>
    </div>
    <div class="card-body">
    <canvas class="chart" id="line-chart-modalidad" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
    <!-- /.card-body -->
    <div class="card-footer bg-transparent">
    <div class="row">

        <?php
            for($i = 0; $i < 2; $i++){

            echo ' <div class="col-6 text-center">
            <input type="text" class="knob" data-readonly="true" value="'.round($modalidad[$i]["contamod"]*100/$totalventas,2).'" data-width="100" data-height="100"
                    data-fgColor="black">
    
            <div class="text-white">'.$modalidad[$i]["modalidad"].'</div>
            </div>';
            }
        ?>
        <!-- ./col -->

    </div>
    <!-- /.row -->
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->

<script>

// Sales graph chart
var salesGraphChartCanvas = $('#line-chart-modalidad').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels  : [
        <?php

          for($i = 0; $i < $totalgrupo; $i++){

          echo "'".$grupo[$i]["periodo"]."',";

          }
          ?>
    ],
    datasets: [
      {
        element             : 'line-chart-modalidad',
        label               : 'Ventas',
        fill                : false,
        borderWidth         : 5,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : [
            
            <?php

            for($i = 0; $i < $totalgrupo; $i++){

            echo "".$grupo[$i]["cant_ventas"].",";

            }
            ?>
        ]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 2500,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
      type: 'line', 
      data: salesGraphChartData, 
      options: salesGraphChartOptions
    }
  )

    /* jQueryKnob */
    $('.knob').knob()

</script>