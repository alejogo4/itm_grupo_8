<?php
require_once '../db/seguridad.php';

if(isset( $_POST['actividad'] )) {

     $seguridad = new seguridad();
     $result = $seguridad->inactividad();
   
}