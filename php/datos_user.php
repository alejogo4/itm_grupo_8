<?php
    require '../db/clases.php';
    $Email = $_POST["Email"];

    $db = new db();
    $result = $db->seleccionar_registros();

    $usuarios = []; //El arreglo que va contener todos los valores de la BD

	while($dato = $result->fetch_assoc()){

		/*Crear un arreglo asociativo con los datos de la base de datos*/
		
            $usuario = array(
                "nombre1" => $dato["nombre1"],
                "apellido1"=>$dato["apellido1"],
                "email"=>$dato["email"],
                "rol" => $dato["rol"],
                "fecha_acceso"=> $dato["fecha_acceso"]
            );
        
		
		
		$usuarios[] = $usuario;
	}
	
	//Convertir lo que seleccionamos en un archivo json
	echo json_encode($usuarios);
?>