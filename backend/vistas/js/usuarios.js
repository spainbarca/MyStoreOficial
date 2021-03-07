/*=============================================
Tabla Usuarios
=============================================*/

// $.ajax({

//     "url":"ajax/tablaUsuarios.ajax.php",
//     success: function(respuesta){
      
//      console.log("respuesta", respuesta);

//     }

// })

/* SUBIENDO LA FOTO DEL USUARIO*/
$(".nuevaFoto").change(function(){
	var imagen = this.files[0];

	/* Validar el formato de imagen (png-jpg)*/
	if(imagen["type"]!= "image/jpeg" && imagen["type"]!= "image/png"){
		$(".nuevaFoto").val("");
			swal({
				title: 				"Error al subir la imagen",
				text: 				"¡La imagen debe estar en formato PNG o JPG!",
				type:				"error",
				confirmButtonText: 	"¡Cerrar!"   
			});

	}else if(imagen["size"] > 2000000){
		$(".nuevaFoto").val("");
			swal({
				title: 				"Error al subir imagen",
				text: 				"¡La imagen no debe pesar más de 2 MB!",
				type: 				"error",
				confirmButtonText: 	"¡Cerrar!"  
			});
	}else{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);
		}) 
	}
})



$(".tablaUsuarios").DataTable({
  "ajax":"ajax/tablaUsuarios.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {

     "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

})


/*=============================================
SUMAR RESERVAS
=============================================*/

$(".tablaUsuarios").on("draw.dt", function(){

  var sumarReservas = $(".sumarReservas");
  var idUsuario = [];
  var sumar = [];

  for(var i = 0; i < sumarReservas.length; i++){

    idUsuario.push($(sumarReservas[i]).attr("idUsuario"));

    var datos = new FormData();
    datos.append("idUsuarioR", idUsuario[i]);

    $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){ 
        
         sumar.push(respuesta.length);
         
         for(var f = 0; f < sumar.length; f++){

           $(sumarReservas[f]).html(sumar[f]);

         }
      
      }

    })  
   
  }

})

/*=============================================
SUMAR TESTIMONIOS
=============================================*/

$(".tablaUsuarios").on("draw.dt", function(){

  var sumarTestimonios = $(".sumarTestimonios");
  var idUsuario = [];
  var sumar = [];

  for(var i = 0; i < sumarTestimonios.length; i++){

    idUsuario.push($(sumarTestimonios[i]).attr("idUsuario"));

    var datos = new FormData();
    datos.append("idUsuarioT", idUsuario[i]);

    $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){      

        sumar.push(respuesta.length);

        for(var f = 0; f < sumar.length; f++){

          $(sumarTestimonios[f]).html(sumar[f]);
        
        }
    
      }

    })

  }

})
