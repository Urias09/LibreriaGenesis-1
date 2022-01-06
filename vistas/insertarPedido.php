
<div class="wrapper">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="btn-group pull-right">
						<ol class="breadcrumb hide-phone p-0 m-0">
							<li class="breadcrumb-item"><a href="#">Genesis</a></li>
							<li class="breadcrumb-item active">Usuario</li>
						</ol>
					</div>
					<h4 class="page-title"></h4>
				</div>
			</div>
		</div>
		<!-- end page title end breadcrumb -->
		<span>
		<div class="row">
			<div class="col-md-4" id="row1">
				<h1>Formulario Pedididos</h1>
				<form method="POST" class="guardar_datos" id="guardar_los_datos" action="../controladores/ControladorPedido.php">
					<input type="hidden" name="insertar_valores" value="si_insertalo">
					<div class="form-group">
						<label for="nombre">DUI</label>
						<input type="text" class="form-control" name="dui" id="dui" autocomplete="off" required="true" placeholder="ingrese dui" max="10" maxlength="10"></div>
						<button class="btn btn-primary" data-toggle="modal" data-target="#modal1">Agregar Pedido</button>
					<div class="form-group">
                     <label>Fecha:</label>
                      <input  class="form-control" type="date"  id="fecha" name="fecha" value="fecha">
                    </div>
                    <div class="form-group">
                     <label>Fecha de entrega:</label>
                      <input  class="form-control" type="date"  id="fecha" name="fecha" value="fecha">
                    </div>
					<div class="form-group">
                     <label>Total:</label>
                      <input  class="form-control" type="text" name="total" value="total">
                    </div>
                    <div class="form-group">
                    <label>Efectivo:</label>
                      <input class="form-control" type="text" name="total" value="total">
                    </div>

					<div class="form-check">
                          <div class="form-check">
  							<input class="form-check-input" type="radio" name="factura" id="factura">
  							<label class="form-check-label" for="factura">
  							  Factura
 						    </label>
						</div>
							<div class="form-check">
 						 		<input class="form-check-input" type="radio" name="ticket" id="ticket" checked>
 						 		<label class="form-check-label" for="ticket">
  							    Ticket
  								</label>
							</div>
					</div>
					<button type="submit" class="btn btn-primary">Generar Comprobante<img src="./public/imagenes/guardar.png" height="40" width="40" onclick=""  class="rounded-circle"></button>
				   </form>
			       
			</div>
			<div class="col-md-8">
				<h1>Datos registrados</h1>
				<div id="aqui_la_tabla">
				
			        <table class="table table-bordered" id="mitabla">
				      <thead>
					    <tr>
						<th>N°</th>
						<th>Fecha</th>
						<th>cliente</th>
						<th>Total</th>
						<th>N° Comprobante</th>
						<th>Vendedor</th>
						<th>Acciones</th>
					   </tr>
				     </thead>
				<tbody>
					 <tr>
				   <td>1</td>
				   <td>12/08/21</td>
				   <td>SelenaRenderos</td>
				   <td>$40.00</td>
				   <td>0012</td>
				   <td>Oscar Urias</td>
				   <td>
								<button  type="button" class="btn btn-primary " ><img src="./public/imagenes/agregar.png" height="40" width="40" onclick=""class="rounded-circle"></button>
								<button type="button" class="btn btn-danger btn_eliminar" data-id="'.$row['idtusuario'].'"><img src="./public/imagenes/lista.png" height="40" width="40" onclick=""class="rounded-circle"></button>
							</td>
			          <tr>
				</tbody>
			</table>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end container -->
</div>
<div class="container"  >
<div class="modal" tabindex="-1" id="modal1">
	<div class="modal-dialog">
		<div class="modal-content"></div>
			<div class="modal-header">
			Encabezado
			</div>
			<div class="modal-body">
					<h1>Formulario Producto</h1>
					<form method="POST" class="guardar_datos" id="guardar_los_datos" action="./controladores/ControladorProducto.php">
						<input type="hidden" name="insertar_valores" value="si_insertalo">
						<div class="form-group">
							 <section>
								
							</section>
						</div>
						<div class="form-group">
							
						</div>
						<div class="form-group">
							
						</div>
						<div class="form-group">
							
						</div>
						<div class="form-group" id="combobox" name="combobox" >

							<label for="proveedor">Proveedor</label>	
						<select for="proveedor"name="proveedor" type="text"class="form-control" autocomplete="off" name="proveedor" id="proveedor" data-input mask="'alias': 'proveedor'" placeholder="Ingrese proveedo"
						autocomplete="off" required="true">
						<?php
						$instancia = new Conexion();
                        $conectar = $instancia->obtene_conexion(); 
						$sql = "SELECT *FROM producto";
						$statement = $conectar->prepare($sql);
						$statement->execute();
						$datos = $statement->fetchAll();

				/*		$sql="SELECT idProveedor, nombre FROM proveedor order by idProducto";
		                  $statement = $conectar->prepare($sql);
		                  $statement->execute();
		                  $datos = $statement->fetchAll();  //obtiene todos los datos de select para un array */ ?>
                        <option value="0">selesccion proveedor</option>
                        <?php foreach($datos as $row){   ?>  
                         <option value="<?php echo $row['idproveedor'] ?>"><?php echo $row['nombre']; ?></option>
                        	<?php }?>
                         </select>
						</div>
						<button type="submit" class="btn btn-primary"><img src="./public/imagenes/guardar.png" height="40" width="40" onclick="" class="rounded-circle" ></button>
						<button type="reset" id="resetear" name="resetear" class="btn btn-danger"><img src="./public/imagenes/eliminar.png" height="40" width="40" onclick="" class="rounded-circle" ></button>
					</form>
			<div class="modal-footer">
			Pie
			<button type="btn btn-primary"><img src="./public/imagenes/guardar.png" height="40" width="40" onclick="" class="rounded-circle"></button>
			<button type="btn btn-danger"><img src="./public/imagenes/eliminar.png" height="40" width="40" onclick="" class="rounded-circle" ></button>
			</div>
		</div>
	</div>
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
			url:'./controladores/ControladorPedido.php',
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
		console.log("esto trae datosLOV: ",datos);
		$.ajax({
			dataType: "json",
			method: "POST",
			url:'./controladores/ControladorPedido.php',
			data : datos,
		}).done(function(mensaje) {
			if(mensaje[0]=="Exito"){
				$("#guardar_los_datos").trigger("reset");
				alert("Datos insertados correctamente",mensaje[1]);
				cargar_ajax();
			}else{
				console.error("Los datos no fueron insertados".href=,mensaje);
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
		url:'./controladores/ControladorProveedor.php',
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
