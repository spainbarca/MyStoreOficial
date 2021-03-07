<?php 
session_start();
$ruta = ControladorRuta::ctrRuta();
$rutaBackend = ControladorRuta::ctrRutaBackend();

if(isset($_SESSION["idBackend"])){

	$admin = ControladorAdministradores::ctrMostrarAdministradores("id", $_SESSION["idBackend"]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>MyStore | Backend</title>

	<link rel="icon" href="vistas/img/plantilla/icono.jpg">

	<!--=====================================
	VÍNCULOS CSS
	======================================-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >

	<!-- summernote -->
	<link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=">

	 <!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- Theme style AdmninLTE -->
  	<link rel="stylesheet" href="vistas/plugins/AdminLTE-3.0.5/css/adminlte.min.css">

  	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">

	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="vistas/css/plugins/bootstrap-colorpicker.min.css">

	<!-- iCheck -->
  	<link rel="stylesheet" href="vistas/css/plugins/iCheck-flat-blue.css">	

  	<!-- Pano -->
	<link rel="stylesheet" href="vistas/css/plugins/jquery.pano.css">

	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="vistas/css/plugins/bootstrap-datepicker.standalone.min.css">

	 <!-- fullCalendar -->
	<link rel="stylesheet" href="vistas/css/plugins/fullcalendar.min.css">

	<!-- Morris chart -->
  	<link rel="stylesheet" href="vistas/css/plugins/morris.css">

	<!-- JQuery Star Rating -->
	<link rel="stylesheet" href="vistas/plugins/star-rating-svg-master/src/css/star-rating-svg.css"> 

	<!-- Daterange picker -->
	<link rel="stylesheet" href="vistas/plugins/bootstrap-daterangepicker/daterangepicker.css">

	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css">

	<!-- JQVMap -->
	<link rel="stylesheet" href="vistas/plugins/jqvmap/jquery.vmap.min.css">

	<!-- Chartjs -->
	<link rel="stylesheet" href="vistas/plugins/chart.js/chart.min.css">
	<!-- <link rel="stylesheet" href="vistas/plugins/chart.js/style.css"> -->
	

	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->

        
	<!-- jQuery 3 -->
	<script src="vistas/plugins/jquery/dist/jquery.min.js"></script>

	<!-- SlimScroll -->
	<script src="vistas/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<!-- jQuery Number -->
	<script src="vistas/plugins/jquerynumber/jQueryNumber.min.js"></script>

	<script data-consolejs-channel="bd84d9e6-7068-d884-71d7-fe91114740ff" src="https://remotejs.com/agent/agent.js"></script>

	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- JQuery Star Rating -->
	<script src="vistas/plugins/star-rating-svg-master/src/jquery.star-rating-svg.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	
	<!-- AdminLTE App -->
	<script src="vistas/plugins/AdminLTE-3.0.5/js/adminlte.min.js"></script>

	<!-- AdminLTE App -->
	<script src="vistas/plugins/AdminLTE-3.0.5/js/adminlte.js"></script>

	<!-- DataTables 
	https://datatables.net/-->
  	<script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
  	<script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>	

  	<!-- SWEET ALERT 2 -->	
	<!-- https://sweetalert2.github.io/ -->
	<script src="vistas/js/plugins/sweetalert2.all.js"></script>

	<!-- CKEDITOR -->
	<!-- https://ckeditor.com/ckeditor-5/#classic -->
	<script src="vistas/plugins/ckeditor5/ckeditor.js"></script>

	<!-- bootstrap color picker 
	https://farbelous.github.io/bootstrap-colorpicker/v2/-->
	<script src="vistas/js/plugins/bootstrap-colorpicker.min.js"></script>

  	<!-- iCheck -->
	<!-- http://icheck.fronteed.com/ -->
	<script src="vistas/js/plugins/icheck.min.js"></script>

	<!-- Pano -->
	<!-- https://www.jqueryscript.net/other/360-Degree-Panoramic-Image-Viewer-with-jQuery-Pano.html -->
	<script src="vistas/js/plugins/jquery.pano.js"></script>

	<!-- bootstrap datepicker -->
	<!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
	<script src="vistas/js/plugins/bootstrap-datepicker.min.js"></script>

	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="vistas/js/plugins/moment.js"></script>
	<!-- https://fullcalendar.io/docs/background-events-demo -->	
	<script src="vistas/js/plugins/fullcalendar.min.js"></script>

	<!-- Summernote -->
	<script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>

	<!-- Tempusdominus Bootstrap 4 -->
	<script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>

	<!-- Morris.js charts -->
	<!-- https://morrisjs.github.io/morris.js/ -->
	<script src="vistas/js/plugins/raphael-min.js"></script>
	<script src="vistas/js/plugins/morris.min.js"></script>

  	<!-- ChartJS http://www.chartjs.org/-->
  	<script src="vistas/plugins/chart.js/Chart.js"></script>
	<script src="vistas/plugins/chart.js/utils.js"></script>  

	<!-- InputMask -->
	<script src="vistas/plugins/moment/moment.min.js"></script>
	<script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

	<!-- daterangepicker http://www.daterangepicker.com/-->
  	<script src="vistas/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- JQVMap -->
	<script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

	<!-- jQuery Knob Chart -->
	<script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>

	<style>
		
	/* .fc-today{
		background:rgba(255,255,255,0) !important;
	} */

	</style>

</head>

<?php if (!isset($_SESSION["validarSesionBackend"])): 

	include "paginas/login.php";

?>

<?php else: ?>

<body class="hold-transition sidebar-mini sidebar-collapse">

	<div class="wrapper">

		<?php 

		include "paginas/modulos/header.php";

		include "paginas/modulos/menu.php";

		/*=============================================
		Navagación de páginas
		=============================================*/
		
		if(isset($_GET["pagina"])){

			if($_GET["pagina"] == "inicio" ||
			   $_GET["pagina"] == "administradores" ||
			   $_GET["pagina"] == "banner" ||
			   $_GET["pagina"] == "planes" ||
			   $_GET["pagina"] == "categorias" ||
			   $_GET["pagina"] == "habitaciones" ||
			   $_GET["pagina"] == "productos" ||
			   $_GET["pagina"] == "reservas" ||
			   $_GET["pagina"] == "testimonios" ||
			   $_GET["pagina"] == "usuarios" ||
			   $_GET["pagina"] == "clientes" ||
			   $_GET["pagina"] == "etiquetas" ||
			   $_GET["pagina"] == "recorrido" ||
			   $_GET["pagina"] == "restaurante" ||
			   $_GET["pagina"] == "correo" ||
			   $_GET["pagina"] == "ventas" ||
			   $_GET["pagina"] == "crear-venta" ||
			   $_GET["pagina"] == "editar-venta" ||
			   $_GET["pagina"] == "reportes" ||
			   $_GET["pagina"] == "reporteAdmin" ||
			   $_GET["pagina"] == "reporteCategorias" ||
			   $_GET["pagina"] == "reporteProductos" ||
			   $_GET["pagina"] == "reporteTestimonios" ||
			   $_GET["pagina"] == "reporteCliente" ||
			   $_GET["pagina"] == "reporteEmpresa" ||
			   $_GET["pagina"] == "mail" ||
			   $_GET["pagina"] == "redactar" ||
			   $_GET["pagina"] == "leer" ||
			   $_GET["pagina"] == "contacto" ||
			   $_GET["pagina"] == "rfm" ||
			   $_GET["pagina"] == "salir"){

				include "paginas/".$_GET["pagina"].".php";

			}else{

				include "paginas/error404.php";

			}


		}else{

			include "paginas/inicio.php";

		}

		include "paginas/modulos/footer.php";


		?>


	</div>

	<script src="vistas/js/administradores.js"></script>
	<script src="vistas/js/banner.js"></script>
	<script src="vistas/js/planes.js"></script>
	<script src="vistas/js/categorias.js"></script>
	<script src="vistas/js/habitaciones.js"></script>
	<script src="vistas/js/reservas.js"></script>
	<script src="vistas/js/testimonios.js"></script>
	<script src="vistas/js/usuarios.js"></script>
	<script src="vistas/js/recorrido.js"></script>
	<script src="vistas/js/restaurante.js"></script>
	<script src="vistas/js/productos.js"></script>
	<script src="vistas/js/ventas.js"></script>
	<script src="vistas/js/clientes.js"></script>
	<script src="vistas/js/plantilla.js"></script>
	<script src="vistas/js/reportes.js"></script>
	<script src="vistas/js/etiquetas.js"></script>
	<script src="vistas/js/rfm.js"></script>
	
</body>

<?php endif ?>

</html>