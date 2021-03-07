<?php

$restaurante = ControladorRestaurante::ctrMostrarRestaurante();

?>

<!--=====================================
RESTAURANTE
======================================-->

<div class="fondoRestaurante container-fluid">


</div>

<div class="restaurante container-fluid pt-5" id="restaurante">
	
	<div class="container">

		<div class="grid-container">
		
			<div class="grid-item carta">
				
				<div class="row p-1 p-lg-5">

					<?php foreach ($restaurante as $key => $value): ?>
	
					<div class="col-6 col-md-4 text-center p-1">
						
						<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid w-50 rounded-circle">

						<p class="py-2"><?php echo $value["descripcion"]; ?></p>

					</div>

					<?php endforeach ?>


					<div class="col-12 text-center d-block d-lg-none">
					
						<button class="btn btn-warning text-uppercase mb-5 volverCarta">Volver</button>

					</div>
					
				</div>

			</div>

			<div class="grid-item bloqueRestaurante">
				
				<h1 class="mt-4 my-lg-5">MI EMPRESA S.A.C.</h1>

				<p class="p-4 my-lg-5">Somos una empresa fabricante de leggings y todo tipo de prendas. Realizamos todos los procesos en nuestra planta: elaboramos la tela, la estampamos, y finalmente la confeccionamos.</p>

				<button class="btn btn-warning text-uppercase mb-5 verCarta">Conócenos</button>

			</div>
			
		</div>		

	</div>

</div>