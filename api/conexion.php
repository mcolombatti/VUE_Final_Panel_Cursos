<?php header("Access-Control-Allow-Origin: *");
 
$cnx = mysqli_connect('localhost', 'id17243308_user_apm', 'Aplicaciones_Moviles_2021', 'id17243308_apm_cursos' );
 


function guardar( $idcursos, $nombre, $descripcion, $fecha_inicio, $precio, $profesor, $imagen_descripcion, $imagen ){
	global $cnx;	
 
	$update_imagen = $imagen ? " , imagen = '$imagen'" : "";
    $c = "INSERT INTO cursos VALUES ( $idcursos, $nombre, $descripcion, $fecha_inicio, $precio, $profesor, $imagen_descripcion, $imagen) on duplicate key update nombre = '$nombre', descripcion = '$descripcion', precio ='$precio', profesor ='$profesor', imagen_descripcion ='$imagen_descripcion', fecha_inicio = '$fecha_inicio', $update_imagen";


   
   $retorno = mysqli_query($cnx, $c);
   echo mysqli_error($cnx);
   
	return get_listado();
}

function get_listado($cantidad = null ){ 
	global $cnx;
	$c = "SELECT * FROM cursos ORDER BY id";
	if($cantidad != null){ 
		$c.=" limit $cantidad";
	}
	$f = mysqli_query($cnx, $c);
	$retorno = array( );
	
	while($a = mysqli_fetch_assoc($f)){
		$retorno[] = $a;
	}
	 var_dump($retorno);
	 echo 'ajax';
	
	return json_encode($retorno);
	
}



?>