<?php
ini_set("date.timezone", "America/Bogota");
error_reporting(E_ERROR);
session_start();
require("seguridad.php");
class db{
    
    private $connect;
    private $emailSesion;
    private $passSesion;


    function db_open(){
        $this->connect = new mysqli("localhost","root","root","website201901");
        $this->connect->set_charset("utf8");
        /*if($connect->connect_error){
            echo 'El error es '.$connect->connect_error;
        }*/
        echo ($this->connect->connect_error)? 'El error es '.$this->connect->connect_error. ' Numero ' . $this->connect->connect_errno: '';    
    }
    
    function db_close(){
        $this->connect->close();
    }
    
    function seleccionar_perfiles(){

        $sql = "SELECT * FROM  perfil WHERE idequipo='PPI620308' ";
        $result = $this->db_sql($sql);
        return $result;
        
    }

    function seleccionar_equipos(){
        $sql = "SELECT * FROM perfilequipo WHERE idequipo='PPI620308'";
        $result = $this->db_sql($sql);
        return $result;
        
    }

    function db_ingresar(){

    }

    function check_user($Email,$Password, $complete){
        
        $sql = "";
        if($complete){
            //$password_hash = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM usuarios WHERE Email='".$Email."' AND Password='".$Password."' ";
        }else{
            $sql = "SELECT * FROM usuarios WHERE Email='".$Email."'";
        }
        
        $result = $this->db_sql($sql);
        $row_cnt = $result->num_rows;
        return $row_cnt;
    }


    

    function registro_user($email,$password,$nombre1,$nombre2,$apellido1,$apellido2){
        $currentDate = date('Y-m-d H:i:s');
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        if($this->check_user($email,$password,false) > 0){
            return false;
        }else{
            $sql = "INSERT INTO usuarios (nombre1,nombre2,apellido1,apellido2,password,email,fecha_registro)
        VALUES ('$nombre1' ,'$nombre2','$apellido1','$apellido2','$password_hash','$email','$currentDate')";
            $result = $this->db_sql($sql);
            return $result;

            $paraquien = "$nombre1 $apellido1 <$email>";
            $asunto = "Registro Exitoso";
            $mensaje = "
                Hola $nombre1 <br>
                Tu registro ha sido exitoso. Bienvenido a nuestro Sitio Web! <br><br>

                A continuación, una copia de los datos que has suministrado: <br><br>

                Nombres: $nombre1 $nombre2 <br>
                Apellidos: $apellido1 $apellido2 <br>
                Email: $email <br>
                <br>

                Te esperamos pronto. <br><br>

                El equipo de PHP ITM
            ";

            email::enviar($paraquien,$asunto,$mensaje);
        }

    }

    function inicioSesion($email,$password){
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: ../index.php"); //Borrar get variables
    }

    function cerrarSesion(){
        session_start();
        session_destroy();
        header("Location: ../index.php");
    }

    function check_login(){
        if($this->check_user($this->emailSesion, $this->passSesion,true)>0){
            return true;
        }

        return false;
    }

    function seleccionar_contacto(){
        $this->putSessions();
        $sql = "SELECT * FROM contacto WHERE email='".$this->emailSesion."'";
        $result = $this->db_sql($sql);
        return $result;
    }

    function mensaje_contacto($id){
        $sql = "SELECT * FROM contacto WHERE contacto_id='".$id."'";
        $result = $this->db_sql($sql);
        return $result;
    }



    function seleccionar_registro(){
        $sql = "SELECT * FROM usuarios WHERE email='".$this->emailSesion."'";
        $result = $this->db_sql($sql);
        return $result;
    }

    function changePassword($currentPassword,$newPassword){
        $this->putSessions();
        if($this->check_user($this->emailSesion,$currentPassword,true) > 0){
            $sql = "UPDATE usuarios SET password = '".$newPassword."' WHERE email = '".$this->emailSesion."'";
            $result = $this->db_sql($sql);
            return true;
        }else{
            return false;
        }
    }

    function addInfo($edad, $genero, $ocupacion){
        $this->putSessions();
        $sql = "UPDATE usuarios SET edad = '$edad', sexo = '".$genero."', profesion  = '".$ocupacion."' WHERE email = '".$this->emailSesion."'";
        $result = $this->db_sql($sql);
        return $result;
    }

    function registro_contacto($email,$nombre1,$nombre2,$apellido1,$apellido2,$ciudad,$asunto,$mensaje){
        $this->putSessions();
        $sql = "INSERT INTO contacto (email,nombre1,nombre2,apellido1,apellido2,ciudad,asunto,mensaje)
        VALUES ('$this->emailSesion' ,'$nombre1','$nombre2','$apellido1','$apellido2','$ciudad','$asunto','$mensaje')";
        $result = $this->db_sql($sql);        
        return $result;
    }
    
    
    
    
    function sacarporcentaje($String){
        $porcentaje='';
        $letras=str_split($String);
        $numero1=strlen($String)-3;
        $numero2=strlen($String)-2;
        $porcentaje= $letras[$numero1].$letras[$numero2];
        return $porcentaje;
    }

    function changeAccess($status,$email){
        $currentDate = date('Y-m-d H:i:s');
        $sql = "UPDATE usuarios SET acceso = '".$status."', fecha_acceso='".$currentDate."' WHERE email = '".$email."'";
        $result = $this->db_sql($sql);
        $this->putSessions();
        return $result;
    }

    function putSessions(){
        $this->emailSesion = $_SESSION["email"];
        $this->passSesion = $_SESSION["password"];
    }

    function db_sql($sql){
        $this->db_open();
        $result = $this->connect->query($sql);
        $this->db_close();
        return $result;
    }



    //Getters y Setters
    public function __get($name) {
        return $this->$name;
    }

}


//Clase para el envío de email
class email{
	//Realiza el envío de un email
	function enviar($paraquien, $asunto, $mensaje){
		$cabeceras =  'From: juanscales@gmail.com' . "\r\n";
   		$cabeceras .= 'Reply-To: juanscales@gmail.com' . "\r\n";
   		$cabeceras .= 'X-Mailer: PHP/' . phpversion();
 		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";
		//Funcion php para enviar un email: mail()
		mail($paraquien, $asunto, $mensaje, $cabeceras);
	}
}


?>