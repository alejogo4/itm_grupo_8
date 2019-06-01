<?php

class email{

    function enviar($emailEnvia,$emailRecibe,$asunto,$mensaje){
	
        //se encarcará de enviar los diferentes mensajes al correo electrónico del usuario (este método debe ser invocado desde los diferentes métodos y clases que estén relacionados con la funcionalidad solicitada. )
	
		/*$cabeceras =  'From:'.$emailRecibe."\r\n";
   		$cabeceras .= 'Reply-To:'.$emailEnvia. "\r\n";
   		$cabeceras .= 'X-Mailer: PHP/' . phpversion();
 		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";*/
		//Funcion php para enviar un email: mail()
		
		mail($emailRecibe, $asunto, $mensaje);
    }

}