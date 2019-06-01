<?php
ini_set("date.timezone", "America/Bogota");
error_reporting(E_ERROR);
session_start();
//CAMBIAR LUEGO
require(dirname(__DIR__)."/db/seguridad.php");
require(dirname(__DIR__).'/db/email.php');
require(dirname(__DIR__).'/email_template/email_registro.php');
class db{
    
    private $connect;
    private $emailSesion;
    private $passSesion;


    function db_open(){
        //
        $this->connect = new mysqli("localhost","root","","website201901");
        $this->connect->set_charset("utf8");
        //pass:website201901.db.6317658.ff0.hostedresource.net website201901 Margin2018! website201901
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

    function db_ingresar($Email,$password, $home=false,$recordar=false){
        $seguridad = new seguridad();
        $seguridad->logueo_sesiones($Email,$password);

        
        if($recordar){
          
             $seguridad->cookies_logueo($Email);
        }
        if($home){
            header("Location: ../index.php"); //Borrar get variables
        }
        
    }

    function check_user($Email,$Password, $complete){
        
        $sql = "";
        if($complete){
            //$password_hash = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM usuarios WHERE Email='".$Email."' AND Password='".$Password."' AND estado=1";
        }else{
            $sql = "SELECT * FROM usuarios WHERE Email='".$Email."'";
        }
        
        $result = $this->db_sql($sql);
        $row_cnt = $result->num_rows;
        return $row_cnt;
    }


    

    function registro_user($email,$password,$nombre1,$nombre2,$apellido1,$apellido2){
        $currentDate = date('Y-m-d H:i:s');
        //$password_hash = password_hash($password, PASSWORD_DEFAULT);
        if($this->check_user($email,$password,false) > 0){
            return false;
        }else{

            
            
            $email_registro = new email_registro();
            $mensaje = $email_registro->template($nombre1,$nombre2,$apellido1,$apellido2,$email);
            
            $email = new email();
            $email->enviar('alejogo49@gmail.com',$email,'Registro Exitoso | Bienvenida', $mensaje);
            
            $sql = "INSERT INTO usuarios (nombre1,nombre2,apellido1,apellido2,password,email,fecha_registro,rol)
        VALUES ('$nombre1' ,'$nombre2','$apellido1','$apellido2','$password','$email','$currentDate',1)";

           

            $result = $this->db_sql($sql);
            return $result;

            
        }

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

    function seleccionar_registros(){
        $sql = "SELECT * FROM usuarios";
        $result = $this->db_sql($sql);
        return $result;
    }

    function changePassword($currentPassword,$newPassword){
        $_SESSION["olvidar"]="0";
        $this->putSessions();
        if($this->check_user($this->emailSesion,$currentPassword,true) > 0){
            $sql = "UPDATE usuarios SET password = '".$newPassword."' WHERE email = '".$this->emailSesion."'";
            $result = $this->db_sql($sql);
            return true;
        }else{
            return false;
        }
    }

    function ReestablecerContrasena($Email){
        $seguridad = new seguridad();
        
        $passAleatoria = $seguridad->pass_aleatorio();
        if($this->check_user($Email,"",false) > 0){
            $sql = "UPDATE usuarios SET password = '".$passAleatoria."'  WHERE email = '".$Email."'";
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
        $this->db_open();
        $currentDate = date('Y-m-d H:i:s');
        $sql = "UPDATE usuarios SET acceso='$status', fecha_acceso='".$currentDate."' WHERE email = '".$email."'";
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


?>