<?php

class email_contacto{

  private $mensaje;
  
  function template($nombre1,$nombre2,$apellido1,$apellido2,$email,$ciudad,$asunto,$mensaje){
    $this->mensaje = '<div style="width: 500px; margin:0 auto; min-height: 500px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #eeeeee; box-shadow: 0 3px 10px rgba(0,0,0,.2)">
    <div class="header_mail" style="overflow: hidden;">
      <img src="http://autopeso.com/php_8/img/header_bg.jpg">
    </div>
    <div class="body_mail" style="text-align: center; background: white; box-sizing: border-box; padding: 25px ">
      <h3>¡Hola, Gracias por contactarte con nosotros, te dejamos una copia de los datos que nos dejaste :</h3>
      <ul style="list-style: none;">
        <li>Nombres: ' .$nombre1.' '.$nombre2. '</li>
        <li>Apellidos: '.$apellido1.' '.$apellido2.'</li>
        <li>email: '.$email.'</li>
        <li>ciudad: '.$ciudad.'</li>
        <li>asunto: '.$asunto.'</li>
        <li>mensaje: '.$mensaje.'</li>
      </ul>
    </div>
    <div class="footer_mail" style="background: #eeeeee; box-sizing: border-box; padding: 25px; text-align: center;">
      <h4>Importante:<br>"Los datos recibidos serán usados unicamente para la compañía"</h4>
    </div>
  
  </div>';
    
  return $this->mensaje;
  }
  


}

?>
