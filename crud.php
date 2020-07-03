<?php 
include_once ('base/conexion.php');
$obj = new Conexion();
$conexion= $obj->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST ['nombre'] :'';
$apellido_paterno = (isset($_POST['apellido_paterno'])) ? $_POST ['apellido_paterno'] :'';
$apellido_materno = (isset($_POST['apellido_materno'])) ? $_POST ['apellido_materno'] :'';
$correo = (isset($_POST['correo'])) ? $_POST ['correo'] :'';
$telefono = (isset($_POST['telefono'])) ? $_POST ['telefono'] :'';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_empleado = (isset($_POST['id_empleado'])) ? $_POST ['id_empleado'] :'';

switch ($opcion) {
	case 1://CREATE
	$consulta= "INSERT INTO registros (nombre, apellido_paterno, apellido_materno, correo, telefono)VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$correo', '$telefono') ";
		$resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM registros ORDER BY id_empleado";
         $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:  //UPDATE
		$consulta= "UPDATE registros SET nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', correo='$correo', telefono='$telefono' WHERE id_empleado='$id_empleado'";
		$resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
               
        $consulta = "SELECT * FROM registros WHERE id_empleado='$id_empleado' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

	case 3:// DELETE
		$consulta= "DELETE FROM registros WHERE id_empleado ='$id_empleado'";
		$resultado=$conexion->prepare($consulta);
		$resultado=execute();
		break;

	case 4: //READ  
        $consulta = "SELECT * FROM registros";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;