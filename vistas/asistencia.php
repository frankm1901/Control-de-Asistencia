<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CC | Admin</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../admin/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../admin/public/css/blue.css">
    <link rel="shortcut icon" href="../admin/public/img/favicon.ico">
    <link rel="stylesheet" href="../admin/public/css/style.css">
  </head>
<body class="hold-transition lockscreen">

<!--Centrado automatico de Elementos -->

<div class="lockscreen-wrapper">    
  <!-- Div para la Insersion del Logo -->
  
  <img class = "image" src="../admin/files/negocio/img-logo.png" alt="Membrete Sistema Regional de Salud" ><br>      
  
  <!-- User name -->
  <div class="lockscreen-name">CONTROL DE ASISTENCIA</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../admin/files/negocio/img-avatar.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form  action="" class="lockscreen-credentials" name="formulario" id="formulario" method="POST">
      <div class="input-group">
        <input type="password" class="form-control" name="codigo_persona" id="codigo_persona" placeholder="ID de asistencia">

        <div class="input-group-btn">
          <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials --> 
  </div>
  
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Ingresa tu ID de asistencia
  </div>
  <div class="text-center">
  </div>
  <div name="movimientos" id="movimientos">
    </div> 
  <div class="lockscreen-footer text-center">
    <a href="../admin/">Iniciar Sesión</a>
  </div>
  
</div>
<!-- /.center -->


    <!-- jQuery -->
    <script src="../admin/public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../admin/public/js/bootstrap.min.js"></script>
     <!-- Bootbox -->
    <script src="../admin/public/js/bootbox.min.js"></script>

    <script type="text/javascript" src="scripts/asistencia.js"></script>


  </body>
</html> 
