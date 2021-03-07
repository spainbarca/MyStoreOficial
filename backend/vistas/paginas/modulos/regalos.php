<?php
    $item = null;
    $valor = null;
    $orden = "ventas";

    $colores = array("Fijos","Nuevos");

    $regalos = ControladorVentas::ctrMostrarRegalos($item,$valor);
    $contaregalos = count($regalos);

    $ventas = ControladorVentas::ctrMostrarVentas($item,$valor);
    $totalventas = count($ventas);
?>


<!-- solid sales graph -->
<div class="card bg-dark mb-3">
  <div class="card-header">
    <h3 class="card-title">Regalos ofrecidos a clientes</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body bg-dark mb-3">
    <div id="chartContainerRegalos" style="height: 370px; width: 100%;">
  </div>
  <!-- /.card-body -->
  <!-- /.footer -->
</div>
<!-- /.card -->

<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> -->
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>

var options = {
	animationEnabled: true,
	theme: "light2", //"light1", "light2", "dark1", "dark2"
	title: {
		text: "Regalos ofrecidos a los clientes"
	},
	data: [{
		type: "funnel",
		toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
		indexLabel: "{label} ({percentage}%)",
		dataPoints: [
			/* { y: 1800, label: "Leads" },
			{ y: 1552, label: "Initial Communication" },
			{ y: 1320, label: "Customer Evaluation" },
			{ y: 885, label: "Negotiation" },
			{ y: 617, label: "Payment" } */

            <?php
                 foreach($regalos as $key){

                echo "{ y: ".number_format($key["cantidad"])." , label: '".$key["regalo"]."' },";

                }
            ?>
		]
	}]
};
calculatePercentage();
$("#chartContainerRegalos").CanvasJSChart(options);

function calculatePercentage() {
	var dataPoint = options.data[0].dataPoints;
	var total = <?php echo number_format($totalventas); ?>;
	for (var i = 0; i < <?php echo number_format($contaregalos); ?>; i++) {
		if (i == 0) {
			options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
		} else {
			options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
		}
	}
}
</script>