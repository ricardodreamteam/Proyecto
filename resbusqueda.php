<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/img/iconoventana.png"> <!--Logo pestaña de ventana-->
    <link rel="stylesheet" href="css/busquedajuegos.css">
    <link rel="stylesheet" href="css/navbar.css">

    <title>Buscajuegos</title>
</head>


<body>
    <!--  NAVBAR -->
    <header>
        <?php include 'navbar.html'; ?>
    </header>
    <!-- CONTENIDO -->
    <section class="contenido">
        <div class="row">
            <div class="col-sm 12 col-md-2 col-xl-2">&nbsp;</div>
            <div class="col-sm 12 col-md-2 col-xl-8">
                <div class="card mb-3 border-0 colorletras" style="max-width: 100%;">
                    <form method="post" action="">
                        <div class="cards">
                        <?
                        //error_reporting(0); 
                        include('busqueda.php')
                        ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm 12 col-md-2 col-xl-2">&nbsp;</div>
        </div>
    </section>
</body>

</html>