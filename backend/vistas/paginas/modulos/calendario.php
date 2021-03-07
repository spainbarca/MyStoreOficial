<!-- <?php 

$traerReservas = ControladorReservas::ctrMostrarReservas(null, null);

$descripcion = array();
$fechaIngreso = array();
$fechaSalida = array();

foreach ($traerReservas as $key => $value) {
	
	array_push($descripcion, $value["descripcion_reserva"]);	
	array_push($fechaIngreso, $value["fecha_ingreso"]);
	array_push($fechaSalida, $value["fecha_salida"]);
}

?>


<div class="card card-primary card-outline">

	<div class="card-header">

		<h5 class="m-0">Reservas del mes</h5>

	</div>

	<div class="card-body">

		<div id="calendarIndex"></div>

		<a href="reservas" class="btn btn-primary mt-3">Ver reservas</a>

	</div>

</div>

<script>

var fechaActual = new Date();
var mes = ("0"+Number(fechaActual.getMonth()+1)).slice(-2);
var dia = ("0"+fechaActual.getDate()).slice(-2);
	
	 $('#calendarIndex').fullCalendar({
	    defaultDate:fechaActual.getFullYear()+"-"+mes+"-"+dia,
        header: {
          left: 'prev',
          center: 'title',
          right: 'next'
        },
        events:[

		<?php

			for($i = 0; $i < count($descripcion); $i++){

				echo '{"title":"'.$descripcion[$i].'",
					   "start":"'.$fechaIngreso[$i].'",
					   "end":"'.$fechaSalida[$i].'",
					   "color": "#FFCC29"},';

			}

		?>

        ]


      });


</script>
 -->


<!-- Calendar -->
<div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

<script>
  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
</script>
