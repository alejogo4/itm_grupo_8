<?php
    require('db/clases.php');
    
    require('model/Usuario.php');
    $db=new db();
    $seguridad = new seguridad();

    $seguridad->inactividad();
    $result=$db->seleccionar_perfiles();
    $equipo=$db->seleccionar_equipos();
    $user;
    if($_SESSION["email"] != null && $_SESSION["password"] != null){
       
        $email = $_SESSION["email"];
        $db->changeAccess(1,$email);
        $login = $db->seleccionar_registro();
        $data_user = $login->fetch_all()[0];
        $user = new usuario($data_user[2],$data_user[3],$data_user[4],$data_user[5],$data_user[6]);

    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Challenge Overcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.css" rel="stylesheet">
</head>

<body id="page-top">
<div class="contador">
    <p>Cantidad de visitas : <?php echo $seguridad->cookies_visitas();?></p>
</div>
<!-- Modal  Contacto -->
<div class="modal fade" id="mContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mi Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <table class="table" width="100%">
                <thead>
                    <th>ID</th>
                    <th>Asunto</th>
                    <th>Fecha</th>
                    <th></th>
                </thead>
            <?php
                
                $ContactoResult= $db->seleccionar_contacto();
                while ($row = $ContactoResult->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["contacto_id"];?></td>
                    <td><?php echo $row["asunto"];?></td>
                    <td><?php echo $row["fecha"];?></td>
                    <td>
                        <button class="btn btn-info" method="get" data-toggle="modal" data-target="#mcontacto">Ver Mas</button>
                    </td>
                </tr>
            <?php
            }
            
            ?>
            </table>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
</div>

<!-- Modal  Contacto -->
 <?php 
    
    if (isset($_SESSION["recordar"]) && $_SESSION["recordar"]=="1"){ 
    ?>
<div style="margin-top:150px;" class="modal fade" id="recordar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cambiar contraseña</h5>
                <button type="button" class="close closerecordar" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Recuerde cambiar la contraseña desde las opciones del usaurio "Mis datos"</p>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
</div>

<?php
    }
?> 

<!-- Modal  reporte -->
<div class="modal fade " id="mReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reporte de administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <table class="table" width="100%">
                <thead>
                    <th>Nombre Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acceso</th>
                    <th>Fecha_acceso</th>
                    <th>Acción</th>
                </thead>
            <?php
                
                $ContactoResult= $db->seleccionar_registros();
                while ($row = $ContactoResult->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["nombre1"]." ".$row["apellido1"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $seguridad->logueo_autorizado($row["rol"]);?></td>
                    <td>
                    <?php echo ($row["estado"] == 1)? 'Activo': 'Inactivo';?>
                    </td>
                    <td>
                    <?php echo ($row["acceso"] == 1)? 'Logueado': 'No Logueado';?>
                    </td>
                    <td>
                        <?php echo $row["fecha_acceso"];?>
                    </td>
                    <td>
                        <?php echo '<btn class="btn btn-success" onclick="traerDatos('."'".$row["email"]."'".')" data-toggle="modal" data-target="#acceso">editar</button> '; ?>
                    </td>
                </tr>
            <?php
            }
            
            ?>
            </table>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
</div>

<!--
    Modal Cambiar acceso
-->
<div class="modal fade" id="acceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mi Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table" width="100%">
                <thead>
                    <th>Nombre Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acceso</th>
                    <th>Fecha_acceso</th>
                    <th>Acción</th>
                </thead>
                <tbody class="data_user">
                </tbody>
            </table>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<!-- Modal  Mi perfil-->
<div class="modal fade" id="mPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mi Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#datos">Mis datos</a></li>
                    <li><a data-toggle="tab" href="#password">Cambiar contraseña</a></li>
                    <li><a data-toggle="tab" href="#addInfo"> Añadir información</a></li>

                </ul>
                <div class="tab-content">
                    <div id="datos" class="tab-pane fade in active">
                        <h3 class="mt-4 mb-4">Datos del perfil</h3>
                        <?php
                            $registroResult= $db->seleccionar_registro();
                            while ($row = $registroResult->fetch_assoc()) {
                                ?>

                                <p>Email : <?php echo $row["email"];?></p>
                                <p>Primer Nombre : <?php echo $row["nombre1"];?></p>
                                <p>Segundo Nombre : <?php echo $row["nombre2"];?></p>
                                <p>Primer Apellido : <?php echo $row["apellido1"];?></p>
                                <p>Segundo Apellido : <?php echo $row["apellido2"];?></p>
                                <p>Fecha Registro : <?php echo $row["fecha_registro"];?></p>
                                <p>Estado : <?php echo $row["estado"];?></p>
                                <?php


                            }
                        ?>
                    </div>
                    <div id="password" class="tab-pane fade">
                        <h3 class="mt-4 mb-4">Cambiar Contraseña</h3>
                        <form method="post" action="php/changePassword.php" class="pb-4">
                            <div class="form-group">
                                <label for="currentPassword">Contraseña Actual</label>
                                <input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Ingresar contraseña actual">

                            </div>
                            <div class="form-group">
                                <label for="newPassword">Contraseña Nueva</label>
                                <input type="password" name="newPassword" class="form-control" id="newPassword"  placeholder="Ingresar contraseña nueva">

                            </div>

                            <button type="submit" class="btn btn-primary">Cambiar</button>
                        </form>
                    </div>
                    <div id="addInfo" class="tab-pane fade">
                        <h3 class="mt-4 mb-4">Datos adicionales</h3>

                        <form method="post" action="php/addInfo.php" class="pb-4">
                            
                            <div class="form-group">
                                <label for="age">Edad</label>
                                <input type="number" name="age" class="form-control" id="age" placeholder="Ingresar edad">

                            </div>
                            <div class="form-group">

                                <select class="form-control" name="gender">
                                    <option value="" selected disabled>Seleccionar el genero</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job">Ocupacion</label>
                                <input type="text" name="job" class="form-control" id="job" placeholder="Ingresar Ocuación">

                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>

                </div>
            </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mcontacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Contacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <?php
                    $registroResult= $db->seleccionar_contacto();
                    while ($row = $registroResult->fetch_assoc()) {
                        ?>

                        <p>ID : <?php echo $row["contacto_id"];?></p>
                        <p>Asunto : <?php echo $row["asunto"];?></p>
                        <p>Fecha : <?php echo $row["fecha"];?></p>
                        <p>Mensaje : <?php echo $row["mensaje"];?></p>
                        <?php


                    }
                ?>
            </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<?php
      if (isset($_GET["exito"]) && $_GET["exito"]==1) {
?>
<div class="alert alert-success alert-success alert-dismissible fade show">

    Gracias por su  mensaje, este ha sido guardado correctamente, pronto lo atenderemos
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
	}
?>

<?php
if (isset($_GET["pass"]) && $_GET["pass"]==1) {
    ?>
    <div class="alert alert-success alert-success alert-dismissible fade show">

        Contraseña actualizada con exito, <a href="login.php">Inicia sesión Nuevamente.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>

<?php
if (isset($_GET["pass"]) && $_GET["pass"]==0) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show">

        Error intentando cambiar la contraseña.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>

<?php
if (isset($_GET["info"]) && $_GET["info"]==1) {
    ?>
    <div class="alert alert-success alert-success alert-dismissible fade show">

        Informacion actualizada con exito
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>

<?php
if (isset($_GET["info"]) && $_GET["info"]==0) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show">

        Error intentando actualizar los datos
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>

<?php
if (isset($_GET["exito"]) && $_GET["exito"]==2) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Gracias!</h4>
        <p>Prontamente tendras una respuesta, nos haz enviado los siguientes datos : </p>
        <hr>
        <p class="mb-0">Primer Nombre : <?php echo $_GET["nombre1"];?></p>
        <p class="mb-0">Segundo Nombre : <?php echo $_GET["nombre2"];?></p>
        <p class="mb-0">Primer Apellido : <?php echo $_GET["apellido1"];?></p>
        <p class="mb-0">Segundo Apellido : <?php echo $_GET["apellido2"];?></p>
        <p class="mb-0">Ciudad : <?php echo $_GET["ciudad"];?></p>
        <p class="mb-0">Asunto : <?php echo $_GET["asunto"];?></p>
        <p class="mb-0">Mensaje : <?php echo $_GET["mensaje"];?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Challenge Overcome</span>
            <span class="d-none d-lg-block">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/logo.svg" alt="">
                <h2>Equipo 8</h2>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?php

                        if($seguridad->logueo_autorizado($user->rol) == 'usuario_comun' ||
                        $seguridad->logueo_autorizado($user->rol) == 'administrador'){
                        ?>
                       
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi Cuenta <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#mPerfil">
                                        Mi Perfil
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#mContacto">
                                        Mis Contactos
                                    </button>
                                </li>


                            </ul>
                        </li>
                        

                        <?php

                    }

                    if($seguridad->logueo_autorizado($user->rol) == 'administrador'){
                ?>

                <li class="nav-item">
                    <a type="button" class="reporte" data-toggle="modal" data-target="#mReporte" href="#inicio">Reporte Usuarios</a>
                    
                </li>
                <?php
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#team">Sobre nosotros</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a>
                </li>
                <?php if(!$db->check_login()){ ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="login.php">Registro</a>
                </li>
                <?php } ?>
                <?php if($seguridad->logueo_autorizado($user->rol) == 'usuario_comun' ||
                        $seguridad->logueo_autorizado($user->rol) == 'administrador'){ ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="php/cerrarSesion.php">Salir</a>
                </li>
                <hr>
                
                    <li><?php echo strtoupper($user->nombre1. " ".$user->nombre2); ?></li>
                <?php 
                    
                }
                ?>
                    
            </ul>
        </div>
    </nav>

    
    <div class="container-fluid p-0">

        <section class="inicio" id="inicio">
            <div class="text">
                <h3>¡Hola, bienvenido! <?php echo strtoupper($user->nombre1." ".$user->nombre2);?></h3>
                <p>Somos un equipo de profesionales apasionados por las tecnologías, nos gusta divertirnos y enfrentar de la mejor manera cada reto.</p>
            </div>
            <img src="./img/inicio.jpg" class="inicio">
        </section>

        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="team">
            <?php
                while ($row = $equipo->fetch_assoc()) {
                    ?>
                    <div class="w-100">
                        <h1 class="mb-0"><?php echo $row['nombre']?>

                        </h1>
                        <div class="subheading mb-5">equipo multidisciplinario de trabajo colaborativo.</div>
                        <p class="lead mb-5"><?php echo $row['perfil']?></p>
                        <div class="social-icons">
                            <a href="#">
                                <i class="fab fa-adobe"></i>
                                <h4><?php echo $db->sacarporcentaje($row['habilidad01']); ?>%</h4>
                            </a>
                            <a href="#">
                                <i class="fas fa-code"></i>
                                <h4><?php echo $db->sacarporcentaje($row['habilidad02']); ?>%</h4>
                            </a>
                            <a href="#">
                                <i class="fas fa-database"></i>
                                <h4><?php echo $db->sacarporcentaje($row['habilidad03']); ?>%</h4>
                            </a>
                            <a href="#">
                                <i class="fas fa-globe"></i>
                                <h4><?php echo $db->sacarporcentaje($row['habilidad04']); ?>%</h4>
                            </a>
                            <a href="#">
                                <i class="fas fa-sitemap"></i>
                                <h4>1<?php echo $db->sacarporcentaje($row['habilidad05']); ?>%</h4>
                            </a>
                        </div>
                        <br>
                        <div class="team"></div>
                    </div>
                    <?php
                     }
                    ?>
        </section>
        
        <hr class="m-0">

        <?php
            while ($row = $result->fetch_assoc()) {                
        ?>
        <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="Id<?php echo $row['idn']?>">
            <div class="w-100">
                <h2 class="mb-5 text-primary namePerson"><?php echo $row["nombres"].' '.$row["apellidos"]?></h2>

                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <h3 class="mb-0">perfil profesional y personal</h3>
                        <div class="subheading mb-3">¿quién soy?</div>
                        <p><?php echo $row["perfil"]?></p>
                    </div>
                </div>

                <div class="resume-item mb-5">
                    <div class="resume-content">
                        <h3 class="mb-0">Habilidades</h3><br>
                        <div class="skill">
                            <div class="skillItem">
                                <h4><?php echo $row["habilidad01"]?></h4>
                            </div>
                            <div class="porcentContainer">
                            <div class="porcent porcent-<?php echo $db->sacarporcentaje($row['habilidad01']); ?>"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skillItem">
                                <h4><?php echo $row["habilidad02"]?></h4>
                            </div>
                            <div class="porcentContainer">
                            <div class="porcent porcent-<?php echo $db->sacarporcentaje($row['habilidad02']); ?>"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skillItem">
                                <h4><?php echo $row["habilidad03"]?></h4>
                            </div>
                            <div class="porcentContainer">
                                <div class="porcent porcent-<?php echo $db->sacarporcentaje($row['habilidad03']); ?>"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skillItem">
                                <h4><?php echo $row["habilidad04"]?></h4>
                            </div>
                            <div class="porcentContainer">
                            <div class="porcent porcent-<?php echo $db->sacarporcentaje($row['habilidad04']); ?>"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skillItem">
                                <h4><?php echo $row["habilidad05"]?></h4>
                            </div>
                            <div class="porcentContainer">
                            <div class="porcent porcent-<?php echo $db->sacarporcentaje($row['habilidad05']); ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <hr class="m-0">
            <?php
            }
            ?>

        <hr class="m-0">

        <section class="desarrollo resume-section p-3 p-lg-5 d-flex justify-content-center" id="servicios">

            <div class="w-100">
                <h2 class="mb-0">Nuestros
                    <span class="text-primary">Servicios</span>
                </h2>
                <span class="subheading mb-5">Tienes a tu disposición todo nuestro talento y conocimientos.</span>
                <br><br><br><br><br>

                <h2 class="mb-5 text-primary namePerson desarrolloWeb">Desarrollo web</h2>

                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p>Concepto claro + Diseño atractivo + Desarrollo preciso = ¡Página web asombrosa! Para esto, nos apoyamos en metodologías ágiles como Kanban, Scrum, conversión en mente, y otros. Prototipados, front end, back end, testeo de calidad.
                            Un apoyo para ti, y tu equipo, utilizando la mejor y más actual tecnología.</p>
                    </div>
                </div>

                <hr><br><br>

                <h2 class="mb-5 text-primary namePerson apps">Desarrollo de aplicaciones</h2>

                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p>Más de 15.900 horas de desarrollo...y contando. iOS, Android, API’s, cloud backend… Nómbralo, y ¡lo hacemos!</p>
                    </div>
                </div>

                <hr><br><br>

                <h2 class="mb-5 text-primary namePerson consultoria">Consultoría</h2>

                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p>Concepto claro + Diseño atractivo + Desarrollo preciso = ¡Página web asombrosa! Para esto, nos apoyamos en metodologías ágiles como Kanban, Scrum, conversión en mente, y otros. </p>
                    </div>
                </div>

            </div>

        </section>

        <hr>

        <section class="desarrollo resume-section p-3 p-lg-5 d-flex justify-content-center" id="contacto">

            <div class="w-100">
                <h2 class="mb-0">Ponte en
                    <span class="text-primary">contacto</span>
                </h2>
                <span class="subheading mb-5">contáctanos, hablemos de tus proyectos.</span>


                <div class="login-wrap">
                    <div class="login-html">
                        <div class="login-form">
                            <form method="post" action="php/ingresocontacto.php">
                                
                                <div class="group">
                                    <label for="email" class="label">Email</label>
                                    <input id="email" value="<?php echo $db->emailSesion ?>" name="email" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="nombre1" class="label">Primer Nombre</label>
                                    <input id="nombre1" name="nombre1" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="nombre2" class="label">Segundo Nombre </label>
                                    <input id="nombre2" name="nombre2" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="apellido1" class="label">Primer Apellido</label>
                                    <input id="apellido1" name="apellido1" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="apellido2" class="label">Segundo Apellido </label>
                                    <input id="apellido2" name="apellido2" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="ciudad" class="label">Ciudad</label>
                                    <input id="ciudad" name="ciudad" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="asunto" class="label">Asunto</label>
                                    <input id="asunto" name="asunto" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="message" class="label">Mensaje</label>
                                    <textarea name="mensaje" id="message" cols="30" rows="7" class="input"></textarea>
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Enviar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
      
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.js"></script>

    <script src="js/sweetalert.js"></script>

    <!--<script>Swal.fire('Oops...', 'Something went wrong!', 'success')</script>
    <script>Swal.fire('Oops...', 'Something went wrong!', 'error')</script>  -->       
</body>

</html>