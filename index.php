<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Proyecto CRUD
	</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"> <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
  </head>
<body>
<header>
	<h3 class="text-center"></h3>
</header>
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<button type="button" id ="btnNuevo" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">Nuevo Registro
</button>
		</div>
	</div>
</div>
<div class="container">
	<div class="row"> 
<div class="col">
<div class="table-responsive">
	<table id="tablaEmpleados" class="table table-striped table-bordered" style="width: 100%">
		<thead class="text-center"> 
<tr>
	<th>ID</th>
	<th>Nombre</th>
	<th>Apellido Paterno</th>
	<th>Apellido Materno</th>
	<th>Correo</th>
	<th>Telefono</th>
	<th>Acciones</th>
</tr>
		</thead>
	</table>
	
</div>	
</div>
	</div>	
</div>

<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEmpleados">
      <div class="modal-body">
       <div class="row">
       <div class="col">
       <div class="form-group">
       	<label for="nombre" class="form-label">Nombre</label>
       	<input type="text" class="form-control text-uppercase" id="nombre" placeholder="Nombre" required>
       </div>	
      </div>
    </div>
      <div class="row">
      	<div class="col-md-6">
      		<div class="form-group">
      			<label for="apellido_paterno" class="form-label">Apellido Paterno</label>
      				<input type="text" class="form-control text-uppercase" id="apellido_paterno" placeholder="Apellido Paterno" required>
      		</div>
      	</div>
      		<div class="col-md-6">
      		<div class="form-group">
      			<label for="apellido_materno" class="form-label">Apellido Materno</label>
      				<input type="text" class="form-control text-uppercase" id="apellido_materno" placeholder="Apellido Materno" required>
      		</div>
      	</div>
      	</div>
      	<div class="row">
      	<div class="col-md-6">
      		<div class="form-group">
      			<label for="correo" class="form-label">Correo Electrónico</label>
      				<input type="email" class="form-control" id="correo" placeholder="Correo Electronico" required>
      		</div>
      	</div>
      		<div class="col-md-6">
      		<div class="form-group">
      			<label for="telefono" class="form-label">Numero Telefónico</label>
      				<input type="text" class="form-control" id="telefono" placeholder=" Numero Telefónico" required>
      		</div>
      	</div>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
  </body>
</html>