<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login | Ingreso</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.css" rel="stylesheet">

</head>

<body id="page-top" style="padding:0px; overflow:hidden">
<!-- <a class="navbar-brand js-scroll-trigger logoLogin" href="#page-top">
      <span class="d-block d-lg-none">Challenge Overcome</span>
      <span class="d-none d-lg-block">
        <img class="position:fixed; top: 0; left:0; right:0; bottom:0" src="img/inicio.jpg" alt="">
        <h2>Equipo 8</h2>
      </span>
</a> -->

<div class="loginBg"></div>

<?php
      if (isset($_GET["Error"]) && $_GET["Error"]== "1") {
?>

<div class="alert alert-danger"> No existe un usuario registrado, registrate o revisa la información ingresada</div>

<?php
	}
?>

<?php
      if (isset($_GET["NewPass"]) && $_GET["NewPass"]== "1") {
?>

<div class="alert alert-success"> Contraseña Reestablecida Correctamente</div>

<?php
	}
?>

<?php
      if (isset($_GET["NewPass"]) && $_GET["NewPass"]== "0") {
?>

<div class="alert alert-danger"> La Contraseña no fue reestablecida, por favor verifique sus datos</div>

<?php
	}
?>

<?php
if (isset($_GET["Error"]) && $_GET["Error"]== "2") {
    ?>

    <div class="alert alert-danger"> Problablemente estes inactivo o debas <a href="?exito=3"> recuperar la contraseña </a></div>

    <?php
}
?>

<?php
if (isset($_GET["exito"]) && $_GET["exito"]== "3") {
    ?>

    <div class="alert alert-success">  La contraseña ha sido enviada al correo electrónico registrado. </div>

    <?php
}
?>

<?php
      if (isset($_GET["exito"]) && $_GET["exito"] == "1") {
?>

<div class="alert alert-success"> Usuario Creado Stisfactoriamente, Muchas gracias por visitarnos ahora puedes ingresar con tu usuario y contraseña, bienvenido</div>

<?php
	}
?>

<?php
if (isset($_GET["exito"]) && $_GET["exito"] == "0") {
    ?>

    <div class="alert alert-danger"> Registro no exitoso</div>

    <?php
}
?>
		
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">INGRESAR</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Registro</label>
		
		<div class="login-form">
			<form method="post" action="php/recibeLogin.php" class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input value="<?php echo isset($_COOKIE['recordar_usuario'])?$_COOKIE["recordar_usuario"]:"" ?>" id="user" name="Email" type="email" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Contraseña</label>
					<input id="pass" name="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label "><input type="checkbox" name="recordar_email"> Recordar Usuario</label>
				</div>
				<div class="group">
					
					<input type="submit" class="button" name="ingresar" value="Ingresar">
					<br>
					<input type="submit" class="button olvidar" name="olvidar" value="Reestrablecer mi Contraseña">
				</div>
				<div class="hr"></div>
            </form>
			<div class="for-pwd-htm">
				<form method="post" action="php/registrousuario.php">
					<div class =group><label for="user" class="label">Email</label>
					<input id="user" type="email" class="input" name="email" required></div>

					<div class =group><label for="Password " class="label">Contraseña</label>
					<input id="Password" type="password" class="input" name="password" required></div>

					<div class =group><label for="Primer_Nombre" class="label">Primer Nombre</label>
					<input id="Primer_Nombre" type="text" class="input" name="nombre1" required></div>

					<div class =group><label for="Segundo_Nombre" class="label">Segundo Nombre</label>
					<input id="Segundo_Nombre" type="text" class="input" name="nombre2" ></div>

					<div class =group><label for="Primer_Apellido" class="label">Primer Apellido</label>
					<input id="Primer_Apellido" type="text" class="input" name="apellido1" required></div>

					>
					<div class =group><label for="Segundo_Apellido" class="label">Segundo Apellido</label>
					<input id="Segundo_Apellido" type="text" class="input" name="apellido2" required></div>
				
				<div class="group">
					<input type="submit" class="button" value="Registrarse">
				</div>
				</form>
				<div class="hr"></div>
			</div>
		</div>
	</div>
</div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>