<?php
if (isset($_SESSION['localidadPerfil'])) {
  echo"<script language='javascript'>
  location.href='profileInfo.php';
  </script>
  ";
}else {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/iconoventana.png"> <!--Logo pestaña de ventana-->
  <link rel="stylesheet" href="/css/loginSTL.css">
  <title>Acceso</title>
</head>

<body>
<?php include("logCheck.php");?>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <a href="http://proyectofrostgames.batcave.net/Index.html"><img src="/img/logo-prototipo.png" class="img-fluid" alt="Sample image" ></a>
          <h2 style="color:white;">Pulse en el Icono de Frostgames para volver al Inicio</h2>
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="login.php">
            <h2>Iniciar Sesión</h2><br>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="nom">Nombre de usuario</label>
              <input type="nombre" id="nombre" name="nombre" class="form-control form-control-lg"
              placeholder="Introduce un nombre de usuario válido" required>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="cont">Contraseña</label>
              <input type="password"  name="password" id="password" class="form-control form-control-lg"
                placeholder="Introduce tu contraseña"required>
                <input type="checkbox" onclick="passmostrar()">Mostrar contraseña
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Recuerdame
                </label>
              </div>
              <a href="#!" class="text-white text-decoration-none">¿Has olvidado tu contraseña?</a>
            </div>

             <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-lg botonLog" name="logbtn" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes cuenta?<a href="register.php"
                  class="link-danger">Registrate</a></p>
            </div>
            

          </form>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 botBanner">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">Copyright © 2023. All rights reserved.</div>
      <!-- Copyright -->

      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>
</body>

</html>
<script type="text/javascript">
  function passmostrar() {
    const contra = document.getElementById("password");
    if(contra.type === "password"){
      contra.type = "text";
    }else{
      contra.type = "password";
    }
    
}
</script>