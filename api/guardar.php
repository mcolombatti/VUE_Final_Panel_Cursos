<?php header("Access-Control-Allow-Origin: *");

include('conexion.php');
	
$idcursos=$_POST["id"] ?? 'NULL';
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$fecha_inicio = $_POST["fecha_inicio"] ?? 'NULL';
$precio = 'NULL'; 
$profesor = $_POST["profesor"] ?? 'NULL'; 
$imagen_descripcion = $_POST["imagen_descripcion"] ?? 'NULL'; 
$imagen = NULL; // la imagen puede ser null
	
 
	if( isset($_FILES["imagen"]) && $_FILES["imagen"]["size"] > 0 ){
		$temporal=$_FILES["imagen"] ["tmp_name"];
		$imagen = $_FILES["imagen"] ["name"];
		move_uploaded_file($temporal, $imagen);
    }

$cursos_form = guardar( $idcursos, $nombre, $descripcion, $fecha_inicio, $precio, $profesor, $imagen_descripcion, $imagen ); 

echo($cursos_form); 


	


?>