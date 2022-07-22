<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pagina principal</title>
  <!-- Bootstrap CSS -->
  <link href="<?= base_url ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="<?= base_url ?>assets/bootstrap/js/bootstrap.js"></script>


</head>

<body>
  <nav class=".container-xxl navbar navbar-expand-lg  justify-content-end  bg-primary">
    <ul class="nav  justify-content-end  ">
      <!-- En caso de que no estes identificado  muestrame esto-->
      <?php if (!isset($_SESSION['Identificado'])) : ?>
        <li> <a class="navbar-brand nav-link active flex-end text-white" href="<?= base_url ?>Usuarios/index">Login</a></li>
        <!--recorreme y sacame la categorias del-->
        <li> <a class="navbar-brand nav-link active flex-end text-white " href="<?= base_url ?>Usuarios/registro">Registrar</a></li>
      <?php else : ?>
        <!-- si esta identificado muestrame esto -->
        <li><a class="navbar-brand nav-link active flex-end text-white" href="<?= base_url ?>Usuarios/cerrar_sesion">Cerrar sesion</a></li>
      <?php endif; ?>

  </ul>
  </nav>
  <div class=".container-fluid">