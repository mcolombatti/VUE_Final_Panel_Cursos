<?php header("Access-Control-Allow-Origin: *");

//$cnx = mysqli_connect('localhost', 'root', '', 'base_vue' );

$cnx = mysqli_connect('localhost', 'id17243308_user_apm', 'Aplicaciones_Moviles_2021', 'id17243308_apm_cursos' );
//pass = Base_Vuejs_davinci_12
//usuario=id16975075_base_vue_1
//nombre id16975075_base_vue
//host="localhost"


function guardar( $idcursos, $nombre, $descripcion, $fecha_inicio, $precio, $profesor, $imagen_descripcion, $imagen ){
	global $cnx;	
	//En el editar si la imagen es null, creamos un string vacio y si tenemos imagen lo asociamos al query

	$update_imagen = $imagen ? " , imagen = '$imagen'" : "";
    $c = "INSERT INTO cursos VALUES ( $idcursos, $nombre, $descripcion, $fecha_inicio, $precio, $profesor, $imagen_descripcion, $imagen) on duplicate key update nombre = '$nombre', descripcion = '$descripcion', precio ='$precio', profesor ='$profesor', imagen_descripcion ='$imagen_descripcion', fecha_inicio = '$fecha_inicio', $update_imagen";


   
   $retorno = mysqli_query($cnx, $c);
   echo mysqli_error($cnx);
   
	return get_listado();
}

function get_listado($cantidad = null ){ //si mando un n�mero lo mando como limit, sino trae todos los registros
	global $cnx;
	$c = "SELECT * FROM cursos ORDER BY id";
	if($cantidad != null){ //si recibi algo lo concateno al final del query
		$c.=" limit $cantidad";
	}
	$f = mysqli_query($cnx, $c);
	$retorno = array( );
	
	while($a = mysqli_fetch_assoc($f)){
		$retorno[] = $a; //agrego cada item al array retorno.
	}
	//lo convierto a un JSON - se lo mando a la App
	 var_dump($retorno);
	 echo 'ajax';
	
	return json_encode($retorno);
	
}



?>