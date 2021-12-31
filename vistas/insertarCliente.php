<?php
include_once '../controladores/conexion.php';
?>
	<div class="wrapper">
		<div class="container-fluid">

			<!-- Page-Title -->
			<div class="row-color-box">
				<div class="col-sm-12">
					<div class="page-title-box">
						<div class="btn-group pull-right">
							<ol class="breadcrumb hide-phone p-0 m-0">
								<li class="breadcrumb-item"><a href="#">Genesis</a></li>
								<li class="breadcrumb-item active">Vendedor</li>
							</ol>
						</div>
						<h4 class="page-title"></h4>
					</div>
				</div>
			</div>
			<!-- end page title end breadcrumb -->
			<div class="row">
				<div class="col-md-4" id="row1" name=row1>
					<h1>Formulario Cliente</h1>
					<form method="POST" class="guardar_datos" id="guardar_los_datos" action="./controladores/Controladorcliente.php">
						<input type="hidden" name="insertar_valores" value="si_insertalo">
						<div class="form-group">
							<label for="dui">Dui</label>
							<input type="text" class="form-control" name="dui" id="dui" data-inputmask="'alias': 'dui'" autocomplete="off" required="true" placeholder="Ingrese dui">
						</div>
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required="true" placeholder="Ingrese nombre">
						</div>
						<div class="form-group">
							<label for="apellido">Apellido</label>
							<input type="text" class="form-control" name="apellido" id="apellido" autocomplete="off" required="true" placeholder="Ingrese apellido">
						</div>
						<div class="form-group">
							<label for="direccion">Direccion</label>
							<input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off" required="true" placeholder="Ingrese direccion">
						</div>
						<div class="form-group">
							<label for="telefono">Telefono</label>
							<input type="text" class="form-control" name="telefono" id="telefono" data-inputmask="'alias': 'telefono'" autocomplete="off" required="true" placeholder="Ingrese telefono">
						</div>
						<button type="submit" class="btn btn-primary"><img src="./public/imagenes/guardar.png" height="40" width="40" onclick="" class="rounded-circle" ></button>
						<button type="reset" id="resetear" name="resetear" class="btn btn-danger"><img src="./public/imagenes/eliminar.png" height="40" width="40" onclick="" class="rounded-circle" ></button>
					</form>
				</div>
				<div class="col-md-8" name="seccion_lista" id="seccion_lista">
					<h1>Datos registrados</h1>
					<div id="aqui_la_tabla">
					</div>
				</div><!--fin de col-->
			</div><!--fin de row-->
		</div> <!-- end container -->
	</div>
	<!-- end wrapper -->
<script>

$(function(){
	console.log("Esta funcionando");
	cargar_ajax();

	$(document).on("click",".btn_eliminar",function(event){
		event.preventDefault();
		var elemento = $(this);
		var id = elemento.attr("data-id");
		console.log("El id es: ",id);

		var datos = {"eliminar_datos":"si_eliminalos","id":id}
		$.ajax({
			dataType: "json",
			method: "POST",
			url:'./controladores/Controladorcliente.php',
			data : datos,
		}).done(function(mensaje) {
			if(mensaje[0]=="Exito"){
				alert("Datos eliminados correctamente");
				cargar_ajax();
			}else{
				alert("Datos no eliminados");
			}
		});
	});

	$("#guardar_los_datos").submit(function (event){
		event.preventDefault();
		var datos = $("#guardar_los_datos").serialize();
		console.log("esto trae datos: ",datos);
		$.ajax({
			dataType: "json",
			method: "POST",
			url:'./controladores/Controladorcliente.php',
			data : datos,
		}).done(function(mensaje) {
			if(mensaje[0]=="Exito"){
				$("#guardar_los_datos").trigger("reset");
				alert("Datos insertados correctamente");
				cargar_ajax();
			}else{
				console.error("Los datos no fueron insertados",mensaje);
			}
		});
	});
});

function cargar_ajax(){
	console.log("llega a la funcion ajax");
	// return;
	var datos = {"consultar_info":"este_es_el_valor"};
	$.ajax({
		dataType: "json",
		method: "POST",
		url:'./controladores/Controladorcliente.php',
		data : datos,
	}).done(function(json) {
		console.log("Estos datos retorna: ",json);
		if (json[0]=="error") {
			console.error("Ocurrio un error");
		}else{
			$("#aqui_la_tabla").empty().html(json[1]);
		}
	}).fail(function() {
		alert( "error" );
	}).always(function() {
		console.log( "complete" );
	});
}
</script>
