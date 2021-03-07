<?php 

$mejorHabitacion = ControladorInicio::ctrMejorHabitacion();

$traerFoto = ControladorInicio::ctrTraerFotoHabitacion($mejorHabitacion["mejor"]);

$traerFotoArray = json_decode($traerFoto["galeria"], true);

$totalTestimonios = ControladorTestimonios::ctrMostrarTestimonios(null, null);


?>


<!--=====================================
Total Testimonios
======================================-->

<div >

  <div class="small-box bg-secondary">

    <div class="inner">

      <h3><?php echo count($totalTestimonios); ?></h3>

      <p class="text-uppercase">Testimonios</p>

    </div>

    <div class="icon">

      <i class="fas fa-user-check"></i>

    </div>

    <a href="testimonios" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div> 




<div class="card card-success card-outline">

	<div class="card-header">
		<h5 class="m-0">Habitación más reservada</h5>
	</div>

	<div class="card-body">

		<img src="<?php echo $traerFotoArray[0]; ?>" class="img-thumbnail">

		<h6 class="card-title py-3"><?php echo $mejorHabitacion["mejor"]; ?></h6>

		<a href="reservas" class="btn btn-success">Ver reservas</a>

	</div>

</div> 