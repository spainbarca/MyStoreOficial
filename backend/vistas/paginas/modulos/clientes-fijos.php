<?php
    $item = null;
    $valor = null;
    $orden = "ventas";

    $colores = array("Fijos","Nuevos");

    $nuevos = ControladorClientes::ctrMostrarClientesNuevos($item,$valor);
    $totalnuevos = count($nuevos);

    $clientes = ControladorClientes::ctrMostrarClientes($item,$valor);
    $totalclientes = count($clientes);
?>


<!-- solid sales graph -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Clientes</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div id="chartContainerClientes" style="height: 370px; width: 100%;"></div>
  </div>
  <!-- /.card-body -->
  <!-- /.footer -->
</div>
<!-- /.card -->

<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> -->
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>

var options = {
	title: {
		text: "Gráfico de clientes fijos y nuevos"
	},
	subtitles: [{
		text: "Total clientes: "
	}],
	animationEnabled: true,
	data: [{
		type: "pie",
		startAngle: 40,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: <?php echo number_format(round(($totalnuevos)*100/$totalclientes),2); ?>, label: "Nuevos" },
			{ y: <?php echo number_format(round(($totalclientes-$totalnuevos)*100/$totalclientes),2); ?>, label: "Fijos" },
		]
	}]
};
$("#chartContainerClientes").CanvasJSChart(options);
</script>