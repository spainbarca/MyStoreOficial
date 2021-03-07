<?php

error_reporting(0);
    if(isset($_GET["fechaInicial"])){

        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];

    }else{

    $fechaInicial = null;
    $fechaFinal = null;
    }

    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

    $arrayFechas = array();
    $arrayVentas = array();
    $sumaPagosMes = array();

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

<!-- Gráfico de ventas -->
<div class="box box-solid bg-teal-gradient">
	
	<div class="box-header">
 		<i class="fa fa-th"></i>

  		<h3 class="box-title">Gráfico de Ventas</h3>
	</div>

	<div class="box-body border-radius-none nuevoGraficoVentas">

		<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>
    </div>

</div>

<script>
	
    var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [

    <?php

        if($noRepetirFechas != null){

            foreach($noRepetirFechas as $key){

                echo "{ y: '".$key."', ventas: ".$sumaPagosMes[$key]." },";
            }

            echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]." }";

        }else{

            echo "{ y: '0', ventas: '0' }";
        }
    ?>
      
    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : 'S/.',
    gridTextSize     : 10
  });

</script>


<div class="card">
    <div class="card-header">
    <h3 class="card-title">Browser Usage</h3>

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
            <canvas id="pieChart" height="150"></canvas>
        </div>
        <!-- ./chart-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
        <ul class="chart-legend clearfix">
            <li><i class="far fa-circle text-danger"></i> Chrome</li>
            <li><i class="far fa-circle text-success"></i> IE</li>
            <li><i class="far fa-circle text-warning"></i> FireFox</li>
            <li><i class="far fa-circle text-info"></i> Safari</li>
            <li><i class="far fa-circle text-primary"></i> Opera</li>
            <li><i class="far fa-circle text-secondary"></i> Navigator</li>
        </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer bg-white p-0">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
        <a href="#" class="nav-link">
            United States of America
            <span class="float-right text-danger">
            <i class="fas fa-arrow-down text-sm"></i>
            12%</span>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            India
            <span class="float-right text-success">
            <i class="fas fa-arrow-up text-sm"></i> 4%
            </span>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            China
            <span class="float-right text-warning">
            <i class="fas fa-arrow-left text-sm"></i> 0%
            </span>
        </a>
        </li>
    </ul>
    </div>
    <!-- /.footer -->
</div>
<!-- /.card -->
