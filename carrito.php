<?php

include('addCarro.php');

session_start();
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/index.css" />
  <script src="jquery.js"></script>
  <script>
    $(function() {
      $("#navbar").load("navbar.html");
    });
  </script>
  <title>FrostGames</title>
  <title>Carrito</title>
</head>

<body>
  <!-- NAVBAR -->
  <header>
    <?php include 'navbar.html'; ?>
  </header>
  <!-- NAVBAR -->
  <!-- BANNER Y LOGO -->
  <div class="row posicion imagen content-fluid">
    <div class="col-sm 12 col-md-2 col-xl-3 logo">
      <img src="img/logonavbar.png" alt="" width="300px" height="300px" />
    </div>
    <div class="col-sm 12 col-md-2 col-xl-6">
      <img class="letras" src="img/text-1671194747529-removebg-preview.png" alt="" />
    </div>
    <div class="col-sm 12 col-md-2 col-xl-3">&nbsp;</div>
  </div>
  <!-- BANNER Y LOGO -->
  <!--CONTENIDO CARRITO-->
  <section class="contenido">
    <div class="row mt-5">
      <div class="col-xl-3"></div>
      <div class="col-xl-6">
        <!--Tabla-->
        <table class="table" id="tablaComp">
          <!--Fila Componentes-->
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Unidad</th>
              <th scope="col">Precio</th>
              <th scope="col">Eliminar Producto</th>
            </tr>
          </thead>
          <tbody id="bodyTabla">
            <!--Fila Componentes-->
            <!--Fila 1ºProducto-->
            <?php

            $indice=0;
            $total;
            $juegoComp = new Juego();
            
            if (isset($_SESSION['carrito'])) {

              for ($i = 0; $i < sizeof($_SESSION['carrito']); $i++) {

                $juegoComp = unserialize($_SESSION['carrito'][$i]);
                
                
                



                if (sizeof($_SESSION['carrito'])>1  && isset($juegoComp->titulo)) {
                  
                  $indice++;

                  echo '
              
                <tr id="row' . $indice . '">
                <th scope="row">' . $indice . '</th>
                <td>' . $juegoComp->getTitulo() . '</td>
                <td>
                  <button id="menosUnidad' . $indice . '" class="btn d-inline-block btnCarro" onclick="restar' . $indice . '()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash"
                    viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                  </svg>
                  </button>
                <div id="unidades' . $indice . '" class="d-inline-block">1</div>
                <button id="masUnidad' . $indice . '" class="btn d-inline-block pt-1 btnCarro" onclick="sumar' . $indice . '()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus"
                    viewBox="0 0 16 16">
                    <path
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                  </svg>
                </button>

                </td>

                <td>
                <div  class="d-inline-block"><precio id="precio' . $indice . '">' . $juegoComp->getPrecio() . ' </precio></div><span class="d-inline-block">€</span>
                </td>
                <script>
             
                var cantidad' . $indice . ' = document.getElementById("unidades' . $indice . '").innerHTML;
                var precio' . $indice . ' = document.getElementById("precio' . $indice . '").innerHTML;

                

                function actualizaPrecio' . $indice . '(numero) {
                  document.getElementById("precio' . $indice . '").innerHTML = (numero * precio' . $indice . ').toFixed(2);
                  totalizar();
                }
                function sumar' . $indice . '() {
                  cantidad' . $indice . '++;
                  actualizaPrecio' . $indice . '(cantidad' . $indice . ');
                  
                  document.getElementById("unidades' . $indice . '").innerHTML = cantidad' . $indice . ';
                  
                }
                function restar' . $indice . '() {
                  if (cantidad' . $indice . ' == 1) {
                    cantidad' . $indice . ' = 1;
                  } else {
                    cantidad' . $indice . '--;
                    actualizaPrecio' . $indice . '(cantidad' . $indice . ');
                  }

                  document.getElementById("unidades' . $indice . '").innerHTML = cantidad' . $indice . ';
                }

                </script>
                <td><button type = "button" class="btn" onclick="eliminaItem' . $indice . '()">Eliminar Juego</button></td>
              
                <script>
                function eliminaItem' . $indice . '() {
                  var fila = document.getElementById("row' . $indice . '");
                  fila.remove(); 
                  totalizar();
                  borrarItem' . $indice . '();

                }
                
                </script>
                </tr>';
                }
              }
            } else {
              echo 'va a ser que no';
            }


            ?>
            <tr>

              <td></td>
              <td></td>
              <td>Total:</td>
              <td>
                <div id="total" class="d-inline-block"></div> <span class="d-inline-block">€</span>
              </td>
              <td><button type="button" onclick="vaciarCarro()" class="btn"> vaciar</button></td>
            </tr>
          </tbody>

          <script>
            function totalizar() {
              var table = document.getElementById("bodyTabla");
              var columnIndex = 3; // Index de la columna que quieres sumar
              var sum = 0;

              for (var i = 1; i < table.rows.length; i++) {
                var nombre = "precio" + i.toString();

                sum += parseFloat(document.getElementById(nombre).innerHTML);
              }

              document.getElementById("total").innerHTML = sum.toFixed(2);
            }
            totalizar();

            function vaciarCarro() {
              document.getElementById("tablaComp").innerHTML = "Carrito vacio";
              <?php
              for($i = 0; $i < sizeof($_SESSION['carrito']); $i++){
                unset($_SESSION['carrito'][$i]);
                unset($arrayAnadidos[$i]);

            }
              ?>
            }
          </script>
        </table>



        <!--FIN Tabla-->
      </div>

      <div class="col-xl-3"></div>
    </div>
  </section>

</body>

</html>