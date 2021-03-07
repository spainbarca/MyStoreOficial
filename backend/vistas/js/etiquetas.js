
$(".tablaEtiquetas").DataTable({
	"ajax":"ajax/tablaEtiquetas.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
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

});





/* Editar Cliente */
$(".tablaEtiquetas tbody").on("click", "button.btnEditarEtiqueta", function(){

	var idEtiqueta = $(this).attr("idEtiqueta");

	var datos = new FormData();
    datos.append("idEtiqueta", idEtiqueta);

    $.ajax({

      url:"ajax/etiquetas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
             
           $("#idEtiqueta").val(respuesta["id"]);
	       $("#editarEtiqueta").val(respuesta["nombre"]);
	       $("#editarCodigo").val(respuesta["codigo"]);
	       $("#editarEmail").val(respuesta["destino"]);
	 	} 
  	})
})



/* Eliminar etiqueta */
$(document).on("click", ".btnEliminarEtiqueta", function(){

	var idEtiqueta = $(this).attr("idEtiqueta");

	swal({
	    title: '¿Está seguro de eliminar la etiqueta?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar etiqueta!'
	  }).then(function(result){
		
		if(result.value){

	    	var datos = new FormData();
       		datos.append("idEliminar", idEtiqueta);

       		$.ajax({

	          url:"ajax/etiquetas.ajax.php",
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
	                  text: "La etiqueta ha sido borrada correctamente",
	                  showConfirmButton: true,
	                  confirmButtonText: "Cerrar",
	                  closeOnConfirm: false
	                 }).then(function(result){

	                    if(result.value){

	                      window.location = "etiquetas";

	                    }
	                
	                })

	          	}

	          }

	        })  

	    }

	})

})
	