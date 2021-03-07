<?php
    $item = null;
    $valor = null;
    $orden = "ventas";

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

    $colores = array("red","yellow","blue");

    $medios = array("Efectivo","Tarjeta de Crédito","Tarjeta de Débito");
    $imagenes = array("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScOj9KAluqNbwI-2pRrDk1fOU8nO4zqAvGaA&usqp=CAU","https://i0.wp.com/tienda.digital/wp-content/uploads/2019/10/Las-10-principales-estafas-de-tarjetas-de-cr%C3%A9dito-de-todos-los-tiempos.jpg?fit=986%2C554&ssl=1","https://s3-eu-west-1.amazonaws.com/rankia/images/valoraciones/0026/0589/tarjeta_d%C3%A9bito_BBVA.png?1485469920");

    $totalVentas = ControladorProductos::ctrMostrarSumaVentas();

    $frecuencia = array(100,80,50);
    $totalfrecuencia = array_sum($frecuencia);
?>

	<style>
		#canvas-holder {
			width: 100%;
			margin-top: 50px;
			text-align: center;
		}
		#chartjs-tooltip {
			opacity: 1;
			position: absolute;
			background: rgba(0, 0, 0, .7);
			color: white;
			border-radius: 3px;
			-webkit-transition: all .1s ease;
			transition: all .1s ease;
			pointer-events: none;
			-webkit-transform: translate(-50%, 0);
			transform: translate(-50%, 0);
		}

		.chartjs-tooltip-key {
			display: inline-block;
			width: 10px;
			height: 10px;
			margin-right: 10px;
		}
	</style>


<!-- Productos más vendidos -->
<div class="card bg-success">
    <div class="card-header">
        <h3 class="card-title">Frecuencia de los medios de pago</h3>

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
            <canvas id="chart-area" height="200"></canvas>

            <div id="chartjs-tooltip">
                <table></table>
            </div>

            </div>
            <!-- ./chart-responsive -->
        </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">

            <?php
              for($i = 0; $i < 3; $i++){

              echo ' <li><i class="far fa-circle text-'.$colores[$i].'"></i> '.$medios[$i].'</li>';
              }
          ?>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer bg-white p-0">
    <ul class="nav nav-pills flex-column">
    <?php

      for($i = 0; $i <3; $i++){

        echo '<li class="nav-item">
                <a class="nav-link">
                <img src="'.$imagenes[$i].'" class="img-thumbnail" width="60px" style="margin-right:10px"> 
                '.$medios[$i].'

                <span class="float-right text-'.$colores[$i].'">   
                '.ceil($frecuencia[$i]*100/$totalfrecuencia).'%
                </span>
                    
                </a>
            </li>';
      }
    ?>
    </ul>
  </div>
  <!-- /.footer -->
</div>
<!-- /.card -->


<script>
		Chart.defaults.global.tooltips.custom = function(tooltip) {
			// Tooltip Element
			var tooltipEl = document.getElementById('chartjs-tooltip');

			// Hide if no tooltip
			if (tooltip.opacity === 0) {
				tooltipEl.style.opacity = 0;
				return;
			}

			// Set caret Position
			tooltipEl.classList.remove('above', 'below', 'no-transform');
			if (tooltip.yAlign) {
				tooltipEl.classList.add(tooltip.yAlign);
			} else {
				tooltipEl.classList.add('no-transform');
			}

			function getBody(bodyItem) {
				return bodyItem.lines;
			}

			// Set Text
			if (tooltip.body) {
				var titleLines = tooltip.title || [];
				var bodyLines = tooltip.body.map(getBody);

				var innerHtml = '<thead>';

				titleLines.forEach(function(title) {
					innerHtml += '<tr><th>' + title + '</th></tr>';
				});
				innerHtml += '</thead><tbody>';

				bodyLines.forEach(function(body, i) {
					var colors = tooltip.labelColors[i];
					var style = 'background:' + colors.backgroundColor;
					style += '; border-color:' + colors.borderColor;
					style += '; border-width: 2px';
					var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
					innerHtml += '<tr><td>' + span + body + '</td></tr>';
				});
				innerHtml += '</tbody>';

				var tableRoot = tooltipEl.querySelector('table');
				tableRoot.innerHTML = innerHtml;
			}

			var positionY = this._chart.canvas.offsetTop;
			var positionX = this._chart.canvas.offsetLeft;

			// Display, position, and set styles for font
			tooltipEl.style.opacity = 1;
			tooltipEl.style.left = positionX + tooltip.caretX + 'px';
			tooltipEl.style.top = positionY + tooltip.caretY + 'px';
			tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
			tooltipEl.style.fontSize = tooltip.bodyFontSize;
			tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
			tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
                        <?php

                            for($i = 0; $i < 3; $i++){

                            echo "".$frecuencia[$i].",";

                            }
                        ?>
                        ],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.yellow,
						window.chartColors.blue,
					],
				}],
				labels: [
					<?php

                        for($i = 0; $i < 3; $i++){

                        echo "'".$medios[$i]."',";

                        }
                    ?>
				]
			},
			options: {
				responsive: true,
				legend: {
					display: false
				},
				tooltips: {
					enabled: false,
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};
	</script>