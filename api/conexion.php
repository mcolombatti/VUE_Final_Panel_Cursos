<?php header("Access-Control-Allow-Origin: *");

//$cnx = mysqli_connect('localhost', 'root', '', 'base_vue' );

$cnx = mysqli_connect('localhost', 'id17243308_user_apm', 'Aplicaciones_Moviles_2021', 'id17243308_apm_cursos' );
//pass = Base_Vuejs_davinci_12
//usuario=id16975075_base_vue_1
//nombre id16975075_base_vue
//host="localhost"



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