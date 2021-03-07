<?php 

$tabla1 = "categorias";
$tabla2 = "habitaciones";
$valor = null;

$peorHabitacion = ControladorInicio::ctrPeorHabitacion();

$traerFoto = ControladorInicio::ctrTraerFotoHabitacion($peorHabitacion["peor"]);

$traerFotoArray = json_decode($traerFoto["galeria"], true);

$subcategorias = ControladorHabitaciones::ctrMostrarListadoHabitaciones($tabla1, $tabla2, $valor);
$totalSubcategorias = count($subcategorias);

?>

<!--=====================================
Total Subcategorias
======================================-->

<div >

  <div class="small-box bg-yellow">

    <div class="inner">

      <h3><?php echo number_format($totalSubcategorias); ?></h3>

      <p class="text-uppercase">Subcategorías</p>

    </div>

    <div class="icon">

      <i class="fas fa-user-check"></i>

    </div>

    <a href="habitaciones" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div> 


<div class="card card-danger card-outline">

	<div class="card-header">
		<h5 class="m-0">Habitación menos reservada</h5>
	</div>

	<div class="card-body">

		<img src="<?php echo $traerFotoArray[0]; ?>" class="img-thumbnail">

		<h6 class="card-title py-3"><?php echo $peorHabitacion["peor"]; ?></h6>

		<a href="reservas" class="btn btn-danger">Ver reservas</a>

	</div>

</div>