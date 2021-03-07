<?php
    $item = null;
    $valor = null;
    $orden = "ventas";

    $colores = array("Fijos","Nuevos");

    $jaladores = ControladorRestaurante::ctrVentasJaladores($item,$valor);

    $ventas = ControladorRestaurante::ctrTotalVentasJaladores($item,$valor);
    $totalventas = count($ventas);
?>


<!-- solid sales graph -->
<div class="card bg-warning mb-3">
  <div class="card-header">
    <h3 class="card-title">Ventas de jaladores</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body bg-warning mb-3">
  <div id="chartContainerJaladores" style="height: 370px; width: 100%;" class="bg-warning"></div>
  </div>
  <!-- /.card-body -->
  <!-- /.footer -->
</div>
<!-- /.card -->

<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> -->
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>

//Better to construct options first and then pass it as a parameter
var options = {
	animationEnabled: true,
	title: {
		text: "Ventas influenciadas por los jaladores",                
		fontColor: "Peru"
	},	
	axisY: {
		tickThickness: 0,
		lineThickness: 0,
		valueFormatString: " ",
		includeZero: true,
		gridThickness: 0                    
	},
	axisX: {
		tickThickness: 0,
		lineThickness: 0,
		labelFontSize: 18,
		labelFontColor: "Peru"				
	},
	data: [{
		indexLabelFontSize: 26,
		toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		indexLabelFontWeight: 600,
		indexLabelFontFamily: "Verdana",
		color: "#62C9C3",
		type: "bar",
		dataPoints: [
/* 
			{ y: 21, label: '21%', indexLabel: 'Video' },
			{ y: 25, label: '25%', indexLabel: 'Dining' }, */


            <?php
                 foreach($jaladores as $key){

                echo "{ y: ".number_format($key["cant_ventas"])." , label: '".round(($key["cant_ventas"]*100/$totalventas),2)." %' , indexLabel: '".$key["responsable"]."' },";

                }
            ?>
		]
	}]
};

$("#chartContainerJaladores").CanvasJSChart(options);
</script>