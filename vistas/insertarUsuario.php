<div class="wrapper">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row" >
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="btn-group pull-right">
						<ol class="breadcrumb hide-phone p-0 m-0">
							<li class="breadcrumb-item"><a href="#">Genesis</a></li>
							<li class="breadcrumb-item active">Administrador</li>
						</ol>
					</div>
					<h4 class="page-title"></h4>
				</div>
			</div>
		</div>
		
		<!-- end page title end breadcrumb -->
		
		<div class="row">
			<div class="col-md-4" class="row1" id="row1">
				<h1>Formulario Usuario</h1>
				<form method="POST" class="guardar_datos" id="guardar_los_datos" action="./controladores/controlador.php">
					<input type="hidden" name="insertar_valores" value="si_insertalo">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required="true" placeholder="Ingrese nombre">
					</div>
					<div class="form-group">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" autocomplete="off" required="true" placeholder="Ingrese apellido">
					</div>
					<div class="form-group">
						<label for="correo">correo</label>
						<input type="text" class="form-control" name="correo" id="correo" autocomplete="off" required="true" placeholder="Ingrese correo">
					</div>
					<div class="form-group">
						<label for="telefono">contraseña</label>
						<input type="password" class="form-control" name="contra" id="contra" autocomplete="off" required="true" placeholder="Ingrese contraseña">
					</div>
					<button type="submit" class="btn btn-primary" ><img src="./public/imagenes/guardar.png" height="40" width="40" onclick="" class="rounded-circle"></button>
					<button type="reset" id="resetear" name="resetear" class="btn btn-danger" ><img src="./public/imagenes/eliminar.png" height="40" width="40" onclick="" class="rounded-circle" ></button>
				</form>
			</div>
			<div class="col-md-8">
				<h1>Datos registrados</h1>
				<div id="aqui_la_tabla">
				</div>
			</div>
		</div>
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
			url:'./controladores/Controlador.php',
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
			url:'./controladores/Controlador.php',
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
	var datos = {"consultar_info":"este_es_el_valor","nombre":"veronica","apellido":"concepcion"};
	$.ajax({
		dataType: "json",
		method: "POST",
		url:'./controladores/Controlador.php',
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
