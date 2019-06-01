<?php

class email_contrasena{

  private $mensaje;
  
  function template($email,$passAleatoria){
    $this->mensaje = '<div style="width: 500px; margin:0 auto; min-height: 500px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #eeeeee; box-shadow: 0 3px 10px rgba(0,0,0,.2)">
    <div class="header_mail" style="overflow: hidden;">
      <img src="http://autopeso.com/php_8/img/header_bg.jpg">
    </div>
    <div class="body_mail" style="text-align: center; background: white; box-sizing: border-box; padding: 25px ">
      <h3>Esta es la clave temporal que le hemos asignado, recuerda cambiarla por tu seguridad :</h3>
      <ul style="list-style: none;">
        
        <li>email: '.$email.'</li>
        <li>contraseña: '.$passAleatoria.'</li>
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
