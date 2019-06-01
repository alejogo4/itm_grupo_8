<?php
    $Nombre=$_POST["Nombre"];
    $Email=$_POST["Email"];

    $Asunto = "Correo De Prueba para host";
    $Cuerpo = "Nombre: $Nombre <br>";
    $Cuerpo .= "Email: $Email <br>";

    //Envio de Mensaje
    mail($Email,$Asunto,$Cuerpo);
?>