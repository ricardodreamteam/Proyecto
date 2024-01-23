<?php

session_start();
include('connection.php');

//error_reporting(0);

if(isset($_SESSION['nombrePerfil'])){

    if (isset($_GET['categorias'])) {

        $val = $_GET['categorias'];
    
    
        $id;
        $titulo;
        $sinopsis;
        $imagen;
        $card;
    
    
        function crearCard($imagen, $titulo, $sinopsis)
        {
    
            echo '<div class="row g-0 ">';
              
            echo         '<div class="col-md-4">';
            echo             '<a href=""><img src="' . $imagen . '" class="img-fluid rounded-start d-block w-100" alt="..." name="portada" style="object-fit: cover;height: 200px;"></a>';
            echo         '</div>';
            echo        '<div class="col-md-8">';
            echo             '<div class="card-body colorfondocard ">';
            echo                '<a href="juego.php?titulo=' . $titulo . '">';
            echo                '<h5 class="card-title"><span id="titulo" name="titulo">' . $titulo . '</span></h5>';
            echo                '</a>';
            echo                '<p class="card-text"><span name="sinopsis" style="overflow: hidden;text-overflow: ellipsis;font-size: 0.8rem;display: -webkit-box;-webkit-line-clamp: 5;line-clamp: 5;-webkit-box-orient: vertical;color: var(--colorB);">' . $sinopsis . '<?php echo $sinopsis ?></span></p>';
            echo            '</div>';
            echo    '</div>';
            echo     '</div>';
               
        }
    
        $sql1 = "SELECT * FROM JUEGOS WHERE id_juegos IN (SELECT id_juegos FROM RELACION_TAGS WHERE id_tags IN (SELECT id_tags FROM TAGS WHERE nombre='$val'));";
        $consulta = mysqli_query($conn, $sql1);
    
    
        if (mysqli_num_rows($consulta) > 0) {
    
            while ($row = mysqli_fetch_assoc($consulta)) {
                $id = $row['id_juegos'];
                $titulo = $row['nombre'];
                $sinopsis = $row['sinopsis'];
                $sql2 = "SELECT portada FROM IMAGENES WHERE id_juegos=$id";
                $imagenPortada = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($imagenPortada)) {
                    $imagen = $row['portada'];
                }
                $card = crearCard($imagen, $titulo, $sinopsis);
            }
        }
    
        if ($val == "Todos") {
            $sql3 = "SELECT * FROM JUEGOS";
            $consultaTodos = mysqli_query($conn, $sql3);
    
            if (mysqli_num_rows($consultaTodos) > 0) {
    
                while ($row = mysqli_fetch_assoc($consultaTodos)) {
                    $id = $row['id_juegos'];
                    $titulo = $row['nombre'];
                    $sinopsis = $row['sinopsis'];
                    $sql2 = "SELECT portada FROM IMAGENES WHERE id_juegos=$id";
                    $imagenPortada = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($imagenPortada)) {
                        $imagen = $row['portada'];
                    }
                    $card = crearCard($imagen, $titulo, $sinopsis);
                }
            }
        }
    }
    
    if (isset($_GET['busqueda'])) {
    
        $search = $_GET['busqueda'];
    
    
        $id;
        $titulo;
        $sinopsis;
        $imagen;
        $card;
    
        function crearCard2($imagen, $titulo, $sinopsis)
        {
    
            echo '<div class="row g-0">';
            echo         '<div class="col-md-4">';
            echo             '<a href=""><img src="' . $imagen . '" class="img-fluid rounded-start d-block w-100" alt="..." name="portada" style="object-fit: cover;height: 200px;"></a>';
            echo         '</div>';
            echo        '<div class="col-md-8">';
            echo             '<div class="card-body colorfondocard ">';
            echo                '<a href="juego.php?titulo=' . $titulo . '">';
            echo                '<h5 class="card-title"><span id="titulo" name="titulo">' . $titulo . '</span></h5>';
            echo                '</a>';
            echo                '<p class="card-text"><span name="sinopsis" style="overflow: hidden;text-overflow: ellipsis;font-size: 0.8rem;display: -webkit-box;-webkit-line-clamp: 5;line-clamp: 5;-webkit-box-orient: vertical;color: var(--colorB);">' . $sinopsis . '<?php echo $sinopsis ?></span></p>';
            echo            '</div>';
            echo    '</div>';
            echo    '</div>';
        }
    
        $sql2 = "SELECT * FROM JUEGOS WHERE LOWER(nombre) LIKE LOWER('%$search%')";
        $consultan1 =  mysqli_query($conn, $sql2);
    
        if (mysqli_num_rows($consultan1) > 0) {
    
            while ($row = mysqli_fetch_assoc($consultan1)) {
                $id = $row['id_juegos'];
                $titulo = $row['nombre'];
                $sinopsis = $row['sinopsis'];
                $sql2 = "SELECT portada FROM IMAGENES WHERE id_juegos=$id";
                $imagenPortada = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($imagenPortada)) {
                    $imagen = $row['portada'];
                }
                $card = crearCard2($imagen, $titulo, $sinopsis);
            }
        }
        if (mysqli_num_rows($consultan1) == 0) {
    
            echo "<div style='background: rgba(0, 0, 0, 0); color: #82ACF5;'><h1>Vaya! Tu búsqueda nos ha dejado fríos. No hemos podido encontra tu juego...</h1></div>";
        }
    }
 
} else {

    if (isset($_GET['categorias'])) {

        $val = $_GET['categorias'];
    
    
        $id;
        $titulo;
        $sinopsis;
        $imagen;
        $card;
    
    
        function crearCard($imagen, $titulo, $sinopsis)
        {
    
            echo '<div class="row g-0">';
            echo         '<div class="col-md-4">';
            echo             '<a href=""><img src="' . $imagen . '" class="img-fluid rounded-start d-block w-100" alt="..." name="portada" style="object-fit: cover;height: 200px;"></a>';
            echo         '</div>';
            echo        '<div class="col-md-8">';
            echo             '<div class="card-body colorfondocard ">';
            echo                '<a href="juego.php?titulo=' . $titulo . '">';
            echo                '<h5 class="card-title"><span id="titulo" name="titulo">' . $titulo . '</span></h5>';
            echo                '</a>';
            echo                '<p class="card-text"><span name="sinopsis" style="overflow: hidden;text-overflow: ellipsis;font-size: 0.8rem;display: -webkit-box;-webkit-line-clamp: 5;line-clamp: 5;-webkit-box-orient: vertical;color: var(--colorB);">' . $sinopsis . '<?php echo $sinopsis ?></span></p>';
            echo            '</div>';
            echo    '</div>';
            echo     '</div>';
        }
    
        $sql1 = "SELECT * FROM JUEGOS WHERE id_juegos IN (SELECT id_juegos FROM RELACION_TAGS WHERE id_tags IN (SELECT id_tags FROM TAGS WHERE nombre='$val'));";
        $consulta = mysqli_query($conn, $sql1);
    
    
        if (mysqli_num_rows($consulta) > 0) {
    
            while ($row = mysqli_fetch_assoc($consulta)) {
                $id = $row['id_juegos'];
                $titulo = $row['nombre'];
                $sinopsis = $row['sinopsis'];
                $sql2 = "SELECT portada FROM IMAGENES WHERE id_juegos=$id";
                $imagenPortada = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($imagenPortada)) {
                    $imagen = $row['portada'];
                }
                $card = crearCard($imagen, $titulo, $sinopsis);
            }
        }
    
        if ($val == "Todos") {
            $sql3 = "SELECT * FROM JUEGOS";
            $consultaTodos = mysqli_query($conn, $sql3);
    
            if (mysqli_num_rows($consultaTodos) > 0) {
    
                while ($row = mysqli_fetch_assoc($consultaTodos)) {
                    $id = $row['id_juegos'];
                    $titulo = $row['nombre'];
                    $sinopsis = $row['sinopsis'];
                    $sql2 = "SELECT portada FROM IMAGENES WHERE id_juegos=$id";
                    $imagenPortada = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($imagenPortada)) {
                        $imagen = $row['portada'];
                    }
                    $card = crearCard($imagen, $titulo, $sinopsis);
                }
            }
        }
    }
    
    if (isset($_GET['busqueda'])) {
    
        $search = $_GET['busqueda'];
    
    
        $id;
        $titulo;
        $sinopsis;
        $imagen;
        $card;
    
        function crearCard2($imagen, $titulo, $sinopsis)
        {
    
            echo '<div class="row g-0">';
            echo         '<div class="col-md-4">';
            echo             '<a href=""><img src="' . $imagen . '" class="img-fluid rounded-start d-block w-100" alt="..." name="portada" style="object-fit: cover;height: 200px;"></a>';
            echo         '</div>';
            echo        '<div class="col-md-8">';
            echo             '<div class="card-body colorfondocard ">';
            echo                '<a href="juego.php?titulo=' . $titulo . '">';
            echo                '<h5 class="card-title"><span id="titulo" name="titulo">' . $titulo . '</span></h5>';
            echo                '</a>';
            echo                '<p class="card-text"><span name="sinopsis" style="overflow: hidden;text-overflow: ellipsis;font-size: 0.8rem;display: -webkit-box;-webkit-line-clamp: 5;line-clamp: 5;-webkit-box-orient: vertical;color: var(--colorB);">' . $sinopsis . '<?php echo $sinopsis ?></span></p>';
            echo            '</div>';
            echo    '</div>';
            echo    '</div>';
        }
    
        $sql2 = "SELECT * FROM JUEGOS WHERE LOWER(nombre) LIKE LOWER('%$search%')";
        $consultan1 =  mysqli_query($conn, $sql2);
    
        if (mysqli_num_rows($consultan1) > 0) {
    
            while ($row = mysqli_fetch_assoc($consultan1)) {
                $id = $row['id_juegos'];
                $titulo = $row['nombre'];
                $sinopsis = $row['sinopsis'];
                $sql2 = "SELECT portada FROM IMAGENES WHERE id_juegos=$id";
                $imagenPortada = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($imagenPortada)) {
                    $imagen = $row['portada'];
                }
                $card = crearCard2($imagen, $titulo, $sinopsis);
            }
        }
        if (mysqli_num_rows($consultan1) == 0) {
    
            echo "<div style='background: rgba(0, 0, 0, 0); color: #82ACF5;'><h1>Vaya! Tu búsqueda nos ha dejado fríos. No hemos podido encontra tu juego...</h1></div>";
        }
    }
}

