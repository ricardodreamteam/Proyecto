<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/registerSTL.css">
  <link rel="icon" href="/img/iconoventana.png"> <!--Logo pestaña de ventana-->
  <title>Registro</title>
</head>

<body>

<form method="post">
    <section class="h-100 h-custom ">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 text-colorD">
          <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="p-5">
                      <h3 class="fw-normal mb-5">Información de usuario</h3>



                      <div class="row">
                        <div class="col-md-6 mb-4 pb-2">

                          <div class="form-outline">
                            <input type="text" name="nombre" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplev2">Nombre</label>
                          </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                          <div class="form-outline">
                            <input type="text" name="apellidos" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplev3">Apellidos</label>
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-4 pb-2 pb-md-0">

                          <div class="form-outline">
                            <input type="text" name="alias" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplev5">Alias</label>
                          </div>

                        </div>
                        <div class="col-md-6">

                          <div id="datepicker" class="input-group date " data-date-format="mm-dd-yyyy">
                            <input class="form-control fecha" type="text" readonly />
                            <span class="input-group-addon">
                              <i class="glyphicon glyphicon-calendar"></i>
                            </span>
                          </div>
                          <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
                          </script>
                          <script>
                            $(function() {
                              $("#datepicker").datepicker({
                                autoclose: true,
                                todayHighlight: true,
                              }).datepicker('update', new Date());
                            });
                          </script>
                          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                          </script>
                          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                          </script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
                          </script>

                        </div>
                      </div>

                      <div class="mb-4 pb-2">
                        <select  name="genero" class="form-select">
                          <option value="genero">Genero</option>
                          <option value="hombre">Hombre</option>
                          <option value="mujer">Mujer</option>
                          <option value="helicoptero apache de combate">Helicóptero Apache de combate</option>
                        </select>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-outline">
                          <input type="text" name="password" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Examplev4">Contraseña</label>
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="form-outline">
                          <input type="text" name="repeatPassword" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Examplev4">Repite la contraseña</label>
                        </div>
                      </div>
                      


                    </div>
                  </div>
                  <div class="col-lg-6 bg-indigo text-colorD">
                    <div class="p-5">
                      <h3 class="fw-normal mb-5">Detalles de contacto</h3>

                      <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                          <input type="text" name="direccion" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Examplea2">Domicilio</label>
                        </div>
                      </div>



                      <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="text" name="codigo_postal" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea4">Codigo Postal</label>
                          </div>

                        </div>
                        <div class="col-md-7 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="text" name="numero_telefono" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea5">Numero de telefono</label>
                          </div>

                        </div>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                          <input type="text" name="dni" class="form-control form-control-lg"/>
                          <label class="form-label" for="form3Examplea6">DNI</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="text" name="provincia" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea7">Provincia</label>
                          </div>

                        </div>
                        <div class="col-md-7 mb-4 pb-2">

                          <div class="form-outline form-white">
                            <input type="text" name="localidad" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea8">Localidad</label>
                          </div>

                        </div>
                      </div>

                      <div class="mb-4">
                        <div class="form-outline form-white">
                          <input type="text" name="email" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Examplea9">Email</label>
                        </div>
                      </div>

                      <div class="form-check d-flex justify-content-start mb-4 pb-3">
                        <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" />
                        <label class="form-check-label " style="color:#4850A8;" for="form2Example3">
                          Acepto <a href="#!" class="text-colorD"><u>los terminos y condiciones</u></a> de FrostGames

                        </label>
                      </div>

                      <button name="btn1" id="btn1" type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Registrarme</button>

                      <a href="Index.html"><button name="btn2" id="btn2" type="button" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Volver a Inicio</button></a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</form>

  <?php
  include("adduser.php")
  ?>

</body>

</html>