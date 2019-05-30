<?php

require(dirname(__DIR__)."/hola.php");
class Ejemplo{
    
    

    function imprimir(){
        $nombre = "Alejandro";
        $mensaje = new email_registro();
        $mensaje->template($nombre,'A','B','C','E');
        echo $mensaje->mensaje;
    }
}

$ej = new Ejemplo();
$ej->imprimir();