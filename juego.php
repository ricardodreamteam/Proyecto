<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/juegoSTL.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        $(function() {
            $("#navbar").load("navbar.html");
        });
    </script>
    <title>Juego</title>
</head>
<header>
    <?php include 'navbar.html'; ?>
</header>
<script>
   

    // Get the <span> element that closes the modal
   

    // When the user clicks the button, open the modal 
    function abrirModal(texto) {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        document.getElementById('texto').innerHTML = texto;

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
        modal.style.display = "none";
        location.href('login.php');
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            location.href('login.php');
        }
    }
    }

    // When the user clicks on <span> (x), close the modal
    

    // When the user clicks anywhere outside of the modal, close it
    
    }

    function popUp() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
        popup.innerHTML = "Juego añadido al carro";
    }




    function addToCart(queryString) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "addCarro.php?" + queryString, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
                switch (xhr.responseText) {
                    case "anadido":
                        console.log("anadido");
                        popUp();
                        break;
                    case "yaAnadido":
                        console.log("yaAnadido");
                        abrirModal("Este juego ya está en tu carrito de compra, para mas unidades modifique en el carro");
                        break;
                    case "sesion":
                        console.log("sesion");
                        abrirModal("Necesitas Iniciar Sesión");
                        break;


                    default:
                        break;
                }
            }
        };
        xhr.send();
        
    }

   /*  function buy(queryString) {
        var xhr1 = new XMLHttpRequest();
        xhr1.open("GET", "addCarro.php?" + queryString, true);
        xhr1.onreadystatechange = function() {
            if (xhr1.readyState === 4 && xhr1.status === 200) {
                
                switch (xhr1.responseText) {
                    case "anadido":
                        console.log("anadido");
                        popUp();
                        location.href('carrito.php');
                        break;
                    case "yaAnadido":
                        console.log("yaAnadido");
                        location.href('carrito.php');
                        break;
                    case "sesion":
                        console.log("sesion");
                        abrirModal("Necesitas Iniciar Sesión");
                        break;


                    default:
                        break;
                }
            }
        };
        xhr1.send();
        
    } */
</script>

<body>

    <?php
    include("connection.php");
    include("JuegoClass.php");


    /* if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
 */
    //error_reporting(0); //No me muestra errores.


    $id_juegos;
    $precio;
    $fecha_lanzamiento;
    $desarrolladora;
    $unidades_vendidas;
    $sinopsis;
    $trailer;
    $portada;



    $img1;
    $img2;

    $tags = [];

    //Requisitos minimos
    $soMin;
    $procesorMin;
    $ramMin;
    $graficsMin;
    $directxMin;
    $storageMin;

    //Requisitos recomendados
    $soRec;
    $procesorRec;
    $ramRec;
    $graficsRec;
    $directxRec;
    $storageRec;

    if (isset($_GET['titulo'])) {
        //Consulta a la tabla JUEGOS
        $nombre = $_GET['titulo'];
        $sqlJuego = "SELECT * FROM JUEGOS WHERE nombre = '$nombre' ";
        $result = mysqli_query($conn, $sqlJuego);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $id_juegos = $row['id_juegos'];
                $precio = $row['precio'];
                $fecha_lanzamiento = $row['fecha_lanzamiento'];
                $desarrolladora = $row['desarrolladora'];
                $unidades_vendidas = $row['unidades_vendidas'];
                $sinopsis = $row['sinopsis'];
                $trailer = $row['trailer'];
            }
        }
        //Consulta para las tags
        $sqlTags = "SELECT nombre FROM TAGS WHERE id_tags IN (SELECT id_tags FROM RELACION_TAGS WHERE id_juegos = '$id_juegos') ";
        $result2 = mysqli_query($conn, $sqlTags);
        if (mysqli_num_rows($result2) > 0) {

            while ($row = mysqli_fetch_assoc($result2)) {
                $tag = $row['nombre'];
                array_push($tags, $tag);
            }
        }
        //Consulta imagenes
        $sqlImg = "SELECT portada,img1,img2 FROM IMAGENES WHERE id_juegos = '$id_juegos' ";
        $result3 = mysqli_query($conn, $sqlImg);
        if (mysqli_num_rows($result3) > 0) {

            while ($row = mysqli_fetch_assoc($result3)) {
                $portada = $row['portada'];
                $img1 = $row['img1'];
                $img2 = $row['img2'];
            }
        }

        //CONSULTA REQUISITOS MINIMOS
        $sqlRecMin = "SELECT * FROM REQMIN WHERE id_juegos = '$id_juegos' ";
        $result4 = mysqli_query($conn, $sqlRecMin);
        if (mysqli_num_rows($result4) > 0) {

            while ($row = mysqli_fetch_assoc($result4)) {
                $soMin = $row['so'];
                $procesorMin = $row['procesador'];
                $ramMin = $row['memoria'];
                $graficsMin = $row['graficos'];
                $directxMin = $row['directx'];
                $storageMin = $row['almacenamiento'];
            }
        }
    }




    echo '
    
    <div class="container mt-6">


        <div class="row ">

            <div class="col-xl-1 p-0">&nbsp;</div>

            <div class="col-xl-10 mb-4 mt- p-2 cardJuego">

                <div class="row">

                    <div class="col-xl-7">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="carouselExampleIndicators" class="carousel slide carousel-fade"
                                    data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active   [interval]="0"">

                                            ' . $trailer . '
                                        </div>
                                        <div class="carousel-item">
                                            <img src="' . $img1 . '" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="' . $img2 . '" class="d-block w-100">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-xl-5">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <img src="' . $portada . '" class="d-block w-100 pe-2"
                                    style="height: 150px; object-fit: cover;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="fw-bold sinopsis" id="sinopsis">' . $sinopsis . '</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="info">DESARROLLADORA: <span id="desarrolladora" name="desarrolladora"
                                        class="innerInfo">' . $desarrolladora . '</span></p>
                                <p class=" info">FECHA LANZAMIENTO: <span id="f_lanzamiento" name="f_lanzamiento"
                                        class="innerInfo">' . $fecha_lanzamiento . '</span></p>
                                <p class=" info">TAGS: <span id="tags" name="tags" class="innerInfo">
                                <a class="text-decoration-none innerInfo tags" href="resbusqueda.php?categorias=' . $tags[0] . '">' . $tags[0] . '</a>,
                                <a class="text-decoration-none innerInfo tags" href="resbusqueda.php?categorias=' . $tags[1] . '">' . $tags[1] . '</a>,
                                <a class="text-decoration-none innerInfo tags" href="resbusqueda.php?categorias=' . $tags[2] . '">' . $tags[2] . '</a>,
                                <a class="text-decoration-none innerInfo tags" href="resbusqueda.php?categorias=' . $tags[3] . '">' . $tags[3] . '</a>,
                                <a class="text-decoration-none innerInfo tags" href="resbusqueda.php?categorias=' . $tags[4] . '">' . $tags[4] . '</a>
                                </span></p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-1 p-0">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-xl-1 ">&nbsp;</div>
            <div class="col-xl-11">
                <div class="row">
                    <div class="col-xl-1 p-0">&nbsp;</div>
                    <div class="col-xl-5 p-0">&nbsp;</div>
                    <div class="col-xl-1 p-0">&nbsp;</div>
                    <div class="col-xl-2 p-0">&nbsp;</div>
                    
                    <div class="col-xl-3 p-0">
                    <div class="popup ">
                    <span class="popuptext mt-3 ms-2 " id="myPopup"></span>
                    </div></div>
                </div>


            </div>
            


        </div>
        <div class="row">
            <div class="col-xl-1 p-0">&nbsp;</div>
            <div class="col-xl-10 cardJuego my-4 p-2">
                <div class="row">
                    <div class="col-xl-1 p-0">&nbsp;</div>
                    <div class="col-xl-5 d-flex justify-content-start nJuego pt-3">
                        <h4>Comprar: <span id="nombreJuego" name="nombreJuego">' . $nombre . '</span> </h4>
                    </div>
                    <div class="col-xl-1 p-0 d-flex justify-content-center nJuego pt-3">
                        <h4><span id="precioJuego" name="precioJuego">' . $precio . ' </span>€</h4>
                    </div>

                    <div class="col-xl-2">
                        <a class="btnShop enlace" onclick = "addToCart(\'titulo=' . $nombre . '&' . 'precio=' . $precio . '\')" href="carrito.php">
                            <span>
                                <span>
                                    <span>Comprar</span>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="col-xl-1 p-0">&nbsp;</div>
                        <div class="col-xl-2">
                    
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                            <span class="close">&times;</span>
                            <p id="texto">Some text in the Modal..</p>
                            </div>
                    
                        </div>

                        
                        <a class="btnShop enlace" id="anadir" onclick = "addToCart(\'titulo=' . $nombre . '&' . 'precio=' . $precio . '\')">
                            <span>
                                <span>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                      </svg></span>
                                </span>
                            </span>
                        </a>
                        
                    </div>
                    

                                        
                    
                </div>


            </div>
            <div class="col-xl-1">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-xl-1 p-0">&nbsp;</div>

            <div class="col-xl-10  my-4 p-2 cardJuego">
                
               

                <div class="row">
                    <div class="col-xl-1 p-0 ">&nbsp;</div>
                    <h4 class="nJuego ps-3 pb-0 mb-0">REQUISITOS DEL SISTEMA</h4>
                  
                    


                    <div class="col-xl-5 mt-3 ms-2 me-0 pe-0">
                        <hr class="nJuego ">
                        <h5 class="nJuego">Mínimos:</h5>
                        <div class="" id="reqMinimos">
                            <p class="info">SO: <span class="nJuego" name="so">' . $soMin . '</span></p>
                            <p class="info">Procesador: <span class="nJuego" name="procesador">' . $procesorMin . '</span></p>
                            <p class="info">Memoria: <span class="nJuego" name="memoria">' . $ramMin . ' GB RAM </span></p>
                            <p class="info">Gráficos: <span class="nJuego" name="graficos">' . $graficsMin . '</span></p>
                            <p class="info">DirectX: <span class="nJuego" name="directx"> Versión ' . $directxMin . '</span></p>
                            <p class="info">Almacenamiento: <span class="nJuego" name="almacenamiento">' . $storageMin . '</span> <span class="nJuego">GB de espacio disponible</span></p>


                        </div>
                    </div>
                    <div class="col-xl-1 mt-3 px-0 mx-0"><hr class="nJuego "></div>
                    <div class="col-xl-5 mt-3  me-0 px-0">
                        <hr class="nJuego ">
                        <h5 class="nJuego">Recomendados:</h5>
                        <div class="" id="reqRecomendados">
                            <p class="info">SO: <span class="nJuego" name="so">Windows 10</span></p>
                            <p class="info">Procesador: <span class="nJuego" name="procesador">Intel Core i5-3570-K</span></p>
                            <p class="info">Memoria: <span class="nJuego" name="memoria">8<span class="nJuego">GB de RAM</span></span></p>
                            <p class="info">Gráficos: <span class="nJuego" name="graficos">NVIDIA Geforce GTX 970</span></p>
                            <p class="info">DirectX: <span class="nJuego">Versión</span><span class="nJuego" name="directx">12</span></p>
                            <p class="info">Almacenamiento: <span class="nJuego" name="almacenamiento">70</span> <span class="nJuego">GB de espacio disponible</span></p>

                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-xl-1 p-0 mt-3 px-0 mx-0">&nbsp;</div>

        </div>

        ';
    ?>
</body>

</html>