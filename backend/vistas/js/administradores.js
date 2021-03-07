/*=============================================
Tabla Administradores
=============================================*/
// $.ajax({

// 	"url":"ajax/tablaAdministradores.ajax.php",
// 	success: function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

/*=============================================
Subir imagen temporal Categoria
=============================================*/

$("input[name='subirFoto'], input[name='editarFoto']").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
	  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	  =============================================*/
  
	  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
  
		$("input[name='subirFoto'], input[name='editarFoto']").val("");
  
		 swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		  });
  
	  }else if(imagen["size"] > 2000000){
  
		$("input[name='subirFoto'], input[name='editarFoto']").val("");
  
		 swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		  });
  
	  }else{
  
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
  
		$(datosImagen).on("load", function(event){
  
		  var rutaImagen = event.target.result;
  
		  $(".previsualizarFoto").attr("src", rutaImagen);
  
		})
  
	}
  
})


$(".tablaAdministradores").DataTable({
	"ajax":"ajax/tablaAdministradores.ajax.php", //Ruta del archivo q mostrara mis registros
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ usuarios",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando usuarios del _START_ al _END_",
		"sInfoEmpty":      "Mostrando usuarios del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Búscame:",
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

});

/*=============================================
Editar Administrador
=============================================*/

$(document).on("click", ".editarAdministrador", function(){

	var idAdministrador = $(this).attr("idAdministrador");

	var datos = new FormData();
  	datos.append("idAdministrador", idAdministrador);

  	$.ajax({
  		url:"ajax/administradores.ajax.php",
  		method: "POST",
  		data: datos,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(respuesta){ 	

    		$('input[name="editarId"]').val(respuesta["id"]);
    		$('input[name="editarNombre"]').val(respuesta["nombre"]);
    		$('input[name="editarUsuario"]').val(respuesta["usuario"]);
    		$('input[name="passwordActual"]').val(respuesta["password"]);
    		$('.editarPerfilOption').val(respuesta["perfil"]);
			$('.editarPerfilOption').html(respuesta["perfil"]);
			
			if(respuesta["fotito"]!= ""){
				$(".previsualizarFoto").attr("src", respuesta["fotito"]);
			}else{
				$(".previsualizarFoto").attr("src", "vistas/img/admins/default/anonymus.png");
			}

    	}

  	})

})

/*=============================================
Activar o desactivar administrador
=============================================*/

$(document).on("click", ".btnActivar", function(){

	var idAdmin = $(this).attr("idAdmin");
	var estadoAdmin = $(this).attr("estadoAdmin");
	var boton = $(this);

	var datos = new FormData();
  	datos.append("idAdmin", idAdmin);
  	datos.append("estadoAdmin", estadoAdmin);

  	 $.ajax({

      url:"ajax/administradores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      	
      	if(respuesta == "ok"){

      		if(estadoAdmin == 0){

      			 $(boton).removeClass('btn-info');
      			 $(boton).addClass('btn-dark');
      			 $(boton).html('Desactivado');
      			 $(boton).attr('estadoAdmin', 1);

      		}else{

	            $(boton).addClass('btn-info');
	            $(boton).removeClass('btn-dark');
	            $(boton).html('Activado');
	            $(boton).attr('estadoAdmin',0);

	        }

      	}

      }

    })  

})

/*=============================================
Eliminar Administrador
=============================================*/

$(document).on("click", ".eliminarAdministrador", function(){

	var idAdministrador = $(this).attr("idAdministrador");

	if(idAdministrador == 16){

		swal({
          title: "Error",
          text: "Este administrador no se puede eliminar",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

        return;

	}

	swal({
	    title: '¿Está seguro de eliminar este administrador?',
	    text: "¡Si no lo está puede cancelar la acción!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Si, eliminar administrador!'
	  }).then(function(result){

	    if(result.value){

	    	var datos = new FormData();
       		datos.append("idEliminar", idAdministrador);

       		$.ajax({

	          url:"ajax/administradores.ajax.php",
	          method: "POST",
	          data: datos,
	          cache: false,
	          contentType: false,
	          processData: false,
	          success:function(respuesta){

	          	if(respuesta == "ok"){

	          		swal({
	                  type: "success",
	                  title: "¡CORRECTO!",
	                  text: "El administrador ha sido borrado correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 }).then(function(result){

	                    if(result.value){

	                      window.location = "administradores";

	                    }
	                
	                })

	          	}

	          }

	        })  

	    }

	})

})